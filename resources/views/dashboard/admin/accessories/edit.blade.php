@extends('layouts.admin')

@section('title', 'Edit Accessory')

@section('content')
<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-star me-2"></i>Edit Accessory</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <form action="{{ route('admin.accessory.update', $accessory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Accessory Name -->
        <div class="mb-3">
            <label for="accessoryName" class="form-label fw-semibold">Accessory Name</label>
            <input type="text" class="form-control" name="name" id="accessoryName" 
                   value="{{ old('name', $accessory->name) }}" required>
        </div>

        <!-- Product Price -->
        <div class="mb-3">
            <label for="accessoryPrice" class="form-label fw-semibold">Price</label>
            <input type="number" name="price" class="form-control" id="accessoryPrice" value="{{ old('price', $accessory->price) }}" placeholder="Enter price">
            @error('price')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Accessory Logo -->
        <div class="mb-3">
            <label for="accessoryImage" class="form-label fw-semibold">Accessory Logo</label>
            <input type="file" class="form-control" name="image_path" id="accessoryImage" accept="image/*">
            @if($accessory->image_path && file_exists(storage_path('app/public/' . $accessory->image_path)))
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $accessory->image_path) }}" alt="{{ $accessory->name }}" 
                         class="border rounded p-1" style="width:100px; height:auto;">
                </div>
            @endif
            <small class="text-muted">Upload a new logo only if you want to replace the current one.</small>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="accessoryStatus" class="form-label fw-semibold">Status</label>
            <select name="status" id="accessoryStatus" class="form-select" required>
                <option value="active" {{ old('status', $accessory->status) === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $accessory->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <!-- Update Button -->
        <button type="submit" class="btn btn-gradient btn-rounded">
            <i class="bi bi-save me-2"></i>Update Accessory
        </button>
    </form>
</div>
@endsection
