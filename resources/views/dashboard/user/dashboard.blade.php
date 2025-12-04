@extends('layouts.user')

@section('content')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <p>You are logged in as User</p>

@endsection



