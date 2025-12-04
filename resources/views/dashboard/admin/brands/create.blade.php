@extends('layouts.admin') 

@section('title', 'Add Brand')

@section('content')
    <!-- ========================= Add Brand Section ========================= -->
    <h4 class="mb-4 fw-bold text-dark"><i class="bi bi-star me-2"></i>Add New Brand</h4>

    <div class="card p-4 shadow-sm rounded-3 bg-white">
        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        @endif

        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Select Category -->
            <div class="mb-3">
                <label for="brandCategory" class="form-label fw-semibold">Select Category</label>
                <select id="brandCategory" name="category_id" class="form-select @error('category_id') is-invalid @enderror" >
                    <option value="">-- Choose Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Brand Name -->
            <div class="mb-3">
                <label for="brandName" class="form-label fw-semibold">Brand Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="brandName" value="{{ old('name') }}" placeholder="Enter brand name" >
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Brand Logo -->
            <div class="mb-3">
                <label for="brandLogo" class="form-label fw-semibold">Brand Logo</label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="brandLogo" accept="image/*">
                <small class="text-muted">Upload a clear brand logo (PNG/JPG, max 2MB).</small>
                @error('logo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="brandDescription" class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="brandDescription" rows="3" placeholder="Enter description (optional)">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="brandStatus" class="form-label fw-semibold">Status</label>
                <select name="status" id="brandStatus" class="form-select @error('status') is-invalid @enderror">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-gradient btn-rounded">
                <i class="bi bi-plus-circle me-2"></i>Add Brand
            </button>
        </form>
    </div>
    <!-- ========================= End Add Brand Section ========================= -->
@endsection


@push('scripts')
    {{-- Optional: You can add custom JS here for extra validation or UX --}}
@endpush
