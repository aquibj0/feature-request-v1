<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserApp;

class UserAppController extends Controller
{
    public function store(Request $request){

        $user = Auth::user()->first();

        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        
        // Create a new application
        $app = UserApp::create([
            'user_id' => $user['id'],
            'app_id' => Str::uuid(),
            'app_name' => $request['name'],
            'app_description' => $request['description'],
            'app_api_key' => Str::random(64)
        ]);

        return response()->json($app, 201);
            

    }
}
