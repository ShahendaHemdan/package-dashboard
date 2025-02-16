<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $users = User::where('role','user')->get();
    return view('admin.users.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
{
    // Validate incoming request
    $validatedData = $request->validated();

    // Hash the password
    $validatedData['password'] = Hash::make($validatedData['password']);

    // Handle file uploads
    if ($request->hasFile('image')) {
        $validatedData['image'] = $request->file('image')->store('images', 'public');
    }

    $user =User::create($validatedData);
    $user->assignRole('user');

    return redirect()->route('users.index')->with('success', 'User created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request,User $user)
{

    // Validate the request
    $validatedData = $request->validated();

    // Hash the password if provided
    if ($request->filled('password')) {
        $validatedData['password'] = Hash::make($request->input('password'));
    } else {
        unset($validatedData['password']);
    }

    // Handle file uploads
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($user->image && Storage::exists('public/' . $user->image)) {
            Storage::delete('public/' . $user->image);
        }   

        $validatedData['image'] = $request->file('image')->store('images', 'public');
    }

    // Update the user with the validated data
    $user->update($validatedData);

    return redirect()->route('users.index')->with('success', 'User updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Delete associated files if they exist
        if ($user->image && Storage::exists('public/' . $user->image)) {
            Storage::delete('public/' . $user->image);
        }
    
        // Delete the user record
        $user->delete();
    
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
    
}
