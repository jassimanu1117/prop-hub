@extends('layouts.admin') 

@section('title', 'Edit Product')

@section('content')

<!-- ========= Edit Product Section ================== -->
<h4 class="mb-4 fw-bold text-dark"><i class="bi bi-box-arrow-in-right me-2"></i>Edit Product</h4>

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <!-- Form to update product -->
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div class="mb-3">
            <label for="productName" class="form-label fw-semibold">Product Name</label>
            <input type="text" name="name" class="form-control" id="productName" value="{{ old('name', $product->name) }}" placeholder="Enter product name">
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Description -->
        <div class="mb-3">
            <label for="productDescription" class="form-label fw-semibold">Description</label>
            <textarea name="description" id="productDescription" rows="5" class="form-control" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="mb-3">
            <label for="productPrice" class="form-label fw-semibold">Price</label>
            <input type="number" name="price" class="form-control" id="productPrice" value="{{ old('price', $product->price) }}" placeholder="Enter price">
            @error('price')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Category -->
        <div class="mb-3">
            <label for="productCategory" class="form-label fw-semibold">Category</label>
            <select name="category_id" id="productCategory" class="form-select">
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
          </select>
             @error('category_id')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Brand -->
        <div class="mb-3">
            <label for="productBrand" class="form-label fw-semibold">Brand</label>
            <select name="brand_id" id="productBrand" class="form-select">
            <option value="">Select Brand</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                    {{ $brand->name }}
                </option>
            @endforeach
          </select>
             @error('brand_id')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gender -->
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-select" id="genderSelect" required>
                <option value="">Select Gender</option>
                <option value="men" {{ old('gender', $product->gender) == 'men' ? 'selected' : '' }}>Men</option>
                <option value="women" {{ old('gender', $product->gender) == 'women' ? 'selected' : '' }}>Women</option>
            </select>
            @error('gender')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>


        <!-- Sizes will appear here -->
        <div id="sizeOptions" class="mt-3 p-3 border rounded bg-light">
            <!-- Sizes checkboxes will be injected here -->
        </div>



        <!-- Existing Product Images -->
        <div class="mb-3">
            <label class="form-label fw-semibold">Existing Images</label>
            <div id="existingImageContainer" style="display:flex; gap:10px; flex-wrap:wrap;">
               <div id="existingImageContainer" style="display:flex; gap:10px; flex-wrap:wrap;">
    @foreach($product->images as $image)
        <div class="existing-image-wrapper position-relative" style="width:100px; height:100px; border:1px solid #ccc; border-radius:12px; overflow:hidden; display:flex; align-items:center; justify-content:center;">
            <img src="{{ asset('storage/' . $image->image_thumb) }}" style="width:100%; height:100%; object-fit:cover;">
            <button type="button" class="removeExistingImage btn btn-sm btn-danger position-absolute top-0 end-0" data-id="{{ $image->id }}" style="font-size:14px; line-height:1;">&times;</button>
        </div>
    @endforeach
</div>

            </div>
        </div>

        <!-- Upload New Images -->
        <div class="mb-3">
            <label for="productImages" class="form-label fw-semibold">Add New Images</label>
            <input type="file" name="images[]" class="form-control" id="productImages" multiple accept="image/*">
            <small class="text-muted">You can upload multiple images.</small>
            @error('images')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
            @error('images.*')
            <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

        </div>

        <!-- Preview Container for New Images -->
        <div class="mb-3" id="imagePreviewContainer" style="display:flex; gap:10px; flex-wrap:wrap;"></div>

            <!-- Product Flags -->
