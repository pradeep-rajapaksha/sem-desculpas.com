<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function spotifyAuth(Request $request)
    {
        if($request->expires_in) {
            $request->request->add(['session_id' => session()->getId(), 'expires_at' => strtotime('now') + 3600]);
        }

        $request->session()->put('spotify-auth-data', $request->all());

        return response()->json("", 200);
    }

    public function spotifyAuthForget(Request $request)
    {
        $request->session()->forget('spotify-auth-data');

        return response()->json("", 200);
    }
}
