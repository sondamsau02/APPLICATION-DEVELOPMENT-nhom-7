<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
class UserController extends Controller
{
    

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        // Create new user
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Trainer created successfully!');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
            'password' => 'required',
        ]);

        // Update user
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Trainer updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Trainer deleted successfully!');
    }

    public function edit_Profile()
    {
        $user = Auth::user();
        return view('auth.edit', compact('user'));

    }

    public function update_profile(Request $request)
    {
        $user = $request->user();
        $this->authorize('update-user-profile', [$user, $user]);
    
        $validatedData = $request->validated();
    
        // Lưu hồ sơ của user
    
        return redirect()->back()->with('success', 'Hồ sơ đã được cập nhật thành công.');
    }
    

    

    
}
