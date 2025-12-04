@extends('errors.layout')

@section('code', '404')
@section('message', 'Page Not Found')
@section('description', 'The page you are looking for might have been removed or the URL is incorrect.')

@section('content')
<div class="site-section">
    <div class="site-container">
        <div class="site-col">
            <div class="site-common-content text-center-desktop">
                
                <h1 class="text-black title-404">404</h1>

                <p class="body-text text-black">
                    The page you are looking for might have been removed,
                    had its name changed, or is temporarily unavailable.
                </p>

                <div class="bttn-group-404 dflex align-center">

                    <a href="{{ url('/') }}" 
                       class="site-btn bg-full-black text-white text-center dflex justify-center align-center">
                        Back to Homepage 
                        <img src="{{ asset('assets/images/arrow-up-icn-white.svg') }}" alt="">
                    </a>

                    <a href="javascript:history.back()" 
                       class="site-btn text-black text-center dflex justify-center align-center">
                        Go Back
                        <img src="{{ asset('assets/images/arrow-up-icn-black.svg') }}" alt="">
                    </a>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
