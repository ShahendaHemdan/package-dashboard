<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{

    public function index()
    {
        $admins = User::where('role','!=','user')->paginate();

        return view('admin.ManageAdmins.index', compact('admins'));
        
    }
    public function create()
    {

        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.ManageAdmins.create', compact('roles', 'permissions'));
    }

    public function show(User $admin)
    {
        return view('admin.ManageAdmins.show', compact('admin'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ]);
    
        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/admins', 'public');
        }
        // Create the new admin
        $admin = new User();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->image = $imagePath;
        $admin->password = Hash::make($request->input('password'));
        $admin->role_id = $request->input('role_id');
        $admin->role='admin';

        $admin->save();
    
        // Fetch the role and assign it to the admin
        $role = Role::find($request->input('role_id'));
        $admin->assignRole($role->name);
    
        // Assign permissions to the role (if provided)
        if ($request->filled('permissions')) {
            // Sync permissions with the role
            $role->syncPermissions($request->permissions);
    
            // Assign the same permissions to the admin
            $admin->syncPermissions($request->permissions);
        }
    
        return redirect()->route('admins.index')->with('success', 'Admin created successfully!');
    }
    


    public function edit(User $admin)
    {
        $roles = Role::all();
        return view('admin.ManageAdmins.edit', compact('admin', 'roles'));
    }

    public function update(Request $request, User $admin)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin
                ->id . ',id',
            'password' => 'nullable|string|min:8',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:204',
            'role_id' => 'required|exists:roles,id',
        ]);
        // Handle file upload
        $imagePath = $admin->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/admins', 'public');
        }

        // Only update password if it was provided
        if ($request->filled('password')) {
            $password = Hash::make($request->input('password'));
        }

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->image = $imagePath;
        $admin->password = $password;
        $admin->role_id = $request->input('role_id');
        $admin->save();
        // Assign role after checking role existence
        $role = Role::find($request->input('role_id'));
        if ($role) {
            $admin->assignRole($role->name);
        }
        return redirect()->route('admins.index')->with('success', 'Admin updated successfully!');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully!');
    }
}
