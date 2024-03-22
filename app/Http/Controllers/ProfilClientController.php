<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilClientFormRequest;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilClientController extends Controller
{
    public function showProfil( Clients $client )
    {
        return view('admin.clients.profil-client', ['client' => $client]);
    }
    public function update(ProfilClientFormRequest $request, Clients $client)
    {
        $data = $request->validated();
        $client->update($data);

        return redirect()->route('profilClient', ['client' => $client->id])->with('success', 'Profil mis à jour avec succès');
    }

}
