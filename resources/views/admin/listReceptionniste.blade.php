@extends('layouts.masterAdmin')
@section('contenu')


@if (session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
@endif

liste des receptionnniste

<table class="table table-striped" id="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        {{-- <th scope="col">Prénom</th> --}}
        <th scope="col">Contacts</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $receptionnistes as $receptionniste )
        
      <tr>
        <th scope="row">{{ $loop->index+1 }}</th>
        <td>{{ $receptionniste->nom_receptin }}</td>
        <td>{{ $receptionniste->contact_receptin }}</td>
        {{-- <td>{{ $receptionniste->numeroclient }}</td> --}}
        <td>
            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        </td>
      </tr>

      @endforeach
      
    </tbody>
  </table>

@endsection