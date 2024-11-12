<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PharmacyController extends Controller
{
    public function viewPrescriptions()
    {
        $prescriptions = Prescription::where('status', 'pending')->get();
        return view('pharmacy.prescriptions', compact('prescriptions'));
    }

    public function createQuotation($id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('pharmacy.quotation', compact('prescription'));
    }

    public function storeQuotation(Request $request, $id)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.drug' => 'required|string',
            'items.*.quantity' => 'required|integer',
            'items.*.amount' => 'required|numeric',
        ]);

        $prescription = Prescription::findOrFail($id);

        $total = collect($request->items)->sum('amount');

        $quotation = Quotation::create([
            'prescription_id' => $id,
            'pharmacy_id' => auth()->id(),
            'items' => json_encode($request->items),
            'total' => $total,
        ]);

        // Send email notification to the user
        Mail::to($prescription->user->email)->send(new \App\Mail\QuotationMail($quotation));

        return redirect()->route('pharmacy.prescriptions')->with('success', 'Quotation sent to the user.');
    }
}
