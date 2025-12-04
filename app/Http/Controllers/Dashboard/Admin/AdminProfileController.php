<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminProfile;
use App\Models\AdminSocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminProfileController extends Controller
{
    /**
     * Display the admin profile page.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $profile = $admin->profile;
        $socialLinks = $admin->socialLinks
            ->pluck('platform_url', 'platform_name'); // e.g. ['facebook' => '...', 'twitter' => '...']

        return view('dashboard.admin.profile.index', compact('admin', 'profile', 'socialLinks'));
    }

    /**
     * Update the admin profile information.
     */
    public function update(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        //Validate all inputs
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => ['required', 'email', Rule::unique('admins', 'email')->ignore($admin->id)],
            'phone'             => 'nullable|string|max:20',
            'address'           => 'nullable|string|max:500',
            'profile_image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'current_password'  => 'nullable|required_with:new_password|string',
            'new_password'      => 'nullable|min:6|confirmed',
            'facebook_url'      => 'nullable|url',
            'twitter_url'       => 'nullable|url',
            'linkedin_url'      => 'nullable|url',
        ]);

        /*
        |--------------------------------------------------------------------------
        | 1️ Update basic admin info
        |--------------------------------------------------------------------------
        */
        $admin->name = $validated['name'];
        $admin->email = $validated['email'];
        $admin->save();

        /*
        |--------------------------------------------------------------------------
        | 2️ Update or create profile info (phone, address, image)
        |--------------------------------------------------------------------------
        */
        $profile = $admin->profile ?: new AdminProfile();
        $profile->admin_id = $admin->id;
        $profile->phone = $validated['phone'] ?? $profile->phone;
        $profile->address = $validated['address'] ?? $profile->address;

        // Handle profile image upload & remove old one
        if ($request->hasFile('profile_image')) {
            // Delete old main + thumb if exist
            if ($profile->profile_image && Storage::disk('public')->exists($profile->profile_image)) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            if ($profile->profile_image_thumb && Storage::disk('public')->exists($profile->profile_image_thumb)) {
                Storage::disk('public')->delete($profile->profile_image_thumb);
            }

            // Upload new image using your existing helper
            $upload = uploadImage($request->file('profile_image'), 'profiles', true, [150, 150]);
            $profile->profile_image = $upload['image'];
            $profile->profile_image_thumb = $upload['thumbnail'];
        }

        $profile->save();

        /*
        |--------------------------------------------------------------------------
        | 3️ Handle password change (optional)
        |--------------------------------------------------------------------------
        */
        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->current_password, $admin->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            $admin->password = Hash::make($request->new_password);
            $admin->save();
        }

        /*
        |--------------------------------------------------------------------------
        | 4️ Handle Social Links (Separate Table)
        |--------------------------------------------------------------------------
        */
        $socialData = [
            'facebook' => $request->facebook_url,
            'twitter'  => $request->twitter_url,
            'linkedin' => $request->linkedin_url,
        ];

        foreach ($socialData as $platform => $url) {
            if ($url) {
                AdminSocialLink::updateOrCreate(
                    ['admin_id' => $admin->id, 'platform_name' => $platform],
                    ['platform_url' => $url]
                );
            } else {
                AdminSocialLink::where('admin_id', $admin->id)
                    ->where('platform_name', $platform)
                    ->delete();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | 5️ Redirect back with success
        |--------------------------------------------------------------------------
        */
        return redirect()->route('admin.profile.index')->with('success', 'Profile updated successfully!');
    }
}
