<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactCeadaController extends Controller
{
    // Display all contacts with search
    public function index(Request $request)
    {
        $query = Contact::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('subject', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('message', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('phone', 'LIKE', "%{$searchTerm}%");
            });
        }
        
        // Filter by newsletter status
        if ($request->has('newsletter') && $request->newsletter != '') {
            $query->where('newsletter', $request->newsletter);
        }
        
        // Filter by date range
        if ($request->has('date_from') && $request->date_from != '') {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->has('date_to') && $request->date_to != '') {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        // Get today's count for the stats
        $todayCount = Contact::whereDate('created_at', today())->count();
        
        // Order and paginate
        $contacts = $query->latest()->paginate(20);
        
        // Append search parameters to pagination links
        if ($request->has('search')) {
            $contacts->appends(['search' => $request->search]);
        }
        
        return view('admin.contacts.index', compact('contacts', 'todayCount'));
    }

    // Optional: view single contact
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    // Optional: delete a contact
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully.');
    }
    
    // Export contacts to CSV
    public function export(Request $request)
    {
        $fileName = 'contacts_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];
        
        $contacts = Contact::latest()->get();
        
        $columns = ['ID', 'Name', 'Email', 'Phone', 'Subject', 'Message', 'Newsletter', 'Created At'];
        
        $callback = function() use($contacts, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            
            foreach ($contacts as $contact) {
                $row = [
                    $contact->id,
                    $contact->name,
                    $contact->email,
                    $contact->phone,
                    $contact->subject,
                    strip_tags($contact->message),
                    $contact->newsletter ? 'Yes' : 'No',
                    $contact->created_at->format('Y-m-d H:i:s')
                ];
                
                fputcsv($file, $row);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
    
    // Mark as read (if you add is_read column)
    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return back()->with('success', 'Message marked as read.');
    }
    
    // Bulk actions
    public function bulkAction(Request $request)
    {
        $action = $request->action;
        $selected = $request->selected;
        
        if (empty($selected)) {
            return back()->with('error', 'No messages selected.');
        }
        
        switch ($action) {
            case 'mark_read':
                Contact::whereIn('id', $selected)->update(['is_read' => true]);
                return back()->with('success', 'Selected messages marked as read.');
                
            case 'mark_unread':
                Contact::whereIn('id', $selected)->update(['is_read' => false]);
                return back()->with('success', 'Selected messages marked as unread.');
                
            case 'delete':
                Contact::whereIn('id', $selected)->delete();
                return back()->with('success', 'Selected messages deleted.');
                
            default:
                return back()->with('error', 'Invalid action.');
        }
    }
    
    // Get search suggestions for autocomplete
    public function getSuggestions(Request $request)
    {
        $term = $request->term;
        
        $suggestions = Contact::where('name', 'LIKE', "%{$term}%")
            ->orWhere('email', 'LIKE', "%{$term}%")
            ->orWhere('subject', 'LIKE', "%{$term}%")
            ->take(10)
            ->get()
            ->map(function($contact) {
                return [
                    'id' => $contact->id,
                    'value' => $contact->name,
                    'email' => $contact->email,
                    'subject' => $contact->subject
                ];
            });
        
        return response()->json($suggestions);
    }
}