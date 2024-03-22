@extends('layouts.main')
@section('title', $option->exists ? 'Modifier option' : 'Ajouter une option')
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
                    <h5>@yield('title')</h5>
                    <hr class="sidebar-divider">
                    <form action="{{ $option->exists ? route('options.update', ['option' => $option->id]) : route('options.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method($option->exists ? 'put' : 'post')
                        <div class="row mb-3">
                            <div class="col">
                                <label for="titre">Nom</label>
                                <input type="text" class="form-control" id="nom" value="{{ old('nom', $option->nom) }}" name="nom">
                                @error('nom')
                                <div class=" alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100">
                                @if($option->exists)
                                    Modifier option
                                @else
                                    Ajouter option
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
