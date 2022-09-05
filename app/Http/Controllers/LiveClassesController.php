<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use App\Models\Classes;
use App\Models\ClassPlay;
use App\Models\User;

class LiveClassesController extends Controller
{
    protected $db;

    function __construct()
    {
        $this->db = app('firebase.firestore')->database();  
    }

    public function index()
    {
        $classes = Classes::getWhere('Status', Classes::PUBLISHED);

        $totalUsers = 0;
        $totalTime = 0; // in seconds
        $totalInteraction = 0;
        $totalCompleted = 0;
        $currentUsers = 0;

        foreach ($classes as $key => $class) {
            $totalInteraction += @sizeof($class['interactions']) ?? 0;
            $totalUsers += @sizeof($class['classUsers']) ?? 0;

            $totalTime += @array_sum(array_map(function($user) {
                                $totalClassTime = class_time_in_seconds($user['time']);
                                return $totalClassTime;
                            }, $class['classUsers'])) ?? 0;

            $currentUsers += @sizeof(array_filter($class['classUsers'], function($user) { 
                                return (!empty($user['startedAt']) && empty($user['completedAt']));
                            })) ?? 0;

            $totalCompleted += @sizeof(array_filter($class['classUsers'], function($user) { 
                                return (!empty($user['startedAt']) && !empty($user['completedAt'])) ;
                            })) ?? 0;
        }

        $totalTime = date('H:i:s',$totalTime);

        return view("classes.live", compact('classes', 'totalUsers', 'currentUsers', 'totalTime', 'totalInteraction', 'totalCompleted'));
    }

    public function show($ref = null)
    {
        $data = Classes::find($ref);
        $totalUsers = @sizeof($data['classUsers']) ?? 0;
        $totalInteraction = @sizeof($data['interactions']) ?? 0;

        $currentUsers = @sizeof(array_filter($data['classUsers'], function($user) { 
                                return (!empty($user['startedAt']) && empty($user['completedAt']));
                            })) ?? 0;

        $completed = @sizeof(array_filter($data['classUsers'], function($user) { 
                                return (!empty($user['startedAt']) && !empty($user['completedAt'])) ;
                            })) ?? 0;

        $totalTime = @array_sum(array_map(function($user) {
                        $totalClassTime = class_time_in_seconds($user['time']);
                        return $totalClassTime;
                    }, $data['classUsers'])) ?? 0;

        $totalTime = date('H:i:s', $totalTime);

        return view("classes.live-class", compact('data', 'totalUsers', 'currentUsers', 'totalTime', 'totalInteraction', 'completed'));
    }

    public function interactionStore(Request $request, $ref = null)
    {
        $validated = $request->validate([
                        'interaction' => 'required',
                    ]);
        $validated['datetime'] = date('Y-m-d H:i:s', strtotime('now'));
        $validated['name'] = 'Pradeep Rajapaksha';
        $validated['userId'] = 'gsjvmtu3tum4tu394vut394ut90m';

        $response = Classes::create($ref, $validated, 'interactions');
        // $response = Classes::create($ref, ['Hello' => 'World']);

        if($response === true) {
            return redirect()->back()->with('message', 'interaction added');
        }

        return redirect()->back()->withErrors($response);
    }
}