<div class="mb-3">
    <label class="form-label fw-semibold d-block">Product Flags</label>

    <!-- Trending -->
    <div class="form-check mb-1">
        <input 
            type="checkbox" 
            name="is_trending" 
            id="isTrending" 
            class="form-check-input"
            value="1"
            {{ old('is_trending', $product->is_trending ?? false) ? 'checked' : '' }}
        >
        <label for="isTrending" class="form-check-label">Trending Product</label>
    </div>

    <!-- New Arrival -->
    <div class="form-check mb-1">
        <input 
            type="checkbox" 
            name="is_new_arrival" 
            id="isNewArrival" 
            class="form-check-input"
            value="1"
            {{ old('is_new_arrival', $product->is_new_arrival ?? false) ? 'checked' : '' }}
        >
        <label for="isNewArrival" class="form-check-label">New Arrival</label>
    </div>

    @error('is_trending')
        <div class="text-danger small">{{ $message }}</div>
    @enderror

    @error('is_new_arrival')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

        <!-- Status -->
        <div class="mb-3">
            <label for="categoryStatus" class="form-label fw-semibold">Status</label>
            <select 
                name="status" 
                id="categoryStatus" 
                class="form-select @error('status') is-invalid @enderror"
            >
                <option value="active" {{ old('status', $category->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $category->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-gradient btn-rounded">
            <i class="bi bi-pencil me-2"></i>Update Product
        </button>
    </form>
</div>
<!-- ========================= End Edit Product Section ========================= -->
@endsection

@push('scripts')
<!-- ✅ CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#productDescription'))
    .catch(error => { console.error(error); });
</script>
<script>
    // =========================
    // Preview Selected New Images
    // =========================
    document.getElementById('productImages').addEventListener('change', function(event){
        const previewContainer = document.getElementById('imagePreviewContainer');
        previewContainer.innerHTML = '';
        Array.from(event.target.files).forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '12px';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

    // =========================
    // Remove Existing Images (Optional: AJAX)
    // =========================
   document.querySelectorAll('.removeExistingImage').forEach(btn => {
    btn.addEventListener('click', function(){
        const imageId = this.dataset.id;
        const wrapper = this.closest('.existing-image-wrapper');

        if(confirm('Are you sure you want to remove this image?')){
            fetch("{{ route('admin.products.image.delete', '') }}/" + imageId, {
            method: 'DELETE',
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
            .then(res => {
                if(!res.ok) throw new Error('Network response was not ok');
                return res.json();
            })
            .then(data => {
                if(data.success){
                    wrapper.remove();
                    //alert(data.message);
                } else {
                    alert(data.message || 'Something went wrong!');
                }
            })
            .catch(err => console.error('AJAX request failed:', err));
        }
    });
});

/* =========== Get brands according category =========== */
$(document).ready(function () {   
$('#productCategory').on('change', function () {
    let categoryId = $(this).val();
    let brandDropdown = $('#productBrand');

    brandDropdown.html('<option value="">Select Brand</option>'); // Reset

    if (categoryId) {
        $.ajax({
            url: "{{ route('admin.products.brands', ':id') }}".replace(':id', categoryId),
            type: "GET",
            success: function (response) {
                response.forEach(function (brand) {
                    brandDropdown.append(
                        `<option value="${brand.id}">${brand.name}</option>`
                    );
                });
            },
            error: function () {
                alert('Something went wrong while fetching brands.');
            }
        });
    }
 });
});
</script>





<script>
    // Product ke selected size IDs (as Numbers)
    let selectedSizes = @json($selectedSizes ?? []).map(Number);

    // Load sizes function
    function loadSizes(gender) {
        let container = document.getElementById('sizeOptions');
        container.innerHTML = '';

        if (!gender) return;

        fetch("{{ url('admin/get-sizes') }}/" + gender)
            .then(res => res.json())
            .then(data => {
                let html = '<h5>Select Sizes</h5>';

                data.forEach(size => {
                    let checked = selectedSizes.includes(Number(size.id)) ? 'checked' : '';
                    html += `
                        <label style="margin-right:10px">
                            <input type="checkbox" name="sizes[]" value="${size.id}" ${checked}>
                            ${size.name}
                        </label>
                    `;
                });

                container.innerHTML = html;
            });
    }

    // Load sizes on page load if gender is already selected
    document.addEventListener('DOMContentLoaded', function() {
        let gender = document.getElementById('genderSelect').value;
        if (gender) loadSizes(gender);
    });

    // Load sizes when gender changes
    document.getElementById('genderSelect').addEventListener('change', function() {
        loadSizes(this.value);
    });
</script>
@endpush
