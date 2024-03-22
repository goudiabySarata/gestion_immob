@extends('layouts.main')
@section('title', 'Visites')
@section('content')
    <div id="wrapper">
        @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.admin-nav')
                <!-- Begin Page Content -->
                <div class="container ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="h3 mb-0 text-gray-800">Les visites disponibles</h1>
                        <a href="{{ route('biens.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter un bien</a>
                    </div>
                    <hr class="sidebar-divider">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date de visite</th>
                            <th scope="col">Heure de visite</th>
                            <th scope="col">Identifiant du bien</th>
                            <th scope="col">Identifiant du client</th>
                            <th scope="col">Identifiant du propriétaire</th>
                            <th scope="col" class="text-center">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($visites->count() > 0)
                            @foreach($visites as $visite)
                                <tr>
                                    <td>{{ $visite->id }}</td>
                                    <td>{{ $visite->data_visite }}</td>
                                    <td>{{ $visite->heure_visite }}</td>
                                    <td title="{{ $visite->biens->titre }}">{{ $visite->bien_id }}</td>
                                    <td title="{{ $visite->clients->prenom }} {{ $visite->clients->nom }}">{{ $visite->client_id }}</td>
                                    <td title="{{ $visite->proprietaire->prenom }} {{ $visite->proprietaire->nom }}">{{ $visite->proprietaire_id }}</td>
                                    <td>
                                        <div class="d-flex justify-content-around ">
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#detailModal">
                                                Voir les détails de la visite
                                            </button>
                                            <form id="deleteForm{{ $visite->id }}" action="{{ route('visite.destroy', ['visite' => $visite->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger ml-3" onclick="confirmDelete({{ $visite->id }})"><i class="fa-solid fa-trash" title="Supprimer"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-gray-400 text-ms">Aucun bien trouvé</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <ul>



                    </ul>
                </div>

            </div>

            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.admin-footer')
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
        @include('layouts.viewdetails')
    </div>
    <!-- End of Page Wrapper -->


@endsection
