<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'bio' => 'nullable|string|max:500',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg|max:15360', // Maksimal 15 MB
            'feeds_per_row' => 'required|integer|min:1|max:6',
        ]);

        $user = Auth::user();

        // Update name dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update bio dan feeds_per_row
        $user->bio = $request->bio;
        $user->feeds_per_row = $request->feeds_per_row;

        // Update profile picture jika ada file baru
        if ($request->hasFile('profile_photo_path')) {
            // Hapus file lama jika ada
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Simpan file baru di direktori 'profile'
            $user->profile_photo_path = $request->file('profile_photo_path')->store('profile', 'public');
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
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
