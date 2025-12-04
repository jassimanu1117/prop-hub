@extends('layouts.admin') 

@section('title', 'Product Listing')

@section('content')
<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-box-seam me-2"></i>Product Listing</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.products.create') }}" class="btn btn-gradient btn-rounded">
            <i class="bi bi-plus-circle me-2"></i>Add New Product
        </a>
    </div>

    <div class="table-responsive">
        <table id="productTable" class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Gender</th>
                    <th>Price</th>
                    <th>Flags</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $key => $product)
                <tr>
                    <td>{{ $products->firstItem() + $key }}</td>

                    {{-- Show first thumbnail image if exists --}}
                    <td>
                        @php
                            $firstImage = $product->images->first();
                        @endphp
                        @if($firstImage && file_exists(storage_path('app/public/' . $firstImage->image_thumb)))
                            <img src="{{ asset('storage/' . $firstImage->image_thumb) }}" class="rounded" style="width:60px; height:60px;" alt="{{ $product->name }}">
                        @else
                            <div class="rounded d-flex align-items-center justify-content-center bg-secondary text-white" style="width:60px; height:60px; font-weight:bold;">
                                {{ strtoupper(substr($product->name ?? '-', 0, 1)) }}
                            </div>
                        @endif
                    </td>

                    <td>{{ $product->name ? ucwords(strtolower($product->name)) : 'N/A' }}</td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>{{ $product->brand->name ?? '-' }}</td>
                    <td>{{ $product->gender ?? '-' }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>
                    {{-- Trending Flag --}}
                    @if($product->is_trending)
                        <span class="badge bg-warning text-dark">Trending</span>
                    @endif

                    {{-- New Arrival Flag --}}
                    @if($product->is_new_arrival)
                        <span class="badge bg-info text-dark">New Arrival</span>
                    @endif

                    {{-- If no flags --}}
                    @if(!$product->is_trending && !$product->is_new_arrival)
                        <span class="badge bg-secondary">-</span>
                    @endif
                </td>

                    <td>
                        @if($product->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-warning text-dark">Inactive</span>
                        @endif
                    </td>
                 <td>
                  <a href="{{ route('admin.products.view', $product->id) }}" class="btn btn-sm btn-info">
                  <i class="fa fa-eye"></i>View</a>
                  </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary me-1"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger deleteBtn"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                 @empty
                <tr>
                    <td colspan="9" class="text-center">No products found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination links --}}
        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
      $(document).ready(function() {
        @if($products->count() > 0)
            $('#productTable').DataTable({
                paging: false,
                searching: true,
                info: false,
            });
        @endif
    });
    // Optional: SweetAlert or confirmation for delete buttons
    document.querySelectorAll('.deleteBtn').forEach(button => {
        button.addEventListener('click', function(e) {
            if(!confirm('Are you sure you want to delete this product?')) {
                e.preventDefault();
            }
        });
    });
</script>
@endpush
