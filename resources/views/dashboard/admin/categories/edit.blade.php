@extends('layouts.admin') 

@section('title', 'Edit Category')

@section('content')

<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-pencil-square me-2"></i>Edit Category</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <h5 class="fw-semibold mb-3">✏️ Update Category</h5>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" id="editCategoryForm">
        @csrf
        @method('PUT')

        <!-- Category Name -->
        <div class="mb-3">
            <label for="categoryName" class="form-label fw-semibold">Category Name</label>
            <input 
                type="text" 
                name="name"
                class="form-control @error('name') is-invalid @enderror" 
                id="categoryName" 
                value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

         <!-- Category Image -->
        <div class="mb-3">
            <label for="categoryImage" class="form-label fw-semibold">Category Image</label>
            <input type="file" class="form-control" name="image" id="categoryImage" accept="image/*">
            @if($category->image_path && file_exists(storage_path('app/public/' . $category->image_path)))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $category->image_path) }}" alt="{{ $category->name }}" 
                         class="border rounded p-1" style="width:100px; height:auto;">
                </div>
            @endif
            <small class="text-muted">Upload a new logo only if you want to replace the current one.</small>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="categoryStatus" class="form-label fw-semibold">Status</label>
            <select 
                name="status" 
                id="categoryStatus" 
                class="form-select @error('status') is-invalid @enderror"
            >
                <option value="active" {{ old('status', $category->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $category->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-gradient">
            <i class="bi bi-check2-circle me-2"></i>Update Category
        </button>
    </form>
</div>

@endsection

@push('scripts')
<!-- Add any JS if needed -->
@endpush
