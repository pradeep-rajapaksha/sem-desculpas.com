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
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
            $destination = public_path('temp/'.$session_id.'/');
            $filename = 'music-track.'.$file->getClientOriginalExtension(); // $file->getClientOriginalName();
            $file->move($destination, $filename);

            $fileUrl = url('temp/'.session()->getId().'/' . $filename);
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
            $destination = public_path('temp/'.$session_id.'/');
            $filename = 'audio-recording.'.$file->getClientOriginalExtension(); // $file->getClientOriginalName();
            $file->move($destination, $filename);

            $fileUrl = url('temp/'.session()->getId().'/' . $filename);
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
        $summaryData = $request->session()->get('class-builder-summary-data') ?? null;
        $planData = $request->session()->get('class-builder-plan-data') ?? null;
        $musicData = $request->session()->get('class-builder-music-data') ?? null;
        $recordData = $request->session()->get('class-builder-record-data') ?? null;
        // dd($request->session());
        if($request->isMethod('post')) {
            $validated = $request->validate([
                    'agree' => 'required|accepted',
                ]);

            if(!($summaryData && $planData && $musicData && $recordData) Or
                ["name", "description", "category", "difficulty", "musicStyle"] != array_keys(array_filter($summaryData)) Or
                ["track-artist", "track-name", "track-album", "music-track"] != array_keys(array_filter($musicData)) Or
                ["audio-track"] != array_keys(array_filter($recordData))
            ) {
                dd('Class builder data not completed');
                return redirect()->back()->withErrors(['error' => true, 'message' => 'Class builder data not ']);
            }

            set_time_limit(300);

            $session_id = $request->session()->get('spotify-auth-data')['session_id'] ?? session()->getId();
            $destination = public_path('temp/'.$session_id.'/');
            \Log::info('before exec() >>>>');
            // exec('ffmpeg -y -i "'.$musicData["music-track"].'" -i "'.$recordData["audio-track"].'" -filter_complex "[0:0]volume=0.3[a];[1:0]volume=1.8[b];[a][b]amix=inputs=2:duration=longest" -c:a libmp3lame "'.$destination.'merge.mp3"', $output, $retval);

            // dd($destination, 'ffmpeg -y -i "'.$musicData["music-track"].'" -i "'.$recordData["audio-track"].'" -filter_complex "[0:0]volume=0.3[a];[1:0]volume=1.8[b];[a][b]amix=inputs=2:duration=longest" -c:a libmp3lame "'.$destination.'merge.mp3"');

            $process = Process::fromShellCommandline('ffmpeg -y -i "'.$musicData["music-track"].'" -i "'.$recordData["audio-track"].'" -filter_complex "[0:0]volume=0.3[a];[1:0]volume=1.8[b];[a][b]amix=inputs=2:duration=longest" -c:a libmp3lame "'.$destination.'merge.mp3"');
            $process->setTimeout(60*5);
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
            echo $process->getOutput();

            \Log::info('after exec() >>>>');

            // if($output) {
            //     \Log::info('output exec() >>>>');
            //     dd($output, $retval);
            // }
        }

        return view('classes.builder.submit', compact('musicData', 'recordData'));
    }
}
