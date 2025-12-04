<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accessory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminAccessoryController extends Controller
{
   /**
     * ===============================
     * ACCESSORY LISTING
     * ===============================
     * Display a paginated list of all accessories .
     */
    public function index()
    {
        $accessories = Accessory::latest()->paginate(10); // Get all accessories
        $totalAccessories = Accessory::count();

        return view('dashboard.admin.accessories.index', compact('accessories', 'totalAccessories'));
    }

    /**
     * ===============================
     * SHOW CREATE ACCESSORY FORM
     * ===============================
     */
    public function create()
    {
        return view('dashboard.admin.accessories.create');
    }

    /**
     * ===============================
     * STORE ACCESSORY
     * ===============================
     */
    public function store(Request $request)
    {
        // Validate input data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status'      => 'nullable|in:active,inactive',
        ]);

        $data['status'] = $data['status'] ?? 'active';
        $data['slug'] = Str::slug($data['name']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $upload = uploadImage($request->file('logo'), 'accessories', true, [150, 150]);
            $data['image_path'] = $upload['image'];
            $data['image_thumb'] = $upload['thumbnail'];
        }

        // Save to database
        Accessory::create($data);

        // Redirect back with success message
        return redirect()->route('admin.accessory.index')->with('success', 'Accessory added successfully!');
    }

    /**
     * ===============================
     * SHOW EDIT ACCESSARY FORM
     * ===============================
     */
    public function edit($id)
    {
        // Find accessory by ID or fail with 404
        $accessory = Accessory::findOrFail($id);

        return view('dashboard.admin.accessories.edit', compact('accessory'));
    }

    /**
     * ===============================
     * UPDATE ACCESSARY
     * ===============================
     */
    public function update(Request $request, $id)
    {
        $accessory = Accessory::findOrFail($id);

       $validated = $request->validate([
        'name'        => 'required|string|max:255|unique:accessories,name,' . $accessory->id,
        'price'       => 'required|numeric',
        'image_path'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status'      => 'required|in:active,inactive',
    ]);

    $validated['slug'] = Str::slug($validated['name']);


        // Handle logo update
        if ($request->hasFile('image_path')) {
            // Delete old main image
            if ($accessory->image_path && Storage::exists('public/' . $accessory->image_path)) {
                Storage::delete('public/' . $accessory->image_path);
            }

            // Delete old thumbnail
            if ($accessory->image_thumb && Storage::exists('public/' . $accessory->image_thumb)) {
                Storage::delete('public/' . $accessory->image_thumb);
            }

            // Upload new image & thumbnail
            $upload = uploadImage($request->file('image_path'), 'brands', true, [150, 150]);
            $validated['image_path'] = $upload['image'];
            $validated['image_thumb'] = $upload['thumbnail'];
        }

        $accessory->update($validated);

        return redirect()->route('admin.accessory.index')
            ->with('success', 'Accessory updated successfully!');
    }

    /**
     * ===============================
     * DELETE ACCESSARY
     * ===============================
     */
    public function destroy($id)
    {
        $accessory = Accessory::findOrFail($id);

        // Delete main image
        if ($accessory->image_path && Storage::exists('public/' . $accessory->image_path)) {
            Storage::delete('public/' . $accessory->image_path);
        }

        // Delete thumbnail image
        if ($accessory->image_thumb && Storage::exists('public/' . $accessory->image_thumb)) {
            Storage::delete('public/' . $accessory->image_thumb);
        }

        $accessory->delete();

        return redirect()->route('admin.accessory.index')
            ->with('success', 'Accessory deleted successfully!');
    }
}
