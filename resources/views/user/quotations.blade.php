@extends('layouts.app')

@section('title', 'Your Quotations')

@section('content')
    <h1>Your Quotations</h1>
    @foreach ($quotations as $quotation)
        <div class="border p-3 mb-3">
            <h5>Quotation ID: {{ $quotation->id }}</h5>
            <p>Total: {{ $quotation->total }}</p>
            <p>Status: {{ ucfirst($quotation->status) }}</p>
            <a href="{{ route('user.quotation.accept', $quotation->id) }}" class="btn btn-success">Accept</a>
            <a href="{{ route('user.quotation.reject', $quotation->id) }}" class="btn btn-danger">Reject</a>
        </div>
    @endforeach
@endsection
