<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AdminAuthController;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard
     */
    public function index()
    {
        $admin = AdminAuthController::admin();
        
        return view('admin.dashboard', compact('admin'));
    }
}