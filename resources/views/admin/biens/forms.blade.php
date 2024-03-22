@extends('layouts.main')
@section('title', $bien->exists ? 'Modifier bien' : 'Ajouter un bien')
@section('content')
    <div id="wrapper">
        @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.admin-nav')
                <!-- Begin Page Content -->

                <div class="container">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h5>@yield('title')</h5>
                    <hr class="sidebar-divider">
                    <form action="{{ $bien->exists ? route('biens.update', ['bien' => $bien->id]) : route('biens.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($bien->exists)
                            @method('PUT')
                        @endif
                        <div class="row mb-3">
                            <div class="col">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" value="{{ old('titre', $bien->titre) }}" name="titre">
                                @error('titre')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="type_bien">Type de bien</label>
                                <input type="text" class="form-control" id="type_bien" value="{{ old('type_bien', $bien->type_bien) }}" name="type_bien">
                                @error('type_bien')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" id="adresse" value="{{ old('adresse', $bien->adresse) }}" name="adresse">
                                @error('adresse')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="ville">Ville</label>
                                <input type="text" class="form-control" id="ville" value="{{ old('ville', $bien->ville) }}" name="ville">
                                @error('ville')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" id="prix" value="{{ old('prix', $bien->prix) }}" name="prix">
                                @error('prix')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="superficie">Sperficie</label>
                                <input type="text" class="form-control" id="superficie" name="superficie" value="{{ old('superficie', $bien->superficie) }}">
                                @error('superficie')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $bien->description) }}</textarea>
                                @error('description')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="statut">Statut</label>
                                <input type="text" class="form-control" id="statut" name="statut" value="{{ old('statut', $bien->statut) }}">
                                @error('statut')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="nombre_pieces">Nombre de chambres</label>
                                <input type="text" class="form-control" id="nombre_pieces" name="nombre_pieces" value="{{ old('nombre_pieces', $bien->nombre_pieces) }}">
                                @error('nombre_pieces')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="images">Photos</label>
                                <input type="file" class="" id="images" name="images[]" multiple>
                                @error('images')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label for="option">Options</label>
                                    <select  id="option" name="option[]" multiple>
                                        @foreach($options as $optionId => $optionName)
                                            <option {{ $bien->options->contains($optionId) ? 'selected' : '' }} value="{{ $optionId }}">{{ $optionName }}</option>
                                        @endforeach
                                    </select>
                                    @error('option')
                                    <div class="alert alert-danger mt-1 mb-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="proprietaire_id">Propriétaire id</label>
                                    <select name="proprietaire_id" id="proprietaire_id" class="form-control">
                                        @foreach($proprietaires as $proprietaire)
                                            <option value="{{ $proprietaire->id }}"
                                                    title="{{ $proprietaire->prenom }} {{ $proprietaire->nom }}">
                                                {{ $proprietaire->id}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('proprietaire_id')
                                    <div class="alert alert-danger mt-1 mb-1">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">
                                @if($bien->exists)
                                    Modifier bien
                                @else
                                    Ajouter bien
                                @endif
                            </button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.admin-footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->


@endsection
