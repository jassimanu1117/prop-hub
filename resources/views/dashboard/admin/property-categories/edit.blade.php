@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')

<h4 class="mb-4 fw-bold text-dark">
    <i class="bi bi-tags me-2"></i> Edit Category
</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
   
    <form action="{{ route('admin.property.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Parent Category -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Parent Category (Optional)</label>
            <select name="parent_id" class="form-select">
                <option value="">-- No Parent (Main Category) --</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Category Name -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Category Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control"
                value="{{ old('name', $category->name) }}"
            >
        </div>

        <!-- Type Group -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Type Group</label>
            <select name="type_group" class="form-select">
                <option value="">Select Group</option>
                <option value="property" 
                    {{ old('type_group', $category->type_group) == 'property' ? 'selected' : '' }}>
                    Property
                </option>

                <option value="tolet" 
                    {{ old('type_group', $category->type_group) == 'tolet' ? 'selected' : '' }}>
                    Rooms / PG / To-Let
                </option>
            </select>
        </div>

        <!-- Category Image -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Category Image</label>

            @if($category->image_thumb)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $category->image_thumb) }}"
                         class="img-thumbnail" width="80">
                </div>
            @endif

            <input 
                type="file" 
                name="image"
                class="form-control"
                accept="image/*"
            >
            <small class="text-muted">Upload a clear image (PNG/JPG, max 2MB)</small>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea 
                class="form-control" 
                name="description" 
                rows="3"
            >{{ old('description', $category->description) }}</textarea>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Status</label>
            <select name="status" class="form-select">
                <option value="active" 
                    {{ old('status', $category->status) == 'active' ? 'selected' : '' }}>
                    Active
                </option>

                <option value="inactive" 
                    {{ old('status', $category->status) == 'inactive' ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-gradient">
            <i class="bi bi-save me-2"></i> Update Category
        </button>

    </form>
</div>

@endsection
