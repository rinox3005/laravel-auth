<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class PageController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('guest.index', compact('projects'));
    }
}
