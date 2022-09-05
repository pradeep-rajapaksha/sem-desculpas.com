<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use App\Models\Classes;
use App\Models\Category;
use App\Models\MusicType;
use App\Http\Resources\ClassResource;
use App\Http\Helpers\mp3;
use Illuminate\Support\Facades\Storage;

class ClassController extends Controller
{
    protected $db;

    function __construct()
    {
        $this->db = app('firebase.firestore')->database();
    }

    public function index()
    {
        $data = Classes::getAll();

        // return ClassResource::collection($data);
        return view("dashboard", compact('data'));
    }

    public function show($ref = null)
    {
        $data = Classes::find($ref);
        return new ClassResource($data);
    }

    public function builderSummary(Request $request)
    {
        if($request->isMethod('post')) {
            $validated = $request->validate([
                    'name' => 'required',
                    'description' => 'required',
                    'category' => 'required',
                    'difficulty' => 'required',
                    'musicStyle' => 'required',
                ]);

            $request->session()->put('class-builder-summary-data', $validated);

            return redirect()->route('classes.builder.plan');
        }

        $old = $request->session()->get('class-builder-summary-data');
        if($old) {
            $request->session()->flashInput($old);
        }

        $categories = Category::getAll();
        $musicTypes = MusicType::getAll();

        return view('classes.builder.summary', compact('categories', 'musicTypes'));
    }

    public function builderPlan(Request $request)
    {
        if($request->isMethod('post')) {
            $validated = $request->validate([
                    'name' => 'required|array',
                    'description' => 'required|array',
                    'time' => 'required|array',

                    'name.*' => 'required',
                    'description.*' => 'required',
                    'time.*' => 'required',
                ]);

            $data = array();
            for ($key=0; $key < sizeof($request->name); $key++) {
                array_push($data, array(
                        'name' => $request->name[$key],
                        'description' => $request->description[$key],
                        'time' => $request->time[$key],
                    ));
            }

            $request->session()->put('class-builder-plan-data', $data);

            return redirect()->route('classes.builder.music');
        }

        $old = $request->session()->get('class-builder-plan-data');
        if($old) {
            $request->session()->flashInput($old);
        }

        $categories = Category::getAll();
        $musicTypes = MusicType::getAll();

        return view('classes.builder.plan');
    }

    public function builderMusic(Request $request)
    {
        // dd($request->session()->all());
        if($request->isMethod('post')) {
            // dd($request->file('music-track'));
            $validated = $request->validate([
                    'track-artist' => 'required',
                    'track-name' => 'required',
                    'track-album' => 'required',
                    'music-track' => 'required|file', // |mimetypes:audio/*,audio/mpeg,mp3,wav,ogg
                ]);

            $file = $request->file('music-track');

            $session_id = $request->session()->get('spotify-auth-data')['session_id'] ?? session()->getId();
            $destination = storage_path('app/public/temp/'.$session_id.'/');
            $file->move($destination, $file->getClientOriginalName());

            $fileUrl = url('temp/'.session()->getId().'/' . $file->getClientOriginalName());
            $validated = array_merge($validated, ['music-track' => $fileUrl]);

            $request->session()->put('class-builder-music-data', $validated);
            // dd($request->session());
            return redirect()->route('classes.builder.record');
        }

        $old = $request->session()->get('class-builder-music-data');
        if($old) {
            $request->session()->flashInput($old);
        }

        $categories = Category::getAll();
        $musicTypes = MusicType::getAll();

        return view('classes.builder.music');
    }

    public function builderRecord(Request $request)
    {
        if($request->isMethod('post')) {
            // dd($request->file('audio-track'));
            $validated = $request->validate([
                    'audio-track' => 'required|file', // |mimes:mp3
                ]);

            $file = $request->file('audio-track');

            $session_id = $request->session()->get('spotify-auth-data')['session_id'] ?? session()->getId();
            $destination = storage_path('app/public/temp/'.$session_id.'/');
            $file->move($destination, $file->getClientOriginalName());

            $fileUrl = url('temp/'.session()->getId().'/' . $file->getClientOriginalName());
            $validated = array_merge($validated, ['audio-track' => $fileUrl]);

            $request->session()->put('class-builder-record-data', $validated);

            return redirect()->route('classes.builder.submit');
        }

        $old = $request->session()->get('class-builder-record-data');
        if($old) {
            $request->session()->flashInput($old);
        }

        return view('classes.builder.record');
    }

