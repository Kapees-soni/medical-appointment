<!-- resources/views/availabilities/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Appointment</h1>
    <a href="{{ route('Appointment.store') }}" class="btn btn-primary">Create Appointment</a>
    @if ($Appointment->count())
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Day of Week</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Appointment as $Appointment)
            <tr>
                <td>{{ $clinician_id->id }}</td>
                <td>{{ $patient_name->patient_name}}</td>
                <td>{{ $patient_email->patient_email }}</td>
                <td>{{ $patient_phone->patient_phone }}</td>
                <td>{{ $signature->signature }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No Appointment found.</p>
    @endif
</div>
@endsection
