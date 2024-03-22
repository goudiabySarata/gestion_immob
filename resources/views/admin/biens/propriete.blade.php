@extends('layouts.main')
@section('title', 'Biens immobiliers')
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
                        <h1 class="h3 mb-0 text-gray-800">Liste des biens immobiliers</h1>
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
                                <th scope="col">Titre</th>
                                <th scope="col">type biens</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Superficie</th>
                                <th scope="col">Propriétaire</th>
                                <th scope="col" class="text-center">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                        @if($biens->count() > 0)
                            @foreach($biens as $bien)
                                <tr>
                                    <td>{{ $bien->id }}</td>
                                    <td>{{ substr($bien->titre, 0, 15) }}</td>
                                    <td>{{ $bien->type_bien }}</td>
                                    <td>{{ $bien->statut }}</td>
                                    <td>{{ $bien->adresse }}</td>
                                    <td>{{ $bien->ville }}</td>
                                    <td>{{ $bien->prix }}</td>
                                    <td>{{ $bien->superficie }}m²</td>
                                    <td>{{ $bien->proprietaire->prenom }} {{ $bien->proprietaire->nom }}</td>
                                    <td>
                                        <div class="d-flex justify-content-around ">
                                            <a href="{{ route('biens.edit', ['bien' => $bien->id]) }}" class="btn btn-primary "><i class="fa-solid fa-pen-to-square" title="Modifier"></i></a>
                                            <form id="deleteForm{{ $bien->id }}" action="{{ route('biens.destroy', ['bien' => $bien->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger ml-3" onclick="confirmDelete({{ $bien->id }})"><i class="fa-solid fa-trash" title="Supprimer"></i></button>
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
                        {{$biens->links()}}
                        </tbody>
                    </table>
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
