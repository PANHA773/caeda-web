<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialLink;
use App\Models\ContactMethod;
use App\Models\Faq;
use App\Models\Footer;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\AdminNotification;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Show contact page
     */
    public function index()
    {
        $socialLinks = SocialLink::where('is_active', true)->get();
        $contacts = ContactMethod::where('is_active', true)->get();
        $faqs = Faq::where('is_active', true)->latest()->get();
        $footer = Footer::first();

        return view('contact', compact('socialLinks', 'contacts', 'faqs', 'footer'));
    }

    /**
     * Handle contact form submit
     */
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
            'newsletter' => 'nullable|boolean',
        ]);

        // Combine first and last name
        $name = trim($validated['first_name'] . ' ' . $validated['last_name']);

        // Save to database


        $contact = Contact::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'newsletter' => $request->has('newsletter'),
        ]);

        // Notify admins
        $admins = User::where('is_admin', true)->get();
        Notification::send($admins, new AdminNotification([
            'title' => 'New Contact Message',
            'message' => "You received a new message from {$name}: \"{$validated['subject']}\"",
            'url' => route('admin.contacts.show', $contact->id),
            'type' => 'info',
            'icon' => 'fas fa-envelope',
        ]));


        // Return JSON response for AJAX
        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!',
        ]);
    }
}
