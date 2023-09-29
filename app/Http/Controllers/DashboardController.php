<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use App\Models\UserApp;
use App\Models\FeatureRequest;

class DashboardController extends Controller
{
    public function home(): View {

        $user = Auth::user()->first();

        // Get the app
        $app = UserApp::where('user_id', $user['id'])->first();        

        if(isset($app)){
            $pending_feature_requests = FeatureRequest::where([['app_id', $app['id']], ['status', 'pending']])->orderBy('created_at', 'desc')->get();
            $approved_feature_requests = FeatureRequest::where([['app_id', $app['id']], ['status', 'approved']])->orderBy('created_at', 'desc')->get();
            $in_progess_feature_requests = FeatureRequest::where([['app_id', $app['id']], ['status', 'in-progress']])->orderBy('created_at', 'desc')->get();
            $rejected_feature_requests = FeatureRequest::where([['app_id', $app['id']], ['status', 'rejected']])->orderBy('created_at', 'desc')->get();
            $completed_feature_requests = FeatureRequest::where([['app_id', $app['id']], ['status', 'completed']])->orderBy('created_at', 'desc')->get();

            return view('dashboard.home', [
                'app' => $app,
                'pending_feature_requests' => $pending_feature_requests,
                'approved_feature_requests' => $approved_feature_requests,
                'in_progess_feature_requests' => $in_progess_feature_requests,
                'rejected_feature_requests' => $rejected_feature_requests,
                'completed_feature_requests' => $completed_feature_requests,
            ]);
        }
        
        
        return view('dashboard.home', [
            'user' => $user,
        ]);


      

    }

}
