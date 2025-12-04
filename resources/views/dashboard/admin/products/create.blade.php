@extends('layouts.admin') 

@section('title', 'Add Product')

@section('content')

<h4 class="mb-4 fw-bold text-dark">
    <i class="bi bi-box-seam me-2"></i><i class="bi bi-plus-lg me-2"></i> Add New Product
</h4>


<div class="card p-4 shadow-sm rounded-3 bg-white">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Product Name -->
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter product name" >
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="productDescription" rows="4" class="form-control" placeholder="Enter product description">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Price -->
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price') }}" placeholder="Enter price">
            @error('price')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Category -->
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" id="categoryDropdown" class="form-select">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Brand -->
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <select name="brand_id" id="brandDropdown" class="form-select">
                <option value="">Select Brand</option>
                {{-- Brands will be loaded dynamically --}}
            </select>
            @error('brand_id')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gender -->
        <div class="mb-3">
            <label class="form-label">Gender</label>
            <select name="gender" class="form-select" id="genderSelect">
                <option value="">Select Gender</option>
                <option value="men" >Men</option>
                <option value="women">Women</option>
            </select>
            @error('gender')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Sizes will appear here -->
        <div id="sizeOptions" class="mt-3 p-3 border rounded bg-light" style="display:none;">
            <!-- Sizes checkboxes will be injected here -->
        </div>


        <!-- Product Images -->
        <div class="mb-3">
            <label for="productImages" class="form-label fw-semibold">Product Images</label>
            <input 
                type="file" 
                name="images[]" 
                class="form-control" 
                id="productImages" 
                multiple 
                accept="image/*"
            >
            <small class="text-muted">You can upload multiple images. Thumbnails will be generated automatically.</small>
            @error('images')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
            @error('images.*')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror

            <!-- ✅ Image Preview Container -->
            <div id="imagePreviewContainer" class="mt-3 d-flex flex-wrap gap-2"></div>
        </div>

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
                <option value="active" >Active</option>
                <option value="inactive">Inactive</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-gradient btn-rounded">
                <i class="bi bi-plus-circle me-2"></i>Add Product
            </button>
    </form>
</div>

@endsection

@push('scripts')
<!-- ✅ CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#productDescription'))
    .catch(error => { console.error(error); });
</script>

<!-- ✅ Image Preview Script -->
<script>
const productImages = document.getElementById('productImages');
const imagePreviewContainer = document.getElementById('imagePreviewContainer');

function updatePreview() {
    imagePreviewContainer.innerHTML = '';
    const files = Array.from(productImages.files);

    files.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const wrapper = document.createElement('div');
            wrapper.classList.add('position-relative');
            wrapper.style.width = '100px';
            wrapper.style.height = '100px';
            wrapper.style.border = '1px solid #ccc';
            wrapper.style.borderRadius = '12px';
            wrapper.style.overflow = 'hidden';
            wrapper.style.display = 'flex';
            wrapper.style.alignItems = 'center';
            wrapper.style.justifyContent = 'center';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100%';
            img.style.height = '100%';
            img.style.objectFit = 'cover';
            wrapper.appendChild(img);

            // ✅ Styled Remove Button (like edit page)
            const removeBtn = document.createElement('button');
            removeBtn.type = 'button';
            removeBtn.className = 'btn btn-sm btn-danger position-absolute top-0 end-0';
            removeBtn.style.fontSize = '14px';
            removeBtn.style.lineHeight = '1';
            removeBtn.innerHTML = '&times;';
            removeBtn.addEventListener('click', () => {
                const dt = new DataTransfer();
                Array.from(productImages.files)
                    .forEach((f, i) => { if (i !== index) dt.items.add(f); });
                productImages.files = dt.files;
                updatePreview();
            });

            wrapper.appendChild(removeBtn);
            imagePreviewContainer.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    });
}

productImages.addEventListener('change', updatePreview);


/* =========== Get brands according category =========== */
    $(document).ready(function () {
        $('#categoryDropdown').on('change', function () {
            let categoryId = $(this).val();
            let brandDropdown = $('#brandDropdown');

            brandDropdown.html('<option value="">Select Brand</option>'); // Reset first

            if (categoryId) {
                $.ajax({
                url: "{{ route('admin.products.brands', ':id') }}".replace(':id', categoryId),
                type: "GET",
                success: function (response) {
                    let brandDropdown = $('#brandDropdown');
                    brandDropdown.html('<option value="">Select Brand</option>'); // Reset first

                    if (response.length > 0) {
                        response.forEach(function (brand) {
                            brandDropdown.append(
                                `<option value="${brand.id}">${brand.name}</option>`
                            );
                        });
                    }
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
function loadSizes(gender) {
    let container = document.getElementById('sizeOptions');
    container.innerHTML = ''; // clear previous

    if (!gender) {
        container.style.display = 'none'; // hide if no gender
        return;
    }

    fetch("{{ url('admin/get-sizes') }}/" + gender)
        .then(res => res.json())
        .then(data => {
            let html = '<h5>Select Sizes</h5>';
            data.forEach(size => {
                html += `
                    <label style="margin-right:10px">
                        <input type="checkbox" name="sizes[]" value="${size.id}">
                        ${size.name}
                    </label>
                `;
            });
            container.innerHTML = html;
            container.style.display = 'block'; // show after loading sizes
        });
}

// On gender change
document.getElementById('genderSelect').addEventListener('change', function() {
    loadSizes(this.value);
});

</script>


@endpush


