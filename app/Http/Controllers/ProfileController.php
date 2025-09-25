<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
            'phone' => ['required', 'string', 'max:20'],
            'university' => ['nullable', 'string', 'max:255'],
            'student_id' => ['nullable', 'string', 'max:50'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'date_of_birth' => ['nullable', 'date'],
            'department' => ['nullable', 'string', 'max:255'],
            'year_of_study' => ['nullable', 'string', 'max:10'],
            'current_address' => ['nullable', 'string', 'max:500'],
            'home_address' => ['nullable', 'string', 'max:500'],
            'preferred_language' => ['nullable', 'string', 'max:10'],
            'bus_delay_notifications' => ['nullable', 'boolean'],
            'route_change_alerts' => ['nullable', 'boolean'],
            'promotional_offers' => ['nullable', 'boolean'],
        ]);

        $user = $request->user();
        
        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_images', $imageName);
            $user->profile_image = 'profile_images/' . $imageName;
        }

        // Update user data
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->university = $request->university;
        $user->student_id = $request->student_id;
        $user->date_of_birth = $request->date_of_birth;
        $user->department = $request->department;
        $user->year_of_study = $request->year_of_study;
        $user->current_address = $request->current_address;
        $user->home_address = $request->home_address;
        $user->preferred_language = $request->preferred_language;
        $user->bus_delay_notifications = $request->has('bus_delay_notifications');
        $user->route_change_alerts = $request->has('route_change_alerts');
        $user->promotional_offers = $request->has('promotional_offers');

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
