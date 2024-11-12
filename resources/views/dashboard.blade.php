@extends('layouts.app')

@section('title', 'Upload Prescription')

@section('content')
    <h1 class="text-center">Upload Prescription</h1>
    <p class="text-center">Please fill out the form below to upload your prescription.</p>

    <form method="POST" action="{{ route('prescriptions.store') }}" enctype="multipart/form-data" class="mt-4">
        @csrf

        <!-- Upload Prescription Images -->
        <div class="mb-3">
            <label for="images" class="form-label">Prescription Images (Max 5)</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple required>
            <small class="form-text text-muted">You can upload up to 5 images.</small>
        </div>

        <!-- Add a Note -->
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea name="note" id="note" class="form-control" rows="3" placeholder="Add any additional notes here (optional)"></textarea>
        </div>

        <!-- Delivery Address -->
        <div class="mb-3">
            <label for="delivery_address" class="form-label">Delivery Address</label>
            <input type="text" name="delivery_address" id="delivery_address" class="form-control" placeholder="Enter your delivery address" required>
        </div>

        <!-- Delivery Time -->
        <div class="mb-3">
            <label for="delivery_time" class="form-label">Preferred Delivery Time</label>
            <select name="delivery_time" id="delivery_time" class="form-select" required>
                <option value="10:00-12:00">10:00 AM - 12:00 PM</option>
                <option value="12:00-14:00">12:00 PM - 2:00 PM</option>
                <option value="14:00-16:00">2:00 PM - 4:00 PM</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">Upload Prescription</button>
    </form>
@endsection
