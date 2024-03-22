<?php

namespace App\Http\Controllers;

use App\Http\Requests\BienContactRequest;
use App\Http\Requests\SearchBienRequest;
use App\Mail\BienContactMail;
use App\Models\BienImmobilier;
use App\Services\TimeSlotService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    protected $timeSlotService;

    public function __construct(TimeSlotService $timeSlotService)
    {
        $this->timeSlotService = $timeSlotService;
    }

    public function index(SearchBienRequest $request)
    {
        $query = BienImmobilier::query()->orderBy('created_at', 'desc')
            ->with(['images']);

        if ($request->has('type')) {
            $query = $query->where('type_bien', 'like', '%'. $request->input('type'). '%');
        }
        if ($request->has('region')) {
            $query = $query->where('ville', 'like', '%'. $request->input('region'). '%');
        }
        if ($request->has('ville')) {
            $query = $query->where('adresse', 'like', '%'. $request->input('ville'). '%');
        }
        // Exclure les biens de type "terrain" ou "mangazin"
        $query = $query->whereNotIn('type_bien', ['terrain', 'mangazin']);
        $biens = $query->paginate(6);

        $autreBiens = BienImmobilier::whereIn('type_bien', ['mangazin', 'terrain'])->with(['images'])->paginate(4);

        return view('pages.index', ['biens' => $biens, 'input' => $request->validated(), 'autreBiens' => $autreBiens]);

    }

    public function location()
    {
        $biensLocations = BienImmobilier::where('titre', 'like', '%louer%')->paginate(10);

        return view('pages.location', compact('biensLocations'));
    }

    public function vente()
    {
        $biensVentes = BienImmobilier::where('titre', 'like', '%vendre%')->paginate(10);

        return view('pages.vente', compact('biensVentes'));
    }

    public function show(string $slug,  BienImmobilier $bien)
    {
        if ($bien->getSlug() != $slug) {
            return to_route('pages.show', ['slug' => $bien->getSlug(), 'bien' => $bien]);
        }

        $biensSimilaires = BienImmobilier::where('type_bien', $bien->type_bien)
            ->where('ville', $bien->ville)
            ->where('id', '!=', $bien->id)->limit(3)->get();

        $timeSlots = $this->timeSlotService->generateTimeSlots(now()->toDateString());

        return view('pages.show', [
            'bien' => $bien,
            'biensSimilaires' => $biensSimilaires,
            'timeSlots' => $timeSlots,
        ]);
    }
    public function contact( BienImmobilier $bien, BienContactRequest $request)
    {
        Mail::send(new BienContactMail($bien, $request->validated()));
        return back()->with('success', 'Votre demande a été envoyée avec succés');
    }
    public function nousContacter() {
        return view('contact.contact');
    }
}
