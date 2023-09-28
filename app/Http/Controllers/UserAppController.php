<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Auth;
use App\Models\User;
use App\Models\UserApp;
use Str;

class UserAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View {
        $user = Auth::user()->first();

        $app = UserApp::where('user_id', $user['id'])->first();

        if(isset($app)){
            return view('dashboard.app.index',[
                'user' => $user,
                'app' => $app,
            ]);
        }
        abort(404);
        
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


    public function storeData(Request $request){


        $user = Auth::user()->first();

        $app = UserApp::where('user_id', $user['id'])->first();


        // $apiKey = 'Zvc8MVbPf6oKrY82ZyXkiFM0lGqLEKo0G6ddlEjPzr4bcIx2cPqNpigi6reKxl1A';
        $apiKey = $app['app_api_key'];


        $response = Http::withHeaders([
            'X-Api-Key' => $apiKey,
        ])->post('http://127.0.0.1:8000/api/5784eba9-5fbf-44e8-aa15-5cdd1d46ab97/feature-request/store', [
            'app_id' => $app['id'],
            'feature_request_id' => Str::uuid(),
            'user_name' => $request['name'],
            'user_email' => $request['email'],
            'feature_request_title' => $request['title'],
            'feature_request_description' => $request['description'],
            'status' => 'pending'
        ]);


        return 123;

            // Check the response for success or failure
        if ($response->successful()) {
            // Request was successful (status code 200-299)
            $responseData = $response->json(); // Get the JSON response data
            // Handle the response data as needed

            return response()->json($responseData);
        } else {
            // Request failed (status code 400-599)
            return response()->json(['error' => 'Request failed'], $response->status());
        }

        return response()->json($featureRequest, 201);

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
