<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMethod;

class ContactMethodController extends Controller
{
    /**
     * Display a listing of contact methods.
     */
    public function index()
    {
        $contacts = ContactMethod::latest()->paginate(10); // Use paginate for links // optional: ->where('is_active', true)
        return view('admin.contact-information.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new contact method.
     */
    public function create()
    {
        return view('admin.contact-information.create');
    }

    /**
     * Store a newly created contact method in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:100',
            'icon'        => 'required|string|max:100',
            'content'     => 'required|string',
            'color'       => 'required|string|max:100',
            'action'      => 'nullable|string|max:50',
            'action_icon' => 'nullable|string|max:50',
            'is_active'   => 'nullable|boolean',
        ]);

        ContactMethod::create($validated);

        return redirect()->route('contact-information.index')
                         ->with('success', 'Contact method added successfully!');
    }

    /**
     * Show the form for editing the specified contact method.
     */
public function edit(ContactMethod $contact_information)
{
    return view('admin.contact-information.edit', ['contact' => $contact_information]);
}




    /**
     * Update the specified contact method in storage.
     */
public function update(Request $request, ContactMethod $contact_information)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:100',
        'icon'        => 'required|string|max:100',
        'content'     => 'required|string',
        'color'       => 'required|string|max:100',
        'action'      => 'nullable|string|max:50',
        'action_icon' => 'nullable|string|max:50',
        'is_active'   => 'nullable|boolean',
    ]);

    $contact_information->update($validated);

    return redirect()->route('admin.contact-information.index')
                     ->with('success', 'Contact method updated successfully!');
}


    /**
     * Remove the specified contact method from storage.
     */
    public function destroy(ContactMethod $contact_method)
    {
        $contact_method->delete();

        return redirect()->route('contact-information.index')
                         ->with('success', 'Contact method deleted successfully!');
    }
}