    public function builderSubmit(Request $request)
    {
        // dd($request->session());
        if($request->isMethod('post')) {
            $validated = $request->validate([
                    'agree' => 'required|accepted',
                ]);

            $summaryData = $request->session()->get('class-builder-summary-data') ?? null;
            $planData = $request->session()->get('class-builder-plan-data') ?? null;
            $musicData = $request->session()->get('class-builder-music-data') ?? null;
            $recordData = $request->session()->get('class-builder-record-data') ?? null;

            if(!($summaryData && $planData && $musicData && $recordData) Or
                ["name", "description", "category", "difficulty", "musicStyle"] != array_keys(array_filter($summaryData)) Or
                ["track-artist", "track-name", "track-album", "music-track"] != array_keys(array_filter($musicData)) Or
                ["audio-track"] != array_keys(array_filter($recordData))
            ) {
                dd('Class builder data not completed');
                return redirect()->back()->withErrors(['error' => true, 'message' => 'Class builder data not ']);
            }

            set_time_limit(300);

            $data = \FFMpeg::openUrl([
                    $musicData["music-track"],
                    $recordData["audio-track"]
                    // 'http://127.0.0.1:8000/temp/Yp6xrILUsAcIbrP27g2Ai2ZNekpRwt3GtjKDITkl/Ed Sheeran - Shape Of You (GHOSTT Remix).mp3',
                    // 'http://127.0.0.1:8000/temp/Yp6xrILUsAcIbrP27g2Ai2ZNekpRwt3GtjKDITkl/recording.mp3'
                ])
                ->export()
                ->concatWithoutTranscoding()
                ->save(storage_path('app/public/temp/').$request->session()->getId().'/mixed.mp3');

            // $data = \FFMpeg::fromDisk('local')
            //         ->open([
            //             $recordData["audio-track"],
            //             $musicData["music-track"],
            //             // 'temp/bcJ8vGXmPWE5YYtZTgsfHrB5BQF3xOqo0bEKOns8/Ed Sheeran - Shape Of You (GHOSTT Remix).mp3',
            //             // 'temp/bcJ8vGXmPWE5YYtZTgsfHrB5BQF3xOqo0bEKOns8/recording.mp3'
            //         ])
            //         ->export()
            //         ->concatWithoutTranscoding()
            //         ->save(storage_path('app/public/temp/').$request->session()->getId().'/mixed.mp3');

            // dd($request->session(), $data);

            // $path = storage_path('app/public').'/temp/v8hmb6ly6kclDt7P8DjQb9ehNvabA9nm0bBguuWP/recording.mp3';
            // $path1 = storage_path('app/public').'/temp/v8hmb6ly6kclDt7P8DjQb9ehNvabA9nm0bBguuWP/Ed Sheeran - Shape Of You (GHOSTT Remix).mp3';
            // $mp3 = new mp3($path);

            // $newpath = storage_path('app/public').'/temp/v8hmb6ly6kclDt7P8DjQb9ehNvabA9nm0bBguuWP/concat.mp3';
            // $mp3->striptags();

            // $mp3_1 = new mp3($path1);
            // $mp3->mergeBehind($mp3_1);
            // $mp3->striptags();
            // $mp3->setIdv3_2('01','Track Title','Artist','Album','Year','Genre','Comments','Composer','OrigArtist','Copyright','url','encodedBy');
            // // $mp3->save($newpath);

            // $stored = Storage::disk('public')->put($newpath, $mp3->exportStr());
            // dd($stored);
        }
        // dd($request->session());
        return view('classes.builder.submit');
    }
}
