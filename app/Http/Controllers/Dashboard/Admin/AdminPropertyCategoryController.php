<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPropertyCategoryController extends Controller
{

    /**
     * ===============================
     * CATEGORY LISTING
     * ===============================
     * Display a paginated list of all categories.
     */
    public function index()
    {
        // Fetch property categories with parent name also
        $categories = PropertyCategory::with('parent')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.admin.property-categories.index', compact('categories'));
    }


    /**
     * ===============================
     * SHOW CREATE FORM
     * ===============================
     * Display the form for creating a new category.
     */
    public function create(){
        $categories = PropertyCategory::whereNull('parent_id')->get();
       return view('dashboard.admin.property-categories.create', compact('categories'));

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
            'name'        => 'required|unique:property_categories,name|max:255',
            'parent_id'   => 'nullable|exists:property_categories,id',
            'type_group'  => 'required|in:property,tolet',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Generate slug
        $data['slug'] = Str::slug($data['name']);

        // Upload image (optional)
        if ($request->hasFile('image')) {
            $upload = uploadImage($request->file('image'), 'property-categories', true, [150, 150]);

            $data['image_path']  = $upload['image'];
            $data['image_thumb'] = $upload['thumbnail'];
        }

         // Handle image upload
        if ($request->hasFile('image')) {
            $upload = uploadImage($request->file('image'), 'categories', true, [150, 150]);
            $data['image_path'] = $upload['image'];
            $data['image_thumb'] = $upload['thumbnail'];
        }

        // Save record
        PropertyCategory::create($data);

        return redirect()
            ->route('admin.property.categories.index')
            ->with('success', 'Property category added successfully');
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
        $category = PropertyCategory::findOrFail($id);

        // Fetch property categories with parent name also
        $categories = PropertyCategory::with('parent')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.admin.property-categories.edit', compact('category','categories'));
    }

   
    /**
     * ===============================
     * UPDATE CATEGORY
     * ===============================
     * Validate and update the specified category in the database.
     */
    public function update(Request $request, $id)
    {
        $category = PropertyCategory::findOrFail($id);

        // Validation
        $data = $request->validate([
            'parent_id'   => 'nullable|exists:property_categories,id',
            'name'        => 'required|max:255|unique:property_categories,name,' . $id,
            'type_group'  => 'required|in:property,tolet',
            'description' => 'nullable|string',
            'status'      => 'required|in:active,inactive',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Slug update only if name changed
        if ($category->name !== $data['name']) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Image upload
        if ($request->hasFile('image')) {

            // Delete old image files
            if (!empty($category->image_path) && file_exists(storage_path('app/public/' . $category->image_path))) {
                unlink(storage_path('app/public/' . $category->image_path));
            }

            if (!empty($category->image_thumb) && file_exists(storage_path('app/public/' . $category->image_thumb))) {
                unlink(storage_path('app/public/' . $category->image_thumb));
            }

            // Upload new image
            $upload = uploadImage($request->file('image'), 'property-categories', true, [150, 150]);
            $data['image_path']  = $upload['image'];
            $data['image_thumb'] = $upload['thumbnail'];
        }

        // Update in DB
        $category->update($data);

        return redirect()
            ->route('admin.property.categories.index')
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
        $category = PropertyCategory::findOrFail($id);

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
            ->route('admin.property.categories.index')
            ->with('success', 'Category deleted successfully');
    }
    
}



