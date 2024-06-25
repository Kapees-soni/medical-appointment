<?php

namespace App\Http\Controllers;

use App\Models\Clinician;
use Illuminate\Http\Request;

class ClinicianController extends Controller
{
    public function index()
    {
        return Clinician::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clinicians',
        ]);

        return Clinician::create($validated);
    }

    public function update(Request $request, $id)
    {
        $clinician = Clinician::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:clinicians,email,' . $clinician->id,
        ]);

        $clinician->update($validated);
        return $clinician;
    }
}

