<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\ImpactStory;
use App\Models\Donation;
use App\Models\Footer;

class DonationController extends Controller
{
    // Show the donation page
    public function show()
    {
        // Fetch the first active hero section
        $hero = Hero::where('is_active', true)->first();

        // ✅ Fetch active impact stories (latest 6)
        $impactStories = ImpactStory::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // ✅ Fetch recent donors (latest 10)
        $recentDonors = Donation::orderBy('created_at', 'desc')
            ->take(10)
            ->get();

            $footer = Footer::first();

        return view('donation', compact('hero', 'impactStories', 'recentDonors', 'footer'));
    }

    // Handle donation form submission
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'amount'     => 'required|numeric|min:1',
            'cause'      => 'required|string|max:100',
            'payment_method' => 'required|string|max:50',
            'recurring'  => 'nullable|boolean',
        ]);

        $validated['recurring'] = $request->has('recurring');

        Donation::create($validated);

        return redirect()->back()->with('success', 'Thank you for your donation!');
    }
}
