@extends('layouts.app')

@section('title', 'View Prescriptions')

@section('content')
    <h1 class="text-center">Uploaded Prescriptions</h1>
    @foreach ($prescriptions as $prescription)
        <div class="border p-3 mb-3">
            <h5>Prescription ID: {{ $prescription->id }}</h5>
            <p>User: {{ $prescription->user->name }}</p>
            <p>Delivery Address: {{ $prescription->delivery_address }}</p>
            <p>Delivery Time: {{ $prescription->delivery_time }}</p>
            <p>Status: {{ ucfirst($prescription->status) }}</p>
            <div class="d-flex">
                @foreach (json_decode($prescription->images) as $image)
                    <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail me-2" style="width: 100px;">
                @endforeach
            </div>
            <a href="{{ route('pharmacy.quotation.create', $prescription->id) }}" class="btn btn-primary mt-3">Prepare Quotation</a>
        </div>
    @endforeach
@endsection
