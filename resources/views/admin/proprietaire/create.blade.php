@extends('layouts.main')
@section('title', $proprietaire->exists ? 'Modifier proprietaire': 'Ajouter un(e) proprietaire')
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
                   <form action="{{ route($proprietaire->exists ? 'proprietaire.edit': 'proprietaire.store', $proprietaire) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       @method($proprietaire->exists ? 'put' : 'post')
                       <div class="row mb-3">
                           <div class="col">
                               <label for="prenom">Prénom</label>
                               <input type="text" class="form-control" id="prenom" value="{{ old('prenom') }}" name="prenom" placeholder="Ex: <Modou>">
                               @error('prenom')
                                   <div class=" alert alert-danger mt-1 mb-1">
                                       {{ $message }}
                                   </div>
                               @enderror
                           </div>
                           <div class="col">
                               <label for="nom">Nom</label>
                               <input type="text" class="form-control" id="nom" value="{{ old('nom') }}" name="nom" placeholder="Ex: <Diop>">
                               @error('nom')
                                   <div class=" alert alert-danger mt-1 mb-1">
                                       {{ $message }}
                                   </div>
                               @enderror
                           </div>
                       </div>
                       <div class="row mb-3">
                           <div class="col">
                               <label for="adresse">Adresse</label>
                               <input type="text" class="form-control" id="adresse" value="{{ old('adresse') }}" name="adresse" placeholder="Ex: <Pikine>">
                               @error('adresse')
                                   <div class=" alert alert-danger mt-1 mb-1">
                                       {{ $message }}
                                   </div>
                               @enderror
                           </div>
                           <div class="col">
                               <label for="date_naissance">Date de naissance</label>
                               <input type="date" class="form-control" id="date_naissance" value="{{ old('date_naissance') }}" name="date_naissance">
                               @error('date_naissance')
                                   <div class=" alert alert-danger mt-1 mb-1">
                                       {{ $message }}
                                   </div>
                               @enderror
                           </div>
                       </div>
                       <div class="row mb-3">
                           <div class="col">
                               <label for="email">Email</label>
                               <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Ex: <exemple@gmail.com>">
                               @error('email')
                               <div class=" alert alert-danger mt-1 mb-1">
                                   {{ $message }}
                               </div>
                               @enderror
                           </div>
                           <div class="col">
                               <label for="telephone">Téléphone</label>
                               <input type="number" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
                               @error('telephone')
                                   <div class=" alert alert-danger mt-1 mb-1">
                                       {{ $message }}
                                   </div>
                               @enderror
                           </div>
                       </div>
                       <div class="row mb-4">
                           <div class="col">
                               <label for="password">Mot de passe par défaut</label>
                               <input type="password" class="form-control" id="password" name="password">
                               @error('password')
                                   <div class=" alert alert-danger mt-1 mb-1">
                                       {{ $message }}
                                   </div>
                               @enderror
                           </div>
                       </div>
                       <div class="mt-4">
                           <button type="submit" class="btn btn-primary w-100">
                               @if($proprietaire->exists)
                                   Modifier
                               @else
                                   Ajouter propriétaire
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
