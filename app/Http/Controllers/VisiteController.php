<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisiteFormRequest;
use App\Models\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller
{



    public function visiteStore(VisiteFormRequest $request)
    {
        $validateData = $request->validated();
        $visite = Visite::create($validateData);
        return redirect()->back()->with('success', 'Votre demande de visite a été envoyée avec succès');
    }
}
