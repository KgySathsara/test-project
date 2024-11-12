<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    public function viewQuotations()
    {
        $quotations = Quotation::where('user_id', auth()->id())->get();
        return view('user.quotations', compact('quotations'));
    }

    public function acceptQuotation($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->update(['status' => 'accepted']);

        // Notify pharmacy about acceptance
        $quotation->pharmacy->notify(new \App\Notifications\QuotationStatusNotification('accepted'));

        return redirect()->route('user.quotations')->with('success', 'You have accepted the quotation.');
    }

    public function rejectQuotation($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->update(['status' => 'rejected']);

        // Notify pharmacy about rejection
        $quotation->pharmacy->notify(new \App\Notifications\QuotationStatusNotification('rejected'));

        return redirect()->route('user.quotations')->with('success', 'You have rejected the quotation.');
    }
}
