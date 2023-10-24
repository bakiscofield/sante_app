<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Consultant;
class ConsultantController extends Controller
{
    public function index()
    {
        $consultants = Consultant::all(); // search logique
        return view('consultants.index', compact('consultants'));
    }

    public function confirmed_profile()
    {
        // your code


        return redirect()->route('consultants.index')->with('success', 'Consultant accepté.');
    }

    public function consultant_profile_confirm(Consultant $consultant)
    {

       //dd($consultant);
       $consultant->status_request=1;
       $consultant->save();

       return redirect()->route('consultants.index')->with('success', 'Consultant confirmé.');
   }

    public function rejected_profile(Consultant $consultant )
    {
        $consultant->status_request=-1;
        $consultant->save();
        return redirect()->route('consultants.index')->with('success', 'Consultant supprimé.');
    }


    public function create()
    {
        $specialitys = Specialite::all()->pluck('name', 'speciality_id');
        return view('consultants.create_or_edit', compact('specialitys'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $request['user_id'] = $user->user_id;
        $consultant = Consultant::create($request->all());
        return redirect()->route('consultants.index')->with('success', 'Consultant créé avec succès.');
    }

    public function edit(Consultant $consultant)
    {
        $specialitys = Specialite::all()->pluck('name', 'speciality_id');
        return view('consultants.create_or_edit', compact('consultant', 'specialitys'));
    }

    public function update(Request $request, Consultant $consultant)
    {
        $consultant->update($request->all());
        //$this->set_horaires($request);
        return redirect()->route('consultants.index')->with('success', 'Consultant mis à jour avec succès.');
    }

    public function destroy(Consultant $consultant)
    {   $consultant->enable=false;
        $consultant->delete();
        return redirect()->route('consultants.index')->with('success', 'Consultant supprimé avec succès.');
    }
}
