@extends('layouts.app')
@section('title', 'détails ')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <h3 class="mb-3 font-monospace">{{ $bien->titre }}</h3>
                <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel"
                     style="width: 32rem;">
                    <div class=" detail-carousel carousel-inner">
                        @foreach($bien->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}"
                                 style="width: 100%; height: 100%;">
                                <img src="{{ asset('storage/images/' . $image->nom) }}" class="d-block w-100 h-100"
                                     alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <h3 class="mt-4 font-monospace">Prix: {{number_format( $bien->prix, thousands_separator: ' ') }}
                    FCFA</h3>
            </div>
            <div class="col-md-6">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h3 class="font-monospace">Ce bien vous intéresse t-il?</h3>
                <form action="{{ route('contact', $bien) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom"
                                       @if(Auth::check()) value="{{ Auth::user()->prenom }}" @endif>
                                @error('prenom')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom"
                                       @if(Auth::check()) value="{{ Auth::user()->nom }}" @endif>
                                @error('nom')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone"
                                       @if(Auth::check()) value="{{ Auth::user()->telephone }}" @endif>
                                @error('telephone')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       @if(Auth::check()) value="{{ Auth::user()->email }}" @endif>
                                @error('email')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="message">Votre message</label>
                            <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                            @error('message')
                            <div class=" alert alert-danger mt-1 mb-1">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-dark float-end" type="submit">Nous contacter</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="mt-4">
            <div class="d-flex justify-content-between">
                <div class="row ">
                    <div class="col-md-6">
                        <h5 class="text-dark-500 font-monospace fw-bold">Description</h5>
                        <p class="text-justify">{{ $bien->description }}</p>
                    </div>
                    <div class="col-md-6">
                        <!-- Formulaire pour programmer une visite -->

                        <h5 class="text-dark-500 font-monospace fw-bold">Voulez-vous visiter les lieux?</h5>
                        <form action="{{ route('visite.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="date">Choisissez une date</label>
                                <input type="date" id="date_visite" name="date_visite" class="form-control"
                                       value="{{ date('Y-m-d') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="time_slot">Choisissez un créneau horaire</label>
                                <select name="heure_visite" id="heure_visite" class="form-control">
                                    @foreach ($timeSlots as $timeSlot)
                                        <option value="{{ $timeSlot['start'] }}">
                                            {{ $timeSlot['start'] }} - {{ $timeSlot['end'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="bien_id" value="{{ $bien->id }}">
                            <input type="hidden" name="client_id"
                                   @if(Auth::check()) value="{{ Auth::user()->id }}" @endif>
                            <input type="hidden" name="proprietaire_id" value="{{$bien->proprietaire->id}}">
                            <button type="submit" class=" btn btn-dark float-end">Programmer une visite</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr class="sidebar-divider ">
        <div class="row mt-5">
            <div class="col-8">
                <h3>Caractéristiques</h3>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>Surface</td>
                        <td>{{ $bien->superficie }}m²</td>
                    </tr>
                    <tr>
                        <td>Nombres de chambres</td>
                        <td>{{$bien->nombre_pieces}}</td>
                    </tr>
                    <tr>
                        <td>Type de bien</td>
                        <td>{{$bien->type_bien}}</td>
                    </tr>
                    <tr>
                        <td>Statut</td>
                        <td>{{$bien->statut}}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>{{$bien->adresse}}<br>{{ $bien->ville }} </td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h3>Spécificités</h3>
                <ul class="list-group">
                    @foreach($bien->options as $option)
                        <li class="list-group-item">
                            {{$option->nom}}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr class="sidebar-divider">

        <div class="mt-3">
            @if($biensSimilaires->isNotEmpty())
                <h3 class="mb-3 fw-bold">Biens similaires</h3>
                <div class="row">
                    @foreach($biensSimilaires as $similaire)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/images/' . $similaire->images->first()->nom) }}"
                                     class="card-img-top" alt="Image du bien">
                                <div class="card-body">
                                    <h5 class="card-title mb-2">{{ substr($similaire->titre, 0, 35) }}...</h5>
                                    <small>{{ $similaire->adresse }} - {{ $similaire->ville }}</small>
                                    <p class="card-text text-muted fs-6">{{ substr($similaire->description, 0,60) }}
                                        ...</p>
                                    <div class="text-end wf-bold text-danger"
                                         style="font-size: 1.2rem;">{{ number_format($similaire->prix, 0, ',', ' ') }}
                                        FCFA
                                    </div>
                                    <a href="{{ route('bien.show', ['slug' => $similaire->getSlug(), 'bien' => $similaire]) }}"
                                       class="btn btn-sm btn-primary">Voir plus</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    @include('layouts.footer')

@endsection
