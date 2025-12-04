@extends('layouts.admin')

@section('title', 'Property Categories')

@section('content')
<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-tags me-2"></i>Property Categories</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.property.categories.create') }}" class="btn btn-gradient btn-rounded">
            <i class="bi bi-plus-circle me-2"></i>Add New Category
        </a>
    </div>

    <div class="table-responsive">
        <table id="categoryTable" class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Parent Category</th>
                    <th>Group</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $index => $category)
                <tr>
                    <td>{{ $categories->firstItem() + $index }}</td>

                    <!-- Category Name -->
                    <td>{{ $category->name }}</td>
                    
                      <td>
                        @if($category->image_thumb && file_exists(storage_path('app/public/' . $category->image_thumb)))
                        <img src="{{ asset('storage/' . $category->image_thumb) }}" alt="{{ $category->name }}"
                        class="img-fluid rounded" style="width:50px; height:50px; object-fit:cover;">
                        @else
                        <div class="logo-placeholder rounded d-flex align-items-center justify-content-center" 
                        style="width:50px; height:50px; background-color:#e0e0e0; color:#555; font-weight:bold; font-size:12px;">
                        {{ strtoupper(substr($category->name ?? '-', 0, 1)) }}
                        </div>
                        @endif
                    </td>

                    

                    <!-- Parent Category -->
                    <td>
                        {{ $category->parent->name ?? 'Main Category' }}
                    </td>

                    <!-- Property Group -->
                    <td>
                        @if($category->type_group === 'property')
                            <span class="badge bg-primary">Property</span>
                        @elseif($category->type_group === 'tolet')
                            <span class="badge bg-info text-dark">To-Let</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>

                    <!-- Status -->
                    <td>
                        @if($category->status === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-warning text-dark">Inactive</span>
                        @endif
                    </td>

                    <!-- Created -->
                    <td>{{ $category->created_at->format('Y-m-d') }}</td>

                    <!-- Actions -->
                    <td>
                        <a href="{{ route('admin.property.categories.edit', $category->id) }}" 
                            class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('admin.property.categories.destroy', $category->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-sm btn-danger deleteBtn"
                                onclick="return confirm('Delete this category?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No categories found.</td>
                </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-3">
        {{ $categories->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    @if($categories->count() > 0)
    $('#categoryTable').DataTable({
        paging: false,
        searching: true,
        info: false,
    });
    @endif
});
</script>
@endpush
