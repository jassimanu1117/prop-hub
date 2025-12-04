@extends('layouts.admin')

@section('title', 'Brand Listing')

@section('content')
<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-star me-2"></i>Brand Listing</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.brands.create') }}" class="btn btn-gradient btn-rounded">
            <i class="bi bi-plus-circle me-2"></i>Add New Brand
        </a>
    </div>

    <div class="table-responsive">
        <table id="brandTable" class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Logo</th>
                    <th>Brand Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($brands as $key => $brand)
                <tr>
                    <td>{{ $brands->firstItem() + $key }}</td>
                    <td>
                        @if($brand->logo_thumb && file_exists(storage_path('app/public/' . $brand->logo_thumb)))
                        <img src="{{ asset('storage/' . $brand->logo_thumb) }}" alt="{{ $brand->name }}"
                        class="img-fluid rounded" style="width:50px; height:50px; object-fit:cover;">
                        @else
                        <div class="logo-placeholder rounded d-flex align-items-center justify-content-center" 
                        style="width:50px; height:50px; background-color:#e0e0e0; color:#555; font-weight:bold; font-size:12px;">
                        {{ strtoupper(substr($brand->name ?? '-', 0, 1)) }}
                        </div>
                        @endif
                    </td>
                    <td>{{ $brand->name ?? '-' }}</td>
                    <td>{{ $brand->category->name ?? '-' }}</td>
                    <td>{{ $brand->description ?? '-' }}</td>
                    <td>
                        @if(($brand->status ?? null) === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $brand->created_at?->format('Y-m-d') ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.brands.edit', $brand?->id ?? 0) }}" class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('admin.brands.destroy', $brand?->id ?? 0) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger deleteBtn" onclick="return confirm('Are you sure you want to delete this brand?');">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No brands found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $brands->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
  $(document).ready(function() {
        @if($brands->count() > 0)
            $('#brandTable').DataTable({
                paging: false,
                searching: true,
                info: false,
            });
        @endif
    });    
</script>
@endpush
