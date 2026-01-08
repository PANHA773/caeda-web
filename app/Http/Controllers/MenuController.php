<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\Footer;

class MenuController extends Controller
{
    public function index()
    {

     $menuCategories = MenuCategory::where('is_active', true)
    ->orderBy('order')
    ->with(['items' => function($q) {
        $q->where('is_active', true)->orderBy('order');
    }])->get();

    $footer = Footer::first();

    return view('menu', compact('menuCategories', 'footer'));
    }
}
