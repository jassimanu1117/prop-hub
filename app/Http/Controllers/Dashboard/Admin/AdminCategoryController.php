<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * ===============================
     * CATEGORY LISTING
     * ===============================
     * Display a paginated list of all categories.
     */
      public function index()
      {
        // Fetch categories ordered by newest first, paginate 10 per page
        $categories = Category::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.admin.categories.index', compact('categories'));
     }

    /**
     * ===============================
     * SHOW CREATE FORM
     * ===============================
     * Display the form for creating a new category.
     */
    public function create()
    {
        return view('dashboard.admin.categories.create');
    }

    /**
     * ===============================
     * STORE NEW CATEGORY
     * ===============================
     * Validate and store a newly created category in the database.
     */
    public function store(Request $request)
    {
        // Validate input
        $data = $request->validate([
            'name'   => 'required|unique:categories,name|max:255',
            'image'     => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

       $data['status'] = $data['status'] ?? 'active';
       $data['slug'] = Str::slug($data['name']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $upload = uploadImage($request->file('image'), 'categories', true, [150, 150]);
            $data['image_path'] = $upload['image'];
            $data['image_thumb'] = $upload['thumbnail'];
        }

        // Save to database
        Category::create($data);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category added successfully');
    }

    /**
     * ===============================
     * SHOW EDIT FORM
     * ===============================
     * Display the form for editing an existing category.
     */
    public function edit($id)
    {
        // Find category by ID or fail with 404
        $category = Category::findOrFail($id);

        return view('dashboard.admin.categories.edit', compact('category'));
    }

    /**
     * ===============================
     * UPDATE CATEGORY
     * ===============================
     * Validate and update the specified category in the database.
     */
    public function update(Request $request, $id)
    {
        // Find category by ID
        $category = Category::findOrFail($id);

        // Validate input
        $validated = $request->validate([
            'name'   => 'required|string|max:255|unique:categories,name,' . $category->id,
            'image'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        // Handle logo update
        if ($request->hasFile('image')) {
            // Delete old main image
            if ($category->image_path && Storage::exists('public/' . $category->image_path)) {
                Storage::delete('public/' . $category->image_path);
            }

            // Delete old thumbnail
            if ($category->image_thumb && Storage::exists('public/' . $category->image_thumb)) {
                Storage::delete('public/' . $category->image_thumb);
            }

            // Upload new image & thumbnail
            $upload = uploadImage($request->file('image'), 'categories', true, [150, 150]);
            $validated['image_path'] = $upload['image'];
            $validated['image_thumb'] = $upload['thumbnail'];
        }

        // Update category using validated data
        $category->update($validated);

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    /**
     * ===============================
     * DELETE CATEGORY
     * ===============================
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        // Find category by ID
        $category = Category::findOrFail($id);

          // Delete main image
        if ($category->image_path && Storage::exists('public/' . $category->image_path)) {
            Storage::delete('public/' . $category->image_path);
        }

        // Delete thumbnail image
        if ($category->image_thumb && Storage::exists('public/' . $category->image_thumb)) {
            Storage::delete('public/' . $category->image_thumb);
        }

        // Delete category
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}
