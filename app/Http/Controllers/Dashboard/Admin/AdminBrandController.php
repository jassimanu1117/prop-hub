<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminBrandController extends Controller
{
    /**
     * ===============================
     * BRAND LISTING
     * ===============================
     * Display a paginated list of all brands with their category.
     */
    public function index()
    {
        $brands = Brand::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.admin.brands.index', compact('brands'));
    }

    /**
     * ===============================
     * SHOW CREATE BRAND FORM
     * ===============================
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('dashboard.admin.brands.create', compact('categories'));
    }

    /**
     * ===============================
     * STORE BRAND
     * ===============================
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'status'      => 'nullable|in:active,inactive',
        ]);

        $data['status'] = $data['status'] ?? 'active';
        $data['slug'] = Str::slug($data['name']);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $upload = uploadImage($request->file('logo'), 'brands', true, [150, 150]);
            $data['logo'] = $upload['image'];
            $data['logo_thumb'] = $upload['thumbnail'];
        }

        Brand::create($data);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand added successfully!');
    }

    /**
     * ===============================
     * SHOW EDIT BRAND FORM
     * ===============================
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();

        return view('dashboard.admin.brands.edit', compact('brand', 'categories'));
    }

    /**
     * ===============================
     * UPDATE BRAND
     * ===============================
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'category_id' => 'required|exists:categories,id',
            'logo'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        // Handle logo update
        if ($request->hasFile('logo')) {
            // Delete old main image
            if ($brand->logo && Storage::exists('public/' . $brand->logo)) {
                Storage::delete('public/' . $brand->logo);
            }

            // Delete old thumbnail
            if ($brand->logo_thumb && Storage::exists('public/' . $brand->logo_thumb)) {
                Storage::delete('public/' . $brand->logo_thumb);
            }

            // Upload new image & thumbnail
            $upload = uploadImage($request->file('logo'), 'brands', true, [150, 150]);
            $validated['logo'] = $upload['image'];
            $validated['logo_thumb'] = $upload['thumbnail'];
        }

        $brand->update($validated);

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand updated successfully!');
    }

    /**
     * ===============================
     * DELETE BRAND
     * ===============================
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // Delete main image
        if ($brand->logo && Storage::exists('public/' . $brand->logo)) {
            Storage::delete('public/' . $brand->logo);
        }

        // Delete thumbnail image
        if ($brand->logo_thumb && Storage::exists('public/' . $brand->logo_thumb)) {
            Storage::delete('public/' . $brand->logo_thumb);
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'Brand deleted successfully!');
    }
}
