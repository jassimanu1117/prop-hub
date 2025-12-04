@extends('layouts.admin')

@section('title', 'Order Items')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark mb-0">
            <i class="bi bi-receipt-cutoff me-2"></i>
            Order Items - <span class="text-primary">#ORD-{{ $order->id }}</span>
        </h4>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-2"></i>Back to Orders
        </a>
    </div>

    <!-- Order Summary -->
    <div class="card p-4 mb-4 shadow-sm rounded-3 bg-light">
        <div class="row">

            <div class="col-md-3">
                <p class="fw-semibold mb-1">Customer:</p>
                <p>{{ $order->name ? ucwords(strtolower($order->name)) : 'N/A' }}</p>
            </div>

            <div class="col-md-3">
                <p class="fw-semibold mb-1">Order Date:</p>
                <p>{{ $order->created_at->format('Y-m-d') }}</p>
            </div>

            <div class="col-md-3">
                <p class="fw-semibold mb-1">Status:</p>
                @if ($order->status == 'completed')
                    <span class="badge bg-success">Completed</span>
                @elseif ($order->status == 'pending')
                    <span class="badge bg-warning text-dark">Pending</span>
                @elseif ($order->status == 'cancelled')
                    <span class="badge bg-danger">Cancelled</span>
                @else
                    <span class="badge bg-secondary">Unknown</span>
                @endif
            </div>

            <div class="col-md-3">
                <p class="fw-semibold mb-1">Total Amount:</p>
                <h6 class="text-success fw-bold mb-0">₹{{ number_format($order->total, 2) }}</h6>
            </div>

        </div>
    </div>

    <!-- Order Items Table -->
    <div class="card p-4 shadow-sm rounded-3 bg-white">
        <div class="table-responsive">
            <table id="orderItemsTable" class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($order->items as $index => $item)
                        <tr>
                            {{-- Serial --}}
                            <td>{{ $index + 1 }}</td>

                            {{-- Product Image --}}
                            <td>
                               
@php
    $product = $item->product;
    $firstImage = $product?->images?->first();
@endphp

@if ($firstImage && file_exists(storage_path('app/public/' . $firstImage->image_thumb)))
    <img 
        src="{{ asset('storage/' . $firstImage->image_thumb) }}" 
        class="rounded" 
        style="width:60px; height:60px;" 
        alt="{{ $product->name }}"
    >
@else
    <div class="rounded d-flex align-items-center justify-content-center bg-secondary text-white"
        style="width:60px; height:60px; font-weight:bold;">
        {{ strtoupper(substr($product->name ?? '-', 0, 1)) }}
    </div>
@endif

                                
                            </td>

                            {{-- Product Name --}}
                            <td>
                                {{ $item->product->name 
                                    ? ucwords(strtolower($item->product->name)) 
                                    : 'N/A' 
                                }}
                            </td>

                            {{-- Product SKU --}}
                            <td>{{ $item->product->sku ?? 'N/A' }}</td>

                            {{-- Quantity --}}
                            <td>{{ $item->quantity }}</td>

                            {{-- Unit Price --}}
                            <td>₹{{ number_format($item->price, 2) }}</td>

                            {{-- Subtotal --}}
                            <td>₹{{ number_format($item->price * $item->quantity, 2) }}</td>

                            <td>
                                <button class="btn btn-sm btn-info me-1"><i class="bi bi-eye"></i></button>
                                <button class="btn btn-sm btn-danger deleteBtn"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>

                    @empty
                        {{-- No items --}}
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
