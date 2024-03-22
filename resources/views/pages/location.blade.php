@extends('layouts.app')
@section('title', 'Annonces liée aux locations')
@section('content')
    <div class=" propriete-vedette container ">
        <h4 class="mb-3 font-monospace text-gray-500">@yield('title') </h4>
        <div class="row me-3">
            @foreach($biensLocations as $bienLocation)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('location.show', ['slug' => $bienLocation->getSlug(), 'bien' => $bienLocation]) }}"
                       class="nav-link">
                        <div class="card" style="width: 22rem;">
                            @if ($bienLocation->images->count() > 0)
                                <img src="{{ asset('storage/images/' . $bienLocation->images->first()->nom) }}"
                                     class="card-img-top img-fluid" alt="Image du bien">
                            @else
                                <img src="{{ asset('images/04.jpg') }}" class="card-img-top img-fluid"
                                     alt="Image par défaut">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ substr($bienLocation->titre, 0, 35) }}...</h5>
                                <small>{{ $bienLocation->adresse }} - {{ $bienLocation->ville }}</small>
                                <p class="card-text">{{ substr($bienLocation->description, 0, 60) }}...</p>
                                <div class="text-end wf-bold text-danger"
                                     style="font-size: 1.2rem;">{{ number_format($bienLocation->prix, 0, ',', ' ') }}
                                    FCFA
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
