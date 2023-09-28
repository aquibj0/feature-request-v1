<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\UserApp;
use App\Models\FeatureRequest;

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


}
