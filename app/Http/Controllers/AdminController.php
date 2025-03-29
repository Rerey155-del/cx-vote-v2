<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        return view('admin.dashboard', compact('title'));
    }

    public function candidate()
    {
        $title = 'Candidate';
        return view('admin.candidate', compact('title'));
    }

    public function attendance()
    {
        $title = 'Attendance';
        return view('admin.attendance', compact('title'));
    }

    public function voters()
    {
        $title = 'Voters';
        return view('admin.voters', compact('title'));
    }

    public function report()
    {
        $title = 'Report';
        return view('admin.report', compact('title'));
    }
}
