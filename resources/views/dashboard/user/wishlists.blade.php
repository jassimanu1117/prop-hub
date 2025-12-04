@extends('layouts.user')

@section('content')
<div class="container my-5">
    <h2 class="mb-4">My Wishlist</h2>
    @if($wishlists->isEmpty())
        <div class="alert alert-info">Your wishlist is empty ❤️</div>
    @else
        <div class="row g-4">
            @foreach($wishlists as $item)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5>{{ $item->name }}</h5>
                            <p>${{ $item->price }}</p>
                            <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
