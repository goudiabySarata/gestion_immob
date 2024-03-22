@extends('layouts.main')
@section('title', 'Contrats')
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
                        <h1 class="h3 mb-0 text-gray-800">Liste des propriétaires</h1>
                        <a href="{{ route('proprietaire.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter un propriétaire</a>
                    </div>
                    <hr class="sidebar-divider">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 col-sm col">
                            <table class="table table-hover  ">
                                <thead class="table-primary">
                                <tr>
                                    <th >ID</th>
                                    <th >Prénom</th>
                                    <th >Nom</th>
                                    <th >Adresse</th>
                                    <th >Email</th>
                                    <th >Téléphone</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($proprietaires->count() > 0)
                                    @foreach($proprietaires as $proprietaire)
                                        <tr>
                                            <td>{{ $proprietaire->id }}</td>
                                            <td>{{ $proprietaire->prenom }}</td>
                                            <td>{{ $proprietaire->nom }}</td>
                                            <td>{{ $proprietaire->adresse }}</td>
                                            <td>{{ $proprietaire->email }}</td>
                                            <td>{{ $proprietaire->telephone }}</td>
                                            <td>
                                                <div class="d-flex justify-content-around ">
                                                    <a href="{{ route('proprietaire.edit', ['proprietaire' => $proprietaire->id]) }}" class="btn btn-primary "><i class="fa-solid fa-pen-to-square" title="Modifier"></i></a>
                                                    <form id="deleteForm{{ $proprietaire->id }}" action="{{ route('proprietaire.destroy', ['proprietaire' => $proprietaire->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger ml-3" onclick="confirmDelete({{ $proprietaire->id }})"><i class="fa-solid fa-trash" title="Supprimer"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10" class="text-gray-400 text-ms">Aucun propriétaire trouvé</td>
                                    </tr>
                                @endif
                                {{$proprietaires->links()}}
                                </tbody>
                            </table>
                        </div>
                    </div>
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
