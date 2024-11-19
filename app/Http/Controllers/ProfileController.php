<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Storage;

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

        return Redirect::route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    /**
     * Update the user's profile img.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image',
        ]);

        if ($request->has('avatar') && $request->file('avatar')->isValid()) {
            $avatarpath = $request->file('avatar')->store('avatars', 'public');

            Storage::disk('public')->delete(Auth()->user()->avatar ?? '');

            Auth()->user()->update(['avatar' => $avatarpath]);
        } else {
            return redirect()->back()->withErrors(['avatar' => 'File upload failed or no file selected.']);
        }

        return redirect()->back()->with('success', 'Avatar updated successfully!');
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

}
