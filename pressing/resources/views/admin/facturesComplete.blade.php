@extends('layouts.masterAdmin')

@section('contenu')

<div class="container-fluid pt-4 px-4">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Facture</th>
        <th scope="col">Client</th>
        <th scope="col">Montant facture</th>
        <th scope="col">Reste a payé</th>
        <th scope="col">Etat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $lesfactures as $facture )
        
      <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td>{{$facture->codefacture}}</td>
        <td>{{$facture->nomclient}}</td>
        <td>{{$facture->paiement}} CFA</td>
        <td>{{$facture->total - $facture->paiement}} CFA</td>
        <td class=""><span class="badge bg-success text-light">Payé</span> </td>
        <td>
            <a href="#"><i class="fas fa-edit"></i></a>
            <a href="#"><i class="fas fa-trash text-danger"></i></a>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
  @endsection