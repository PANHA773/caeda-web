<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Models\OrderStep;
use App\Models\Location;
use App\Models\FeaturedMenu;

class CoffeeController extends Controller
{
    public function index()
    {
        // Fetch active "Why Choose Us" items
        $items = WhyChooseUs::where('status', 1)
                            ->orderBy('order')
                            ->get();

        // Fetch active "Order Online" steps
        $orderSteps = OrderStep::where('status', 1)
                               ->orderBy('order')
                               ->get();

            $locations = Location::where('status', 1)
                         ->orderBy('order')
                         ->get();

                             $menus = FeaturedMenu::where('is_active', true)
        ->orderBy('order')
        ->limit(6)
        ->get();

   


        // Return the Blade view 'coffee' and pass both variables
        return view('coffee', compact('items', 'orderSteps','locations','menus'));
    }
}
