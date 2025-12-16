<?php

namespace App\Http\Controllers;

use App\Models\Partner;

class PartnersController extends Controller
{
    /**
     * Display partners listing.
     */
    public function index()
    {
        $partners = Partner::active()->ordered()->get();
        return view('partners', compact('partners'));
    }
}
