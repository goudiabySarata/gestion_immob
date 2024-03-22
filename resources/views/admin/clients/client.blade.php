@extends('layouts.main')
@section('title', 'clients')
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
                   <table class="table table-striped ">
                       <thead>
                       <tr>
                           <th scope="col">#</th>
                           <th scope="col">Prénom</th>
                           <th scope="col">Nom</th>
                           <th scope="col">Adresse</th>
                           <th scope="col">Email</th>
                           <th scope="col">Téléphone</th>
                           <th scope="col">Type Client</th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach($clients as $client)
                           <tr>
                               <th scope="row">{{$client->id}}</th>
                               <td>{{$client->prenom}}</td>
                               <td>{{$client->nom}}</td>
                               <td>{{$client->adresse}}</td>
                               <td>{{$client->email}}</td>
                               <td>{{$client->telephone}}</td>
                               <td>{{$client->type_client}}</td>
                           </tr>
                       @endforeach
                       {{$clients->links()}}
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
