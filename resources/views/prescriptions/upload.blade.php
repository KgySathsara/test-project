@extends('layouts.app')

@section('title', 'Upload Prescription')

@section('content')
    <h1 class="text-center">Upload Prescription</h1>
    <form method="POST" action="{{ route('prescriptions.store') }}" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="images" class="form-label">Images (Max 5)</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple required>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea name="note" id="note" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="delivery_address" class="form-label">Delivery Address</label>
            <input type="text" name="delivery_address" id="delivery_address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="delivery_time" class="form-label">Delivery Time</label>
            <select name="delivery_time" id="delivery_time" class="form-control" required>
                <option value="10:00-12:00">10:00-12:00</option>
                <option value="12:00-14:00">12:00-14:00</option>
                <option value="14:00-16:00">14:00-16:00</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Upload</button>
    </form>
@endsection
