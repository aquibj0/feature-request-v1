<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserApp;
use Str;

class FeatureRequestController extends Controller
{
    public function store(Request $request, $key){

        $app = UserApp::where('app_api_key', $key)->first();

        if(isset($app)){

            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'title' => 'required',
                'description' => 'nullable',
                'status' => 'nullable',
            ]);

            // Create a new feature request
            $featureRequest = FeatureRequest::create([
                'app_id' => $app['id'],
                'feature_request_id' => Str::uuid(),
                'user_name' => $request['name'],
                'user_email' => $request['email'],
                'feature_request_title' => $request['title'],
                'feature_request_description' => $request['description'],
                'status' => 'pending'
            ]);


            return response()->json($featureRequest, 201);
        }

        abort(404);

        
    }
}
