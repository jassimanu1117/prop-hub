@extends('layouts.admin')

@section('title', 'Category Listing')

@section('content')
<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-tags me-2"></i>Category Listing</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-gradient btn-rounded">
            <i class="bi bi-plus-circle me-2"></i>Add New Category
        </a>
    </div>

    <div class="table-responsive">
        <table id="categoryTable" class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $index => $category)
                <tr>
                    <td>{{ $categories->firstItem() + $index }}</td>
                    <td>{{ $category->name ?? '-' }}</td>
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
                    <td>
                        @if(($category->status ?? null) === 'active')
                            <span class="badge bg-success">Active</span>
                        @elseif(($category->status ?? null) === 'inactive')
                            <span class="badge bg-warning text-dark">Inactive</span>
                        @else
                            <span class="badge bg-secondary">-</span>
                        @endif
                    </td>
                    <td>{{ $category->created_at?->format('Y-m-d') ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category?->id ?? 0) }}" class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category?->id ?? 0) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger deleteBtn" onclick="return confirm('Are you sure you want to delete this category?');">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No categories found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $categories->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
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
