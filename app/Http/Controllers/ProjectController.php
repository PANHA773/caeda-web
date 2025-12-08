<?php

namespace App\Http\Controllers;

use App\Models\OfficeManager;
use App\Models\Staff;

class ProjectController extends Controller
{
    public function index()
    {
        // Fetch office managers
        $managers = OfficeManager::orderBy('order', 'asc')->get();

        // Fetch committee members (Staff model)
        $committeeMembers = Staff::orderBy('order', 'asc')->get();

        // Pass both variables to the view
        return view('project', compact('managers', 'committeeMembers'));
    }
}
