<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function show()
{
    return view('donation');
}

public function submit(Request $request)
{
    // 处理表单提交
}
}
