<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProprietaireFormRequest;
use App\Models\BienImmobilier;
use App\Models\Clients;
use App\Models\Proprietaire;
use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_client = DB::table('clients')->count();
        $count_proprio = DB::table('proprietaires')->count();
        $count_bien = DB::table('biens')->count();

        return view('admin.dashbord', compact(['count_client', 'count_proprio', 'count_bien']));
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function client()
    {
        $data['clients'] = Clients::orderBy('id', 'asc')->paginate(12);
        return view('admin.clients.client', $data);
    }
    public function propriete()
    {
        return view('admin.biens.propriete');
    }
    public function contrat()
    {
        return view('admin.contrats.contrat');
    }
    public function homeVisite() {
        $visites = Visite::with('biens', 'clients')->get();
        return view('admin.visites.index', ['visites' => $visites]);
    }

    public function destroy(Visite $visite)
    {
        $visite->delete();
        return redirect()->route('visite.index')
            ->with('success', 'Visite supprimé avec succès!');
    }
    public function viewDetails()
    {
        return view('admin.visites.viewDetails');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('/');
    }
}
