@extends('layouts.app')
@section('title', 'Achat de bien')
@section('content')
    <div class=" propriete-vedette container ">
        <h3 class="mb-3">@yield('title') </h3>
        <div class="row me-3">
            @foreach($biensVentes as $bienVente)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('vente.show', ['slug' => $bienVente->getSlug(), 'bien' => $bienVente]) }}"
                       class="nav-link">
                        <div class="card" style="width: 22rem;">
                            @if ($bienVente->images->count() > 0)
                                <img src="{{ asset('storage/images/' . $bienVente->images->first()->nom) }}"
                                     class="card-img-top img-fluid" alt="Image du bien">
                            @else
                                <img src="{{ asset('images/04.jpg') }}" class="card-img-top img-fluid"
                                     alt="Image par défaut">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ substr($bienVente->titre, 0, 35) }}...</h5>
                                <small>{{ $bienVente->adresse }} - {{ $bienVente->ville }}</small>
                                <p class="card-text">{{ substr($bienVente->description, 0, 60) }}...</p>
                                <div class="text-end wf-bold text-danger"
                                     style="font-size: 1.2rem;">{{ number_format($bienVente->prix, 0, ',', ' ') }} FCFA
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    @include('layouts.footer')

@endsection
