@extends('layouts.admin') 

@section('title', 'Add Category')

@section('content')

<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-tags me-2"></i> Add New Category</h4>

<!-- Add Category Section -->
<div class="card p-4 shadow-sm rounded-3 bg-white">
    <h5 class="fw-semibold mb-3">➕ Add Category</h5>

    <!-- Form Start -->
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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

           <!-- Category Image -->
            <div class="mb-3">
                <label for="categoryLogo" class="form-label fw-semibold">Category Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="categoryLogo" accept="image/*">
                <small class="text-muted">Upload a clear Category logo (PNG/JPG, max 2MB).</small>
                @error('image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

    
        <!-- Status -->
        <div class="mb-3">
            <label for="categoryStatus" class="form-label fw-semibold">Status</label>
            <select 
                name="status" 
                id="categoryStatus" 
                class="form-select @error('status') is-invalid @enderror"
             >
                <option value="active" >Active</option>
                <option value="inactive">Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-gradient">
            <i class="bi bi-plus-circle me-2"></i> Add Category
        </button>
    </form>
    <!-- Form End -->
</div>

@endsection

@push('scripts')
    {{-- Optional: You can add custom JS here for extra validation or UX --}}
@endpush
