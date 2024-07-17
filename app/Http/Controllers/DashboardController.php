<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VendorStore;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('vendor.home');
    }

    public function dashboard(){
        return view('vendor.dashboard');
    }

    public function installApp() {

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/vendor/login');
    }
}
