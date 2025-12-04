<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Storage;
class AdminSiteSettingsController extends Controller
{
    /**
     * Show settings page.
     */
    public function index()
    {
        $settings = SiteSetting::first(); // Only one row needed
        return view('dashboard.admin.site-settings.index', compact('settings'));
    }

    /**
     * Create or update site settings.
     */
    public function update(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'site_name'    => 'required|string|max:255',
            'site_email'   => 'nullable|email',
            'site_phone'   => 'nullable|string|max:20',
            'site_address' => 'nullable|string|max:500',
            'footer_text'  => 'nullable|string|max:500',
            'logo'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /*
        |--------------------------------------------------------------------------
        | 1️ Fetch or Create Row
        |--------------------------------------------------------------------------
        */
        $settings = SiteSetting::first() ?? new SiteSetting();


        /*
        |--------------------------------------------------------------------------
        | 2️ Handle Logo Upload
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('logo')) {

            // Delete old logo + thumb
            if ($settings->logo && Storage::disk('public')->exists($settings->logo)) {
                Storage::disk('public')->delete($settings->logo);
            }
            if ($settings->logo_thumb && Storage::disk('public')->exists($settings->logo_thumb)) {
                Storage::disk('public')->delete($settings->logo_thumb);
            }

            // Upload new logo using your helper
            $upload = uploadImage($request->file('logo'), 'logos', true, [150,150]);
            $settings->logo = $upload['image'];
            $settings->logo_thumb = $upload['thumbnail'];
        }

        /*
        |--------------------------------------------------------------------------
        | 4️ Save Basic Settings
        |--------------------------------------------------------------------------
        */
        $settings->site_name    = $validated['site_name'];
        $settings->site_email   = $validated['site_email'] ?? null;
        $settings->site_phone   = $validated['site_phone'] ?? null;
        $settings->site_address = $validated['site_address'] ?? null;
        $settings->footer_text  = $validated['footer_text'] ?? null;
        $settings->save();


        /*
        |--------------------------------------------------------------------------
        | 5️ Redirect Back
        |--------------------------------------------------------------------------
        */
        return back()->with('success', 'Site settings updated successfully!');
    }
}
