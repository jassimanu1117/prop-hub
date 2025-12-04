@extends('layouts.auth.user-auth')

@section('title', 'User Login')

@section('content')
 <h2><i class="bi bi-person-lock me-2"></i>User Login</h2>
   <form id="loginForm" class="position-relative" 
      action="{{ route('user.login') }}" 
      method="POST" autocomplete="off">
       @csrf
    <div class="mb-3 position-relative">
        <i class="bi bi-envelope-fill input-icon"></i>
        <input type="email" class="form-control" id="email" 
               placeholder="Enter email" name="email" 
               required autocomplete="off">
    </div>
    <div class="mb-3 position-relative">
        <i class="bi bi-lock-fill input-icon"></i>
        <input type="password" class="form-control" id="password" 
               placeholder="Enter password" name="password" 
               required autocomplete="new-password">
    </div>
    <div class="form-check mb-3 text-white">
        <input class="form-check-input" type="checkbox" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember Me</label>
    </div>
    <button type="submit" class="btn btn-login w-100">
        <i class="bi bi-box-arrow-in-right me-1"></i>Login
    </button>
    <div class="links mt-3">
        <a href="#">Forgot Password?</a>
        <a href="{{ route('user.register') }}">Create Account</a>
    </div>
</form>


  @push('scripts')
  
  @endpush
@endsection
