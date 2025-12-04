<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
     /**
     * Show the User Dashboard.
     */
    public function showUserDashboard()
    {
        return view('dashboard.user.dashboard');
    }
}
