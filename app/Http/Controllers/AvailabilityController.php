<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function index()
    {
        $availabilities = Availability::with('clinician')->get();
        return view('availabilities.index', compact('availabilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'clinician_id' => 'required|exists:clinicians,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        return Availability::create($validated);
    }

    public function update(Request $request, $id)
    {
        $availability = Availability::findOrFail($id);
        $validated = $request->validate([
            'date' => 'sometimes|required|date',
            'start_time' => 'sometimes|required|date_format:H:i',
            'end_time' => 'sometimes|required|date_format:H:i|after:start_time',
        ]);

        $availability->update($validated);
        return $availability;
    }

    public function show($id)
    {
      $post = Availability::find($id);
      return view('availabilities.index', compact('post'));
    }
}

