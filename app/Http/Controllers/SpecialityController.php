<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $specialiy = Specialite::all();
        return view('specialite.index', compact('specialite'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialite.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nomSpecialite' => 'required',
            'typeSpecialite' => 'required',


        ]);


        Specialite::create($validateData);

        return redirect()->route('specialite.index')->with('success', 'specialite créé avec succès.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unite = Specialite::findOrFail($id);
        return view('specialite.edit', compact('specialite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $validateData = $request->validate([
            'nomSpecialite' => 'required',
            'typeSpecialite' => 'required',


        ]);
        $specialite = Specialite::findOrFail($id);
        $specialite->update($validateData);

        return redirect()->route('specialite.index')->with('success', 'specialite mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialite->delete();

        return redirect()->route('specialite.index')->with('success', 'specialite supprimé avec succès.');
    }
}
