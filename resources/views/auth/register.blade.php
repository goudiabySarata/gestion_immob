@extends('layouts.app')

@section('content')
    <div class=" bg_gradient container-fluid">
        <div class=" auth container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">{{ __('Créer un compte') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="prenom" class="form-label">{{ __('Prénom') }}</label>
                                            <input id="prenom" type="text"
                                                   class="form-control @error('prenom') is-invalid @enderror"
                                                   name="prenom" value="{{ old('prenom') }}" required
                                                   autocomplete="prenom" autofocus>
                                            @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nom" class="form-label">{{ __('Nom') }}</label>
                                            <input id="nom" type="text"
                                                   class="form-control @error('nom') is-invalid @enderror" name="nom"
                                                   value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                                            @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="adresse" class="form-label">{{ __('Adresse') }}</label>
                                            <input id="adresse" type="text"
                                                   class="form-control @error('adresse') is-invalid @enderror"
                                                   name="adresse" value="{{ old('adresse') }}" required
                                                   autocomplete="adresse" autofocus>
                                            @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="type_client"
                                                   class="form-label">{{ __('Vous êtes un achéteur ou un locataire') }}</label>
                                            <select
                                                class=" form-select form-control @error('type_client') is-invalid @enderror"
                                                name="type_client">
                                                <option value="locataire">Locataire</option>
                                                <option value="acheteur">Achéteur</option>
                                            </select>
                                            @error('type_client')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="telephone" class="form-label">{{ __('Téléphone') }}</label>
                                            <input id="telephone" type="number"
                                                   class="form-control @error('telephone') is-invalid @enderror"
                                                   name="telephone" value="{{ old('date_nais') }}" required
                                                   autocomplete="telephone" autofocus>
                                            @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">{{ __('Adresse Email') }}</label>
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="email"
                                                   autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                                            <input id="password" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" value="{{ old('password') }}" required
                                                   autocomplete="new-password" autofocus>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="password-confirm"
                                                   class="form-label">{{ __('Confirmer mot de passe') }}</label>
                                            <input id="password-confirm" type="password" class="form-control "
                                                   name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary w-100 mt-3 mb-2">Créer compte</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
