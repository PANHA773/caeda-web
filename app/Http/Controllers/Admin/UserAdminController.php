<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAdminController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show form to create a new user
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'permissions' => 'nullable|array',
            'is_admin' => 'boolean',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Ensure permissions is an array if not provided
        $data['permissions'] = $request->input('permissions', []);

        // Ensure is_admin is boolean logic
        $data['is_admin'] = $request->has('is_admin');

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show form to edit an existing user
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update an existing user
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'permissions' => 'nullable|array',
            'is_admin' => 'boolean',
            'avatar' => 'nullable|image|max:2048',
        ]);

        // Only update password if provided
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data['permissions'] = $request->input('permissions', []);
        $data['is_admin'] = $request->has('is_admin');

        if ($request->hasFile('avatar')) {
            // Optional: delete old avatar if exists
            // if ($user->avatar) {
            //     Storage::disk('public')->delete($user->avatar);
            // }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Delete a user
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Show a single user's details
     */
    public function show(User $user)
    {
        // Dynamically get all columns of users table
        $columns = Schema::getColumnListing('users');

        return view('admin.users.show', compact('user', 'columns'));
    }
}
