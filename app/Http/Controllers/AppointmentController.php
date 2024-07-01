<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Http\Requests\AppointmentStoreRequest;
use App\Http\Requests\AppointmentUpdateRequest;

class AppointmentController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        $appointments = Cache::remember('appointments', 60, function () use ($user) {
            $patients = $user->patient()->with(['appointments' => function ($query) {
                $query->where('active', 1)->orderBy('id','DESC');
            }])->get();

            $appointments = [];
            foreach ($patients as $patient) {
                foreach ($patient->appointments as $appointment) {
                    $appointments[] = [
                        'id' => $appointment->id,
                        'date' => Carbon::parse($appointment->date)->format('Y-m-d'),
                        'time' => Carbon::parse($appointment->time)->format('H:i'),
                        'patient_name' => $patient->name,
                        'patient_surname' => $patient->surname,
                        'patient_tc' => $patient->tc,
                        'patient_phone_number' => $patient->phone_number,
                        'patient_id' => $patient->id,
                    ];
                }
            }

            return $appointments;
        });

        return view('appointment.index', compact('appointments'));
    }

    public function create()
    {
        $user = auth()->user();
        $patients = $user->patient()->get();
        return view('appointment.create', compact('patients'));
    }

    public function store(AppointmentStoreRequest $request)
    {

        $existingAppointment = Appointment::where('date', $request->date)
            ->where('time', $request->time)
            ->first();

        if ($existingAppointment) {
            return redirect()->back()->withErrors(['Randevu almak istediğiniz tarih ve saatte başka bir randevu bulunmaktadır.']);
        }

        $appointment = new Appointment();
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->patient_id = $request->patient_id;
        $appointment->active = 1;
        $appointment->save();

        Cache::forget('appointments');

        return redirect()->route('appointments.index')->with('success', 'Randevu başarıyla oluşturuldu.');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->date = Carbon::parse($appointment->date)->format('Y-m-d');
        $appointment->time = Carbon::parse($appointment->time)->format('H:i');

        return view('appointment.edit', compact('appointment'));
    }

    public function update($id, AppointmentUpdateRequest $request)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->save();

        Cache::forget('appointments');

        return redirect()->route('appointments.index')->with('success', 'Randevu başarıyla güncellendi.');
    }

    public function delete($id)
    {
        Appointment::findOrFail($id)->delete();

        Cache::forget('appointments');
        Cache::forget('past_appointments');

        return redirect()->route('appointments.index')->with('success', 'Randevu başarıyla silindi.');
    }

    public function pastAppointment()
    {
        $user = auth()->user();
        $appointments = Cache::remember('past_appointments', 60, function () use ($user) {
            $result = [];
            $patients = $user->patient()->with(['appointments' => function ($query) {
                $query->where('active', 0)->orderBy('date', 'DESC');
            }])->get();

            foreach ($patients as $patient) {
                foreach ($patient->appointments as $appointment) {
                    if($appointment != NULL) {
                        $result[] = [
                            'id' => $appointment->id,
                            'date' => Carbon::parse($appointment->date)->format('d-m-Y'),
                            'time' => Carbon::parse($appointment->time)->format('H:i'),
                            'patient_name' => $patient->name,
                            'patient_surname' => $patient->surname,
                            'patient_tc' => $patient->tc,
                            'patient_phone_number' => $patient->phone_number,
                        ];
                    }
                }
            }

            return $result;
        });

        return view('appointment.pastAppointment', compact('appointments'));
    }

}

