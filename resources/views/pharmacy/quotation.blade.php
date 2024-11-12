@extends('layouts.app')

@section('title', 'Prepare Quotation')

@section('content')
    <h1>Prepare Quotation for Prescription ID: {{ $prescription->id }}</h1>
    <form method="POST" action="{{ route('pharmacy.quotation.store', $prescription->id) }}">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Drug</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody id="quotation-items">
                <tr>
                    <td><input type="text" name="items[0][drug]" class="form-control" required></td>
                    <td><input type="number" name="items[0][quantity]" class="form-control" required></td>
                    <td><input type="number" name="items[0][amount]" class="form-control" step="0.01" required></td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" onclick="addRow()">Add Item</button>
        <button type="submit" class="btn btn-success">Send Quotation</button>
    </form>
    <script>
        let index = 1;
        function addRow() {
            const row = `
                <tr>
                    <td><input type="text" name="items[${index}][drug]" class="form-control" required></td>
                    <td><input type="number" name="items[${index}][quantity]" class="form-control" required></td>
                    <td><input type="number" name="items[${index}][amount]" class="form-control" step="0.01" required></td>
                </tr>`;
            document.getElementById('quotation-items').insertAdjacentHTML('beforeend', row);
            index++;
        }
    </script>
@endsection
