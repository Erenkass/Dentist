<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Tooth;
use App\Models\Process;
use App\Models\ProcessDetail;
use Illuminate\Http\Request;
class ToothController extends Controller
{
    public function index(Patient $patient, Request $request)
    {
        $tooth_id = $request->get('tooth_id');
        $tooths = Tooth::all();
        $processes = Process::all();
        $processDetails = ProcessDetail::where('patient_id', $patient->id)
            ->when($tooth_id, function ($query) use ($tooth_id) {
                return $query->where('tooth_id', $tooth_id);
            })
            ->with(['tooth', 'process'])
            ->get();

        $processedToothIds = $processDetails->pluck('tooth_id')->unique();

        return view('patient.teethmap', compact('patient', 'tooths', 'processes', 'processDetails', 'processedToothIds'));
    }
}
