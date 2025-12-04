@extends('layouts.admin')

@section('title', 'Edit Brand')

@section('content')
<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-star me-2"></i>Edit Brand</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Select Category -->
        <div class="mb-3">
            <label for="brandCategory" class="form-label fw-semibold">Select Category</label>
            <select id="brandCategory" name="category_id" class="form-select" required>
                <option value="">-- Choose Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ (old('category_id', $brand->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Brand Name -->
        <div class="mb-3">
            <label for="brandName" class="form-label fw-semibold">Brand Name</label>
            <input type="text" class="form-control" name="name" id="brandName" 
                   value="{{ old('name', $brand->name) }}" required>
        </div>

        <!-- Brand Logo -->
        <div class="mb-3">
            <label for="brandLogo" class="form-label fw-semibold">Brand Logo</label>
            <input type="file" class="form-control" name="logo" id="brandLogo" accept="image/*">
            @if($brand->logo && file_exists(storage_path('app/public/' . $brand->logo)))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" 
                         class="border rounded p-1" style="width:100px; height:auto;">
                </div>
            @endif
            <small class="text-muted">Upload a new logo only if you want to replace the current one.</small>
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="brandDescription" class="form-label fw-semibold">Description</label>
            <textarea class="form-control" name="description" id="brandDescription" rows="3">{{ old('description', $brand->description) }}</textarea>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="brandStatus" class="form-label fw-semibold">Status</label>
            <select name="status" id="brandStatus" class="form-select" required>
                <option value="active" {{ old('status', $brand->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $brand->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Update Button -->
        <button type="submit" class="btn btn-gradient btn-rounded">
            <i class="bi bi-save me-2"></i>Update Brand
        </button>
    </form>
</div>
@endsection
