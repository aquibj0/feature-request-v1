<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserApp;
use App\Models\FeatureRequest;
use App\Models\Comments;
use Str;

class FeatureRequestController extends Controller
{
    public function store(Request $request, $id){

        $app = UserApp::where('app_id', $id)->first();

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


            $data = [
                'message' => 'success',
                'data' => $featureRequest,
            ];

            return response()->json($data, 201);

        }

        abort(404);

        
    }


    public function updateStatus(Request $request, FeatureRequest $featureRequest){
        
        $validatedData = $request->validate([
            'status' => 'required|in:pending,in progress,completed', // Define the allowed statuses
        ]);

        $featureRequest->update(['status' => $validatedData['status']]);

        if($request['comments']){

            Comments::create([
                'user_id' => auth()->user()->id,
                'feature_request_id' => $featureRequest['id'],
                'comment' => $request['comment'],
            ]);

        }


        return response()->json(['message' => 'Feature request status updated']);
    }

}
