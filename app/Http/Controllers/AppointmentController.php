<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return Appointment::with('clinician')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'clinician_id' => 'required|exists:clinicians,id',
            'patient_name' => 'required|string|max:255',
            'patient_email' => 'required|string|email|max:255',
            'patient_phone' => 'required|string|max:15',
            'signature' => 'required|string',
        ]);

        return Appointment::create($validated);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|string|in:pending,confirmed,cancelled,completed',
        ]);

        $appointment->update($validated);
        return $appointment;
    }
}
