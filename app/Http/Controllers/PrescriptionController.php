<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function uploadForm()
    {
        return view('prescriptions.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array|max:5',
            'images.*' => 'image|max:2048',
            'note' => 'nullable|string',
            'delivery_address' => 'required|string',
            'delivery_time' => 'required|string',
        ]);

        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            $imagePaths[] = $image->store('prescriptions');
        }

        Prescription::create([
            'user_id' => auth()->id(),
            'images' => json_encode($imagePaths),
            'note' => $request->note,
            'delivery_address' => $request->delivery_address,
            'delivery_time' => $request->delivery_time,
        ]);

        return redirect()->back()->with('success', 'Prescription uploaded successfully.');
    }
}
