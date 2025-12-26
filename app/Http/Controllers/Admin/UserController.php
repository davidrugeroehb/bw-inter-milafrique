<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $request->has('is_admin'),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol aangemaakt!');
    }


    public function toggleAdmin(User $user)
    {

        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Je kunt je eigen admin rechten niet wijzigen!');
        }

        $user->is_admin = !$user->is_admin;
        $user->save();

        $status = $user->is_admin ? 'toegekend' : 'afgenomen';
        return redirect()->route('admin.users.index')->with('success', "Admin rechten succesvol {$status}!");
    }


    public function destroy(User $user)
    {

        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'Je kunt jezelf niet verwijderen!');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Gebruiker succesvol verwijderd!');
    }
}
