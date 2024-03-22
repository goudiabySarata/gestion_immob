<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BienImmobilierFormRequest;
use App\Http\Requests\OptionFromRequest;
use App\Models\BienImmobilier;
use App\Models\Option;
use App\Models\Proprietaire;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.options.index',
            ['options' => Option::orderBy('id', 'desc')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.options.forms',
            [ 'option' => new Option() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFromRequest $request)
    {
        $option = Option::create($request->validated());
        return redirect()->route('options.index')
            ->with('success', 'option ajouté avec succès!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('admin.options.forms', ['option' => $option]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFromRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('options.index')
            ->with('success', 'Option modifié avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('options.index')
            ->with('success', 'option supprimé avec succès!');
    }
}
