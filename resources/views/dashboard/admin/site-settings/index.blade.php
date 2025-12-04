@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')

<h4 class="mb-4 fw-bold text-dark">
    <i class="bi bi-gear me-2"></i>Site Settings
</h4>

{{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- Global Error Alert --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card p-4 shadow-sm rounded-3 bg-white">
    <form action="{{ route('admin.site.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">

            {{-- Left Column (Logo & Branding) --}}
            <div class="col-lg-4 text-center">

                {{-- Website Logo --}}
                <img id="logoPreview" 
                    src="{{ $settings && $settings->logo ? asset('storage/'.$settings->logo) : 'https://i.pravatar.cc/150' }}"
                    alt="Website Logo"
                    class="rounded border border-3 border-primary mb-3"
                    style="width:150px; height:150px; object-fit:cover;">

                <input type="file" id="logoInput" name="logo" accept="image/*" class="form-control mt-2">
                @error('logo') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror

                <small class="text-muted d-block mt-2">Upload new website logo</small>

                <hr>

            </div>

            {{-- Right Column (Website Information) --}}
            <div class="col-lg-8">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Website Name</label>
                    <input type="text" name="site_name" class="form-control"
                           value="{{ old('site_name', $settings->site_name ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Website Email</label>
                    <input type="email" name="site_email" class="form-control"
                           value="{{ old('site_email', $settings->site_email ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Contact Number</label>
                    <input type="text" name="site_phone" class="form-control"
                           value="{{ old('site_phone', $settings->site_phone ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Address</label>
                    <textarea name="site_address" class="form-control" rows="3">{{ old('site_address', $settings->site_address ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Footer Text</label>
                    <textarea name="footer_text" class="form-control" rows="2">{{ old('footer_text', $settings->footer_text ?? '') }}</textarea>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-gradient btn-rounded">
                        <i class="bi bi-save me-2"></i>Save Settings
                    </button>
                </div>
            </div>

        </div>

    </form>
</div>

@endsection

@push('scripts')
<script>
// Logo Preview
document.getElementById('logoInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => document.getElementById('logoPreview').src = e.target.result;
        reader.readAsDataURL(file);
    }
});

// Favicon Preview
document.getElementById('faviconInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => document.getElementById('faviconPreview').src = e.target.result;
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
