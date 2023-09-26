<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserApp;
use Str;

class UserAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request){

        $user = Auth::user()->first();

        $validatedData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        
        if($validatedData){
            // Create a new application
            $app = UserApp::create([
                'user_id' => $user['id'],
                'app_id' => Str::uuid(),
                'app_name' => $request['name'],
                'app_description' => $request['description'],
                'app_api_key' => Str::random(64)
            ]);

            return redirect()->back()->with('status', 'App Created Successfully');

        }

        return redirect()->back()->withErrors($validator)->withInput();
            

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
