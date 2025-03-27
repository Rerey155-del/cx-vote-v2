<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function candidate()
    {
        return view('admin.candidate');
    }

    public function attendance()
    {
        return view('admin.attendance');
    }

    public function voters()
    {
        return view('admin.voters');
    }

    public function report()
    {
        return view('admin.report');
    }
}
