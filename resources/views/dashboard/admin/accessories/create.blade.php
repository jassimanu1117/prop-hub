@extends('layouts.admin') 

@section('title', 'Add accessory')

@section('content')
    <!-- ========================= Add accessory Section ========================= -->
    <h4 class="mb-4 fw-bold text-dark"><i class="bi bi-star me-2"></i>Add New Accessory</h4>

    <div class="card p-4 shadow-sm rounded-3 bg-white">
        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        @endif

        <form action="{{ route('admin.accessory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!--Accessory Name -->
            <div class="mb-3">
                <label for="accessoryName" class="form-label fw-semibold">Accessory Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="accessoryName" value="{{ old('name') }}" placeholder="Enter accessory name" >
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

             <!-- Price -->
            <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" placeholder="Enter price">
            @error('price')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
           </div>

            <!-- Accessory Logo -->
            <div class="mb-3">
                <label for="accessoryLogo" class="form-label fw-semibold">Accessory Logo</label>
                <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="accessoryLogo" accept="image/*">
                <small class="text-muted">Upload a clear Accessory logo (PNG/JPG, max 2MB).</small>
                @error('logo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="accessoryStatus" class="form-label fw-semibold">Status</label>
                <select name="status" id="accessoryStatus" class="form-select @error('status') is-invalid @enderror">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-gradient btn-rounded">
                <i class="bi bi-plus-circle me-2"></i>Add Accessory
            </button>
        </form>
    </div>
    <!-- ========================= End Add Accessory Section ========================= -->
@endsection


@push('scripts')
    {{-- Optional: You can add custom JS here for extra validation or UX --}}
@endpush
