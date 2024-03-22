@extends('layouts.app')
@section('title', 'Mon profile')
@section('content')

    <div class="container mt-5">
        <h3 class="fw-bold font-monospace">Mon profile</h3>
        <div class="row">
            <div class="col-md-12">
                <div id="wrapper">
                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">
                        <!-- Main Content -->
                        <div id="content">
                            @if(session('success'))
                                <div class="alert alert-success text-center fs-3 font-monospace">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <!-- Begin Page Content -->
                            <form action="{{ route('updateProfil', ['client' => $client->id]) }}" method="POST" enctype="multipart/form-data" class="m-2">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 border-right">
                                        <div class="p-2 py-5">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h6 class="mb-0">Informations Personnelles</h6>
                                            </div>
                                            <div class="row mt-2" >
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="prenom">Prénom</label>
                                                        <input type="text" class="form-control" id="prenom" value="{{ $client->prenom }}" name="prenom" >
                                                        @error('prenom')
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nom">Nom</label>
                                                        <input type="text" class="form-control" id="nom" value="{{ $client->nom }}" name="nom" >
                                                        @error('nom')
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="email">Email</label>
                                                        <input type="email" disabled class="form-control" id="email" value="{{ $client->email }}" name="email" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="telephone">Téléphone</label>
                                                        <input type="number" class="form-control" id="telephone" value="{{ $client->telephone }}" name="telephone" >
                                                        @error('telephone')
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="adresse">Adresse</label>
                                                        <input type="text" class="form-control" id="adresse" value="{{ $client->adresse }}" name="adresse" >
                                                        @error('adresse')
                                                        <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-success w-100 font-monospace">Sauvegarder profil</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- /.container-fluid -->

                        </div>
                        <!-- End of Main Content -->

                    </div>
                    <!-- End of Content Wrapper -->
                </div>
            </div>

        </div>
    </div>

@endsection
