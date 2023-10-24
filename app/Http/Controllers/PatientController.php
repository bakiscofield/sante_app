<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Patient;
use App\Models\User;
class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $patient = new Patient();
        return view('patients.create_or_edit',compact('patient'));
    }

    public function show(Patient $patient)
    {
        
        return view('patients.show',compact('patient'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        Patient::create([
            'user_id' => $user->user_id,
        ]);
        return redirect()->route('patients.index')->with('success', 'Patient créé avec succès.');
    }

    public function edit(Patient $patient)
    {
        return view('patients.create_or_edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->user->update($request->all());
        $patient->user->save();
        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    public function destroy(Patient $patient)
    {
        $patient->user->delete();
        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }

    public function activer(Patient $patient){
        $patient->user->enable = 1;
        $patient->user->update();

        return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }

    public function desactiver(Patient $patient){
        $patient->user->enable = 0;
        $patient->user->update();
       return redirect()->route('patients.index')->with('success', 'Patient mis à jour avec succès.');
    }






}
