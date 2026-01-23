<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WorkshopCeadaController extends Controller
{
    /**
     * Display a listing of workshops
     */
    public function index()
    {
        $workshops = Workshop::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.workshops.index', compact('workshops'));
    }

    /**
     * Normalize common video URLs to an embeddable URL.
     * Supports YouTube (watch/ and youtu.be) and Vimeo.
     */
    private function normalizeVideoUrl(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        // YouTube watch URL -> embed
        if (preg_match('#(?:https?://)?(?:www\.)?youtube\.com/watch\?v=([A-Za-z0-9_\-]+)#i', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        // YouTube short url youtu.be/ID
        if (preg_match('#(?:https?://)?(?:www\.)?youtu\.be/([A-Za-z0-9_\-]+)#i', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        // Vimeo standard URL -> player embed
        if (preg_match('#(?:https?://)?(?:www\.)?vimeo\.com/(?:channels/[A-Za-z0-9_\-]+/)?(\d+)#i', $url, $m)) {
            return 'https://player.vimeo.com/video/' . $m[1];
        }

        // If it's already an embed URL or unknown host, return as-is
        return $url;
    }

    /**
     * Show the form for creating a new workshop
     */
    public function create()
    {
        return view('admin.workshops.create');
    }

    /**
     * Store a newly created workshop
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'instructor' => 'required|string|max:255',
            'level' => 'required|string|max:50',
            'duration' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'video_url' => 'nullable|url',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:20480', // Max 20MB for now
            'image' => 'nullable|image|max:2048',
            'instructor_image' => 'nullable|image|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
            'attendees' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['date'] = $data['date'] ?? now();
        $data['status'] = $request->has('status');
        $data['description'] = $data['description'] ?? ''; // <<< add this line

        // Handle video: file upload takes precedence over URL
        if ($request->hasFile('video_file')) {
            $data['video'] = $request->file('video_file')->store('workshops/videos', 'public');
        } elseif (!empty($data['video_url'])) {
            $data['video'] = $this->normalizeVideoUrl($data['video_url']);
        }
        unset($data['video_url'], $data['video_file']);

        // Upload workshop image
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('workshops', 'public');
        }

        // Upload instructor image
        if ($request->hasFile('instructor_image')) {
            $data['instructor_image'] = $request->file('instructor_image')->store('instructors', 'public');
        }

        Workshop::create($data);

        return redirect()
            ->route('admin.workshops.index')
            ->with('success', 'Workshop created successfully.');
    }

    public function edit(Workshop $workshop)
    {
        return view('admin.workshops.edit', compact('workshop'));
    }

    /**
     * Update the specified workshop
     */
    public function update(Request $request, Workshop $workshop)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'instructor' => 'required|string|max:255',
            'level' => 'required|string|max:50',
            'duration' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'video_url' => 'nullable|url',
            'video_file' => 'nullable|file|mimes:mp4,mov,ogg,qt|max:20480',
            'image' => 'nullable|image|max:2048',
            'instructor_image' => 'nullable|image|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
            'attendees' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['date'] = $data['date'] ?? $workshop->date ?? now(); // Keep old date if not changed
        $data['status'] = $request->has('status');

        // Replace workshop image if uploaded
        if ($request->hasFile('image')) {
            if ($workshop->image) {
                Storage::disk('public')->delete($workshop->image);
            }
            $data['image'] = $request->file('image')->store('workshops', 'public');
        }

        // Replace instructor image if uploaded
        if ($request->hasFile('instructor_image')) {
            if ($workshop->instructor_image) {
                Storage::disk('public')->delete($workshop->instructor_image);
            }
            $data['instructor_image'] = $request->file('instructor_image')->store('instructors', 'public');
        }

        // Handle video update: file upload takes precedence
        if ($request->hasFile('video_file')) {
            // Delete old file if it was a file (not a URL)
            if ($workshop->video && !preg_match('/^https?:\/\//i', $workshop->video)) {
                Storage::disk('public')->delete($workshop->video);
            }
            $data['video'] = $request->file('video_file')->store('workshops/videos', 'public');
        } elseif (array_key_exists('video_url', $data) && $data['video_url']) {
            // If a new URL is provided, and we had an old file, delete it
            if ($workshop->video && !preg_match('/^https?:\/\//i', $workshop->video)) {
                Storage::disk('public')->delete($workshop->video);
            }
            $data['video'] = $this->normalizeVideoUrl($data['video_url']);
        } else {
            $data['video'] = $workshop->video;
        }
        unset($data['video_url'], $data['video_file']);

        $workshop->update($data);

        return redirect()
            ->route('admin.workshops.index')
            ->with('success', 'Workshop updated successfully.');
    }

    /**
     * Remove the specified workshop
     */
    public function destroy(Workshop $workshop)
    {
        if ($workshop->image) {
            Storage::disk('public')->delete($workshop->image);
        }

        if ($workshop->instructor_image) {
            Storage::disk('public')->delete($workshop->instructor_image);
        }

        if ($workshop->video && !preg_match('/^https?:\/\//i', $workshop->video)) {
            Storage::disk('public')->delete($workshop->video);
        }

        $workshop->delete();

        return redirect()
            ->route('admin.workshops.index')
            ->with('success', 'Workshop deleted successfully.');
    }
}
