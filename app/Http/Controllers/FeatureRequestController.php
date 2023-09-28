<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use App\Models\User;
use App\Models\UserApp;
use App\Models\FeatureRequest;
use App\Models\Comments;

class FeatureRequestController extends Controller
{

    public function getFeatureRequests() {

        $user = Auth::user()->first();

        $app = UserApp::where('user_id', $user['id'])->first();

        if(isset($app)){
            
            $feature_requests = FeatureRequest::where([['app_id', $app['id']]])->orderBy('created_at', 'desc')->get();
            
            return view('dashboard.feature-request.index',[
                'user' => $user,
                'feature_requests' => $feature_requests,
            ]);
        } 

        
    }


    public function show($id){
        if(Auth::user()){

            $feature_request = FeatureRequest::where('id', $id)->first();
            
            if(isset($feature_request)){
                return view('dashboard.feature-request.show',[
                    
                    'feature_request' => $feature_request,
                ]);
            }
            abort(404);
            

        }
    }

    public function updateStatus(Request $request, $id){
        
        $validatedData = $request->validate([
            'status' => 'sometimes', // Define the allowed statuses
        ]);

        $featureRequest = FeatureRequest::where('id', $id)->first();

        $featureRequest->update(['status' => $validatedData['status']]);

        if($request['comment']){

            Comments::create([
                'user_id' => auth()->user()->id,
                'feature_request_id' => $featureRequest['id'],
                'comment' => $request['comment'],
            ]);

        }

        return redirect()->back()->with('status', 'Status Updated');

    }



    public function addComment(Request $request, $id) {

        $featureRequest = FeatureRequest::where('id', $id)->first();

        if($featureRequest && $request['comment']){

            Comments::create([
                'user_id' => auth()->user()->id,
                'feature_request_id' => $featureRequest['id'],
                'comment' => $request['comment'],
            ]);

        }

        return redirect()->back()->with('status', 'Comments Added');
    }


    function getFeatureRequestStatus($status): View {
        
        $user = Auth::user()->first();

        // Get the app
        $app = UserApp::where('user_id', $user['id'])->first();  
        
        $feature_requests = FeatureRequest::where([['app_id', $app['id']], ['status', $status]])->orderBy('created_at', 'desc')->get();

        return view('dashboard.feature-request.index',[
            'feature_requests' => $feature_requests,
            'status' => $status
        ]);
    }

}
