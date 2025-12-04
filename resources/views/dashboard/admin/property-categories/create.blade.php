@extends('layouts.admin') 

@section('title', 'Add Category')

@section('content')

<h4 class="mb-4 fw-bold text-dark">
    <i class="bi bi-tags me-2"></i> Add New Category
</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <h5 class="fw-semibold mb-3">➕ Add Category</h5>

    <form action="{{ route('admin.property.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Parent Category -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Parent Category (Optional)</label>
            <select name="parent_id" class="form-select">
                <option value="">-- No Parent (Main Category) --</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Category Name -->
        <div class="mb-3">
            <label for="categoryName" class="form-label fw-semibold">Category Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control @error('name') is-invalid @enderror" 
                id="categoryName"
                placeholder="Enter category name"
                value="{{ old('name') }}"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Type Group -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Type Group</label>
            <select name="type_group"  class="form-select @error('type_group') is-invalid @enderror">
                <option value="">Select Group</option>
                <option value="property" {{ old('type_group') == 'property' ? 'selected' : '' }}>Property</option>
                <option value="tolet" {{ old('type_group') == 'tolet' ? 'selected' : '' }}>Rooms / PG / To-Let</option>
            </select>
            @error('type_group')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Category Image -->
        <div class="mb-3">
            <label for="categoryLogo" class="form-label fw-semibold">Category Image</label>
            <input 
                type="file" 
                name="image" 
                class="form-control @error('image') is-invalid @enderror" 
                id="categoryLogo" 
                accept="image/*"
            >

            <small class="text-muted">Upload a clear image (PNG/JPG, max 2MB)</small>
            
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="categoryDescription" class="form-label fw-semibold">Description</label>
            <textarea 
                class="form-control" 
                name="description" 
                id="categoryDescription" 
                rows="3"
                placeholder="Optional description"
            >{{ old('description') }}</textarea>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="categoryStatus" class="form-label fw-semibold">Status</label>
            <select 
                name="status" 
                id="categoryStatus" 
                class="form-select @error('status') is-invalid @enderror"
            >
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-gradient">
            <i class="bi bi-plus-circle me-2"></i> Add Category
        </button>
    </form>
</div>

@endsection

@push('scripts')
@endpush
