<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Consultation::all();
        return view('consultations.index', compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consultations.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('consultation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        return view('consultations.create_or_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        return redirect()->route('consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        return redirect()->route('consultation.index');
    }


//statut
    public function confirmer(Consultation $consultation){
        $consultation->state = 1;
        $consultation->update();
       
        return redirect()->route('consultations.index')->with('success', 'Patient mis à jour avec succès.');
    }
    
    public function rejeter(Consultation $consultation){
        $consultation->state = -1;
        $consultation->update();
       return redirect()->route('consultations.index')->with('success', 'Patient mis à jour avec succès.');
    }
    //realisation
    public function realiser(Consultation $consultation){
        $consultation->do = 1;
        $consultation->update();
       
        return redirect()->route('consultations.index')->with('success', 'Patient mis à jour avec succès.');
    }
    
    public function manquer(Consultation $consultation){
        $consultation->do = -1;
        $consultation->update();
       return redirect()->route('consultations.index')->with('success', 'Patient mis à jour avec succès.');
    }
}
