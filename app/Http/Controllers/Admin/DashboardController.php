<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $data=Project::orderBy('updated_at','DESC')->get();

        return view('admin.dashboard',compact('data'));
    }
}
