@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1 class="text-center">Login</h1>
    <form method="POST" action="{{ route('login.authenticate') }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
@endsection
