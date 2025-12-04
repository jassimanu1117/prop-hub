@extends('layouts.auth.admin-auth')

@section('title', 'Admin Login')

@section('content')
    <h2 class="text-white text-center mb-4">Admin Login</h2>

    <form method="POST" action="{{ route('admin.login') }}" autocomplete="off" >
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label text-light">Username</label>
            <input type="text" id="username" class="form-control" placeholder="Enter username" name="email" required>
        </div>
        <div class="mb-3 position-relative">
            <label for="password" class="form-label text-light">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Enter password" name="password" required>
            <span class="position-absolute top-50 end-0 translate-middle-y pe-3" onclick="togglePassword()" style="cursor:pointer;">👁</span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3 text-light">
            <div>
                <input type="checkbox" id="remember">
                <label for="remember"> Remember Me</label>
            </div>
            <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    @push('scripts')
    <script>
      function togglePassword() {
        const password = document.getElementById("password");
        password.type = (password.type === "password") ? "text" : "password";
      }
    </script>
    @endpush
@endsection
