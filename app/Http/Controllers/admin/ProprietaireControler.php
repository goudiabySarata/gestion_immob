<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProprietaireFormRequest;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ProprietaireControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proprietaires = Proprietaire::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.proprietaire.proprietaire', compact('proprietaires'));
    }

    public function create()
    {
        return view('admin.proprietaire.proprietaire-form',
            [ 'proprietaire' => new Proprietaire() ]);
    }

    public function edit(Proprietaire $proprietaire)
    {
        return view('admin.proprietaire.proprietaire-form',['proprietaire' => $proprietaire]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProprietaireFormRequest $request)
    {
        $proprietaire = Proprietaire::create($request->validated());
        return redirect()->route('proprietaire.index')
            ->with('success', 'Propriétaire ajouté avec succès!');
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(ProprietaireFormRequest $request, Proprietaire $proprietaire)
    {
        $proprietaire->update($request->validated());
        return redirect()->route('proprietaire.index')
            ->with('success', 'Propriétaire modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proprietaire $proprietaire)
    {
        $proprietaire->delete();
        return redirect()->route('proprietaire.index')
            ->with('success', 'Propriétaire supprimé avec succès!');
    }
}
