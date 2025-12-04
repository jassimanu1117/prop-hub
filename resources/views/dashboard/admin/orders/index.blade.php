@extends('layouts.admin')

@section('title', 'Orders Listing')

@section('content')

<div class="container-fluid py-4">
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-cart4 me-2"></i>Orders Listing</h4>

    <div class="card p-4 shadow-sm rounded-3 bg-white">
        <div class="d-flex justify-content-between mb-3">
           <a href="#" class="btn btn-gradient btn-rounded">
               <i class="bi bi-plus-circle me-2"></i>Create New Order
           </a>
        </div>

        <div class="table-responsive">
            <table id="ordersTable" class="table table-striped table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total</th>
            <th>Payment</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($orders as $index => $order)
            <tr>
                {{-- Serial Number --}}
                <td>{{ $index + 1 }}</td>

                {{-- Order ID --}}
                <td>#ORD-{{ $order->id }}</td>

                {{-- Customer Name (Formatted) --}}
                <td>{{ $order->name ? ucwords(strtolower($order->name)) : 'N/A' }}</td>

                {{-- Order Date --}}
                <td>{{ $order->created_at->format('Y-m-d') }}</td>

                {{-- Order Status Badge --}}
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

                {{-- Order Total --}}
                <td>₹{{ number_format($order->total, 2) }}</td>

                {{-- Payment Status --}}
                <td>
                    @if ($order->payment_status == 'paid')
                        <span class="badge bg-primary">Paid</span>
                    @elseif ($order->payment_status == 'unpaid')
                        <span class="badge bg-secondary">Unpaid</span>
                    @elseif ($order->payment_status == 'refunded')
                        <span class="badge bg-danger">Refunded</span>
                    @else
                        <span class="badge bg-dark">N/A</span>
                    @endif
                </td>

                {{-- Actions (leave as is) --}}
                <td>
                    <a href="{{ route('admin.orders.items', $order->id) }}" class="btn btn-sm btn-info me-1">
    <i class="bi bi-eye"></i>
</a>

                   <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline"
      onsubmit="return confirm('Are you sure you want to delete this order?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">
        <i class="bi bi-trash"></i>
    </button>
</form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center text-muted">
                    <strong>No Orders Found</strong>
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
/* DataTable + Delete Confirmation */
$(document).ready(function() {
   @if($orders->count() > 0) 
    var table = $('#ordersTable').DataTable({
        lengthMenu: [5,10,25,50],
        pageLength: 10,
        responsive: true
    });
@endif
    $('#ordersTable').on('click', '.deleteBtn', function() {
        let row = $(this).closest('tr');
        if(confirm("Are you sure you want to delete this order?")) {
            table.row(row).remove().draw();
        }
    });
});	
</script>	
@endpush