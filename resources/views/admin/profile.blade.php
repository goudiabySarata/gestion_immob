@extends('layouts.main')
@section('title', 'Mon profile')
@section('content')
    <div id="wrapper">
        @include('layouts.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.admin-nav')
                <!-- Begin Page Content -->
                <h3 class="text-center">Mon profile</h3>
                <form action="" method="POST" enctype="multipart/form-data" class="m-2">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 border-right">
                            <div class="p-2 py-5">
                                <div class="d-flex justify-content-between mb-3">
                                    <h6 class="mb-0">Informations Personnelles</h6>
                                </div>
                                <div class="row" id="res"></div>
                                <div class="row mt-2" >
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nom_complet">Nom Complet</label>
                                            <input type="text" class="form-control" id="nom_complet" value="{{ auth()->user()->nom_complet }}" name="nom_complet" placeholder="Ex: <Modou Diop>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" disabled class="form-control" id="email" value="{{ auth()->user()->email }}" name="email" placeholder="Ex: <exemple@gmail.com>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="telephone">Téléphone</label>
                                            <input type="number" class="form-control" id="telephone" value="{{ auth()->user()->telephone }}" name="telephone" placeholder="Ex: <000000000>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="adresse">Adresse</label>
                                            <input type="text" class="form-control" id="adresse" value="{{ auth()->user()->adresse }}" name="adresse" placeholder="Ex: <Kaolack>">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success w-100">Sauvegarder profil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- /.container-fluid -->

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
