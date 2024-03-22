@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
    @include('layouts.carousel')
    <div class=" propriete-vedette container ">
        <h3 class="mb-4 font-monospace">propriétés en védettes</h3>
        <div class=" cols row mt-3">
            @forelse ($biens as $bien)
                <div class=" col-md-4 mb-4">
                    <a href="{{ route('bien.show', ['slug' => $bien->getSlug(), 'bien' => $bien]) }}" class="nav-link">
                        <div class="card" style="width: 22rem;">
                            @if ($bien->images->count() > 0)
                                <img src="{{ asset('storage/images/' . $bien->images->first()->nom) }}"
                                     class="card-img-top img-fluid" alt="Image du bien">
                            @else
                                <img src="{{ asset('images/04.jpg') }}" class="card-img-top img-fluid"
                                     alt="Image par défaut">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ substr($bien->titre, 0, 35) }}...</h5>
                                <small>{{ $bien->adresse }} - {{ $bien->ville }}</small>
                                <p class="card-text">{{ substr($bien->description, 0, 60) }}...</p>
                                <div class="text-end wf-bold text-danger"
                                     style="font-size: 1.2rem;">{{ number_format($bien->prix, 0, ',', ' ') }} FCFA
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <h4 class="alert-heading">Aucun biens trouvés!</h4>
                        </div>
                    </div>
                </div>
            @endforelse
            <div class="d-flex justify-content-center mt-4">
                {{ $biens->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <div class="brand container-fluid mt-5">
        <div class="pt-4 text-center">
            <h3>Vous êtes une agence </h3>
            <h3>ou un promoteur immobilier ?</h3>
            <button class="btn btn-secondary mb-4 mt-3">Inscrivez votre structure sur notre plate-forme</button>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <h4 class="fw-bold font-monospace text-gray-500">Cherchez-vous un mangazin ou un terrain à achéter ?</h4>
            @foreach($autreBiens as $autreBien)
                <div class="col-md-6 mb-3">
                    <div class=" autres " style="width: 34rem;">
                        <h5 class="p-2">{{ $autreBien->titre }}</h5>
                        <div class="d-flex">
                            @if ($autreBien->images->count() > 0)
                                <img src="{{ asset('storage/images/' . $autreBien->images->first()->nom) }}"
                                     class="card-img-top w-50 img-fluid" alt="Image du bien">
                            @else
                                <img src="{{ asset('images/03.jpg') }}" class="card-img-top img-fluid"
                                     alt="Image par défaut">
                            @endif
                            <div class="w-100">
                                <strong>{{ number_format($autreBien->prix, 0, ',', ' ') }} FCFA</strong>
                                <p>
                                    {{ substr($autreBien->description, 0,90) }}...
                                </p>
                                <a href="{{ route('bien.show', ['slug' => $autreBien->getSlug(), 'bien' => $autreBien]) }}"
                                   class="btn btn-sm w-50 btn-dark ml-1">Voir plus</a>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                {{ $autreBiens->links('pagination::bootstrap-4') }}
            </div>


        </div>

    </div>

    @include('layouts.footer')

@endsection
