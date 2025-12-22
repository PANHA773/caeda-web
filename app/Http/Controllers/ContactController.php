<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialLink;
use App\Models\ContactMethod;
use App\Models\Faq; // New: FAQs

class ContactController extends Controller
{
    /**
     * Show contact page
     */
    public function index()
    {
        // Fetch active social links
        $socialLinks = SocialLink::where('is_active', true)->get();

        // Fetch active contact methods
        $contacts = ContactMethod::where('is_active', true)->get();

        // Fetch active FAQs (optional: latest first)
        $faqs = Faq::where('is_active', true)->latest()->get();

        return view('contact', compact('socialLinks', 'contacts', 'faqs'));
    }

    /**
     * Handle contact form submit
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|max:2000',
        ]);

        // Example: save to DB or send mail
        // Contact::create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Your message has been sent successfully!');
    }
}
