<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Models\Patient;
use App\Models\Process;
use App\Models\ProcessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PatientController extends Controller
{
    public function index(){
        $user = auth()->user();
        $patients = $user->Patient()->get();
        return view('patient.index',compact('patients'));

    }
    public function create(){
        return view('patient.create');
    }
    public function store(PatientStoreRequest $request){

        $patient  = new Patient();
        $patient->tc = $request->tc;
        $patient->name = $request->name;
        $patient->surname = $request->surname;
        $patient->birthday = $request->birthday;
        $patient->phone_number = $request->phone_number;
        $patient->user_id = auth()->id();

        $patient->save();

        Cache::delete('patients');
        return redirect()->back();
    }

    public function edit($id){
        $user= auth()->user();
        $patient = $user->Patient()->findOrFail($id);
        return view('patient.edit', compact('patient'));

    }

    public function update($id,Request $request){
        $user = auth()->user();
        $patient = $user->Patient()->findOrFail($id);
        $patient->tc = $request->tc;
        $patient->name = $request->name;
        $patient->surname = $request->surname;
        $patient->birthday = $request->birthday;
        $patient->phone_number = $request->phone_number;

        $patient->save();

        Cache::delete('patients');

        return redirect()->back();
    }

    public function delete($id){

        Patient::find($id)->delete();

        Cache::delete('patients');

        return redirect()->back();
    }
    public function showTeeth(Patient $patient, Request $request)
    {
        $toothId = $request->query('tooth_id');
        $processes = Process::all();


        if ($toothId === null) {
            $toothId = Cache::get('toothId');
            $processDetails = $patient->processDetails()->where('tooth_id', $toothId)->with(['tooth', 'process'])->get();
        } else {
            $processDetails = $patient->processDetails()->where('tooth_id', $toothId)->with(['tooth', 'process'])->get();
        }

        return view('patient.teeth', compact('patient', 'processes', 'processDetails', 'toothId'));
    }


    public function storeProcess(Request $request, Patient $patient,$toothId)
    {
        $validated = $request->validate([
            'process_id' => 'required|exists:process,id',
        ]);
        $processDetails = new ProcessDetail();
        $processDetails->tooth_id = $toothId;
        $processDetails->process_id = $validated['process_id'];
        $processDetails->patient_id = $patient->id;

        $processDetails->save();
        Cache::put('toothId', $toothId);

        return redirect()->route('patients.teeth.show',$patient);
    }

    public function deleteTeeth($id)
    {
        ProcessDetail::find($id)->delete();
        return redirect()->back();
    }
}
