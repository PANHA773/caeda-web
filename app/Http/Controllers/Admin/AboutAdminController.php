<?php

namespace App\Http\Controllers\Admin; // <- must be Admin

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }
}
