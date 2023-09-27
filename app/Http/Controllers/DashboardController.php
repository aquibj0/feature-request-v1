<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Auth;
use App\Models\UserApp;

class DashboardController extends Controller
{
    public function home(): View {

        $user = Auth::user()->first();

        // Get the app
        $app = UserApp::where('user_id', $user['id'])->first();
        
        return view('dashboard', [
            'app' => $app
        ]);

    }
}
