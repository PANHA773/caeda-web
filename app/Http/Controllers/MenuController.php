<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuCategory;

class MenuController extends Controller
{
    public function index()
    {

     $menuCategories = MenuCategory::where('is_active', true)
    ->orderBy('order')
    ->get();

return view('menu', compact('menuCategories'));
    }
}
