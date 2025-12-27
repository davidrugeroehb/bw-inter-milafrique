<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
public function show(User $user)
{
    return view('profile.show', compact('user'));
}


public function editDetails()
{
    $user = auth()->user();
    return view('profile.edit-details', compact('user'));
}


public function updateDetails(Request $request)
{
    $user = auth()->user();

    $validated = $request->validate([
        'username' => 'nullable|string|max:255',
        'birthday' => 'nullable|date',
        'position' => 'nullable|string|max:255',
        'jersey_number' => 'nullable|integer|min:1|max:99',
        'bio' => 'nullable|string|max:500',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);


    $user->username = $validated['username'];
    $user->birthday = $validated['birthday'];
    $user->position = $validated['position'];
    $user->jersey_number = $validated['jersey_number'];
    $user->bio = $validated['bio'];


    if ($request->hasFile('profile_photo')) {

        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }


        $user->profile_photo = $request->file('profile_photo')->store('profiles', 'public');
    }

    $user->save();

    return redirect()->route('profile.edit.details')->with('success', 'Profiel succesvol bijgewerkt!');
}
public function index()
{
    $spelers = User::whereNotNull('username')
                   ->orWhereNotNull('position')
                   ->orWhereNotNull('jersey_number')
                   ->orderBy('jersey_number')
                   ->get();

    return view('spelers.index', compact('spelers'));
}
}
