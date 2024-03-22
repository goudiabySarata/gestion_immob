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
                        <h1 class="h3 mb-0 text-gray-800">Liste des options</h1>
                        <a href="{{ route('options.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter une option</a>
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
                            <th scope="col">Nom</th>
                            <th scope="col" class="float-right">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($options->count() > 0)
                            @foreach($options as $option)
                                <tr>
                                    <td>{{ $option->id }}</td>
                                    <td>{{ $option->nom }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end ">
                                            <a href="{{ route('options.edit', ['option' => $option->id]) }}" class="btn btn-primary "><i class="fa-solid fa-pen-to-square" title="Modifier"></i></a>
                                            <form id="deleteForm{{ $option->id }}" action="{{ route('options.destroy', ['option' => $option->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger ml-3" onclick="confirmDelete({{ $option->id }})"><i class="fa-solid fa-trash" title="Supprimer"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">Aucune option trouvée</td>
                            </tr>
                        @endif
                        {{$options->links()}}
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
