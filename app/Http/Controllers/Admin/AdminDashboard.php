<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jobs;
use App\Models\JobApplication;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function getDashboard()
    {
        $count['nurseCount'] = User::role('CLIENT')->count();
        $count['activeNurseCount'] = User::role('CLIENT')->whereActive(1)->count();
        $count['blockedNurseCount'] = User::role('CLIENT')->whereActive(0)->count();

        $count['hospitalCount'] = Project::count();
        $count['activeHospitalCount'] = Project::whereActive(1)->count();
        $count['blockedHospitalCount'] = Project::whereActive(0)->count();

        $count['jobCount'] = Jobs::count();
        $count['jobapplyCount'] = JobApplication::count();

        $nurses = User::role('CLIENT')->latest()->limit(5)->get();
        $hospitals = Project::latest()->limit(5)->get();
        
        return view('admin.dashboard',compact('count','hospitals','nurses'));
    }

    public function userCreateShow()
    {
        return view('admin.user-create');
    }
}
