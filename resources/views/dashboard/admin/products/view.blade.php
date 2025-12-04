@extends('layouts.admin') 

@section('title', 'Product Details')

@section('content')
<!-- ================= Breadcrumb ================= -->

<h4 class="mb-4 fw-bold text-dark">
    <i class="bi bi-info-circle me-2 text-dark"></i> Product Detail
</h4>



<!-- ================= Product Detail ================= -->
<div class="product-detail row">
    <div class="col-md-6">
        <!-- ✅ Carousel -->
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if($product->images && $product->images->count() > 0)
                    @foreach($product->images as $key => $image)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/'.$image->image_path) }}" class="d-block w-100" alt="Product Image {{ $key+1 }}">
                        </div>
                    @endforeach
                @else
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/600x400?text=No+Image" class="d-block w-100" alt="No Image">
                    </div>
                @endif
            </div>
        </div>

        <!-- ✅ Thumbnails -->
        @if($product->images && $product->images->count() > 0)
            <div class="carousel-thumbnails mt-2 d-flex flex-wrap gap-2">
                @foreach($product->images as $key => $image)
                    <img 
                        src="{{ asset('storage/'.$image->image_thumb) }}" 
                        class="{{ $key === 0 ? 'active' : '' }}" 
                        alt="Thumb {{ $key+1 }}" 
                        style="width:80px; height:80px; object-fit:cover; border:2px solid transparent; cursor:pointer; border-radius:6px;">
                @endforeach
            </div>
        @endif

        <!-- ✅ Product Description & Specs -->
        <div class="product-description mt-4">
            <h5>Product Overview</h5>
            <p>{!! $product->description ?? '<p>No description available.</p>' !!}</p>
            <div class="specs">
                <div class="spec-item"><i class="bi bi-currency-dollar"></i> Price: ${{ number_format($product->price, 2) }}</div>
                <div class="spec-item"><i class="bi bi-tags"></i> Category: {{ $product->category->name ?? 'N/A' }}</div>
                <div class="spec-item"><i class="bi bi-box-seam"></i> Brand: {{ $product->brand->name ?? 'N/A' }}</div>
                <div class="spec-item"><i class="bi bi-check-circle"></i> Status: 
                    @if($product->status == 'active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning text-dark">Inactive</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- ================= Right Side ================= -->
    <div class="col-md-6">
        <div class="product-info">
            <h2>{{ $product->name }}</h2>

            <!-- ✅ Admin Actions -->
            <div class="product-actions my-3 d-flex gap-2">
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-edit btn-sm btn-primary">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>

                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this product?')" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete btn-sm btn-danger">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </form>

                <button class="btn btn-toggle btn-sm btn-secondary">
                    <i class="bi bi-toggle-on"></i> Toggle Status
                </button>

                <button class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-files"></i> Duplicate
                </button>
            </div>

            <!-- ✅ Stats Cards (Dummy Data for Now) -->
            <div class="row mt-4 g-3">
                <div class="col-md-3">
                    <div class="stats-card bg-orders text-center p-2 rounded text-white" style="background:#6c63ff;">
                        <h3>450</h3>
                        <p>Orders</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card bg-views text-center p-2 rounded text-white" style="background:#00b894;">
                        <h3>1.2K</h3>
                        <p>Views</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card bg-stock text-center p-2 rounded text-white" style="background:#0984e3;">
                        <h3>120</h3>
                        <p>In Stock</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card bg-updated text-center p-2 rounded text-white" style="background:#fdcb6e;">
                        <h3>2h ago</h3>
                        <p>Last Updated</p>
                    </div>
                </div>
            </div>

            <!-- ✅ Reviews Section (Static Example) -->
            <ul class="nav nav-tabs mt-4" id="productTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">
                        <i class="bi bi-star"></i> Reviews
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="productTabContent">
                <div class="tab-pane fade show active p-3" id="reviews">
                    <div class="review-item"><span>John Doe:</span> Excellent product, fast shipping!</div>
                    <div class="review-item"><span>Jane Smith:</span> Quality is top-notch, highly recommend.</div>
                    <div class="review-item"><span>Mike Lee:</span> Worth every penny, very satisfied.</div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* ================= Product Detail Carousel Thumbnails ================= */
const thumbnails = document.querySelectorAll('.carousel-thumbnails img');
const carouselElement = document.getElementById('productCarousel');
if (carouselElement) {
    const carousel = new bootstrap.Carousel(carouselElement);

    thumbnails.forEach((thumb, index) => {
        thumb.addEventListener('click', () => {
            thumbnails.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
            carousel.to(index);
        });
    });
}
</script>
@endpush
