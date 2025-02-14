@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Roles: {{ $user->getRoleNames()->implode(', ') }}</p>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
</div>
@endsection
