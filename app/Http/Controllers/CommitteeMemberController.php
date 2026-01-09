<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;

class CommitteeMemberController extends Controller
{
    public function index()
    {
        $committeeMembers = CommitteeMember::orderBy('order')->get();

        return view('project', compact('committeeMembers'));
    }
}
