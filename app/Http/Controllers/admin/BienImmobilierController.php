<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BienImmobilierFormRequest;
use App\Models\BienImmobilier;
use App\Models\Image;
use App\Models\Option;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class BienImmobilierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biens = BienImmobilier::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.biens.propriete', compact('biens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proprietaires = Proprietaire::all();
        return view('admin.biens.forms',
            [ 'bien' => new BienImmobilier(),
                'options' => Option::pluck('nom', 'id'),
                'proprietaires' => $proprietaires
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BienImmobilierFormRequest $request)
    {
        $validatedData = $request->validated();
        //$validatedData['proprietaire_id'] = $request->input('proprietaire_id');
        $bien = BienImmobilier::create($validatedData);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->store('public/images');
                Image::create([
                    'nom' => basename($imageName),
                    'bien_id' => $bien->id,
                ]);
            }
        }
        $bien->options()->sync($request->input('option'));
        return redirect()->route('biens.index')
            ->with('success', 'Bien ajouté avec succès!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BienImmobilier $bien)
    {
        $proprietaires = $bien->proprietaire()->get();
        return view('admin.biens.forms',
            ['bien' => $bien, 'options' => Option::pluck('nom', 'id'),
                'proprietaires' => $proprietaires,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BienImmobilierFormRequest $request, BienImmobilier $bien)
    {
        $validatedData = $request->validated();
        $bien->update($validatedData);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->store('public/images');
                Image::create([
                    'nom' => basename($imageName),
                    'bien_id' => $bien->id,
                ]);
            }
        }
        $bien->options()->sync($request->input('option'));
        return redirect()->route('biens.index')
            ->with('success', 'Bien modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BienImmobilier $bien)
    {
        $bien->delete();
        return redirect()->route('biens.index')
            ->with('success', 'Bien supprimé avec succès!');
    }
}
