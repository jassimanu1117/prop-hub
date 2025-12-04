@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid py-4">

   <!-- Admin Dashboard -->
   <h4 class="fw-bold mb-4 text-dark">
    <i class="bi bi-speedometer2 me-2"></i> Admin Dashboard
  </h4>

    <!-- Summary Boxes -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="text-muted small">Categories</div>
                <h4 class="fw-bold text-primary mb-0">{{ $totalCategories ?? 0 }}</h4>
                <a href="{{ route('admin.categories.index') }}" class="text-decoration-none small text-secondary">
                    Manage Categories
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="text-muted small">Brands</div>
                <h4 class="fw-bold text-info mb-0">{{ $totalBrands ?? 0 }}</h4>
                <a href="{{ route('admin.brands.index') }}" class="text-decoration-none small text-secondary">
                    Manage Brands
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="text-muted small">Products</div>
                <h4 class="fw-bold text-success mb-0">{{ $totalProducts ?? 0 }}</h4>
                <a href="{{ route('admin.products.index') }}" class="text-decoration-none small text-secondary">
                    Manage Products
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="text-muted small">Orders</div>
                <h4 class="fw-bold text-warning mb-0">{{ $totalOrders ?? 0 }}</h4>
                <a href="#" class="text-decoration-none small text-secondary">
                    Manage Orders
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card p-4 shadow-sm border-0 mb-4">
        <h5 class="fw-semibold mb-3">⚡ Quick Actions</h5>
        <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-tags me-2"></i>Add Category
            </a>
            <a href="{{ route('admin.brands.create') }}" class="btn btn-info rounded-pill px-4">
                <i class="bi bi-star me-2"></i>Add Brand
            </a>
            <a href="{{ route('admin.products.create') }}" class="btn btn-success rounded-pill px-4">
                <i class="bi bi-plus-circle me-2"></i>Add Product
            </a>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-dark rounded-pill px-4">
                <i class="bi bi-basket me-2"></i>View Orders
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger rounded-pill px-4">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Recent Orders Section -->
    <div class="card p-3 shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-semibold mb-0">
    <i class="bi bi-bag-check me-2"></i> Recent Orders
</h5>

            <a href="#" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
        </div>

        <div class="table-responsive">
    <table id="recentOrdersTable" class="table table-striped table-hover align-middle mb-0">
    <thead class="table-dark">
        <tr>
            <th>Sr.</th>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($recentOrders as $index => $order)
            <tr>
                <td>{{ $index+1 }}</td>

                <td>#ORD-{{ $order->id }}</td>

                <td>{{ $order->name ? ucwords(strtolower($order->name)) : 'N/A' }}</td>

                <td>{{ $order->created_at->format('M d, Y') }}</td>

                <td>
                    @if ($order->status == 'completed')
                        <span class="badge bg-success">Completed</span>
                    @elseif ($order->status == 'pending')
                        <span class="badge bg-warning text-dark">Pending</span>
                    @elseif ($order->status == 'cancelled')
                        <span class="badge bg-danger">Cancelled</span>
                    @else
                        <span class="badge bg-secondary">Unknown</span>
                    @endif
                </td>

                <td>₹{{ number_format($order->total, 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">
                    <strong>No Recent Orders Found</strong>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>
    </div>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
   @if($recentOrders->count() > 0)  
    $('#recentOrdersTable').DataTable({
        paging: true,
        searching: true,
        info: false,
        lengthChange: false,
        pageLength: 10,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search orders..."
        }
    });
  @endif  
});
</script>
@endpush
