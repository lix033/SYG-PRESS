@extends('layouts.masterReceptionniste')

@section('contenu')


  <table class="table table-striped" id="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Contacts</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $clients as $client )
        
      <tr>
        <th scope="row">{{ $loop->index+1 }}</th>
        <td>{{ $client->nomclient }}</td>
        <td>{{ $client->prenomclient }}</td>
        <td>{{ $client->numeroclient }}</td>
        <td>
            {{-- <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
            <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        </td>
      </tr>

      @endforeach
      
    </tbody>
  </table>

@endsection