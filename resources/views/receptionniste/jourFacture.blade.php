@extends('layouts.masterReceptionniste')

@section('contenu')


  <table class="table table-striped" id="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Code facture</th>
        <th scope="col">Client</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $faturesdujour as $faturedujour )
        
      <tr>
        <th scope="row">{{ $loop->index+1 }}</th>
        <td>{{ $faturedujour->codefacture }}</td>
        <td>{{ $faturedujour->nomclient }}</td>
        <td>
            {{-- <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> --}}
            <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a>
        </td>
      </tr>

      @endforeach
      
    </tbody>
  </table>

@endsection