@extends('layouts.admin')

@section('title', 'Admin Profile')

@section('content')

<h4 class="mb-4 fw-bold text-dark">
    <i class="bi bi-person-circle me-2"></i>My Profile
</h4>

{{--Success Message --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{--Global Error Alert --}}
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
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-4">

            <!-- Left Column -->
            <div class="col-lg-4 text-center">
                {{-- Profile Image --}}
                <img id="profileImagePreview"
                     src="{{ $profile && $profile->profile_image ? asset('storage/'.$profile->profile_image) : 'https://i.pravatar.cc/150' }}"
                     alt="Profile Picture"
                     class="rounded-circle border border-3 border-primary mb-3"
                     style="width:140px; height:140px; object-fit:cover;">

                <input type="file" id="profileImage" name="profile_image" accept="image/*" class="form-control mt-2">
                @error('profile_image') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                <small class="text-muted d-block mt-2">Upload new profile photo</small>

                {{-- Social Links --}}
                <div class="mt-4">
                    <h6 class="fw-semibold">Social Links</h6>
                    <div class="d-flex flex-column gap-2">

                        <input type="text" class="form-control" name="facebook_url" placeholder="Facebook URL"
                               value="{{ old('facebook_url', $socialLinks['facebook'] ?? '') }}">
                        @error('facebook_url') <small class="text-danger">{{ $message }}</small> @enderror

                        <input type="text" class="form-control" name="twitter_url" placeholder="Twitter URL"
                               value="{{ old('twitter_url', $socialLinks['twitter'] ?? '') }}">
                        @error('twitter_url') <small class="text-danger">{{ $message }}</small> @enderror

                        <input type="text" class="form-control" name="linkedin_url" placeholder="LinkedIn URL"
                               value="{{ old('linkedin_url', $socialLinks['linkedin'] ?? '') }}">
                        @error('linkedin_url') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-8">

                {{-- Full Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="name" class="form-control" id="name"
                           value="{{ old('name', $admin->name) }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" id="email"
                           value="{{ old('email', $admin->email) }}" required>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Phone --}}
                <div class="mb-3">
                    <label for="phone" class="form-label fw-semibold">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone"
                           value="{{ old('phone', $profile->phone ?? '') }}">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Address --}}
                <div class="mb-3">
                    <label for="address" class="form-label fw-semibold">Address</label>
                    <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $profile->address ?? '') }}</textarea>
                    @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <hr>

                {{-- Change Password --}}
                <h6 class="fw-semibold mb-3">Change Password</h6>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Current Password</label>
                    <input type="password" name="current_password" class="form-control">
                    @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">New Password</label>
                    <input type="password" name="new_password" class="form-control">
                    @error('new_password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control">
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-gradient btn-rounded">
                        <i class="bi bi-save me-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('profileImage').addEventListener('change', function (e) {
    const file = e.target.files[0];
    if (file) {
        document.getElementById('profileImagePreview').src = URL.createObjectURL(file);
    }
});
</script>
@endpush
