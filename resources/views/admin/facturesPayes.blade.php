@extends('layouts.masterAdmin')

@section('contenu')

<div class="container-fluid pt-4 px-4">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Client</th>
        <th scope="col">Facture</th>
        <th scope="col">Etat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>FACT-57986jhk</td>
        <td class=""><span class="badge bg-success text-dark">Payé</span></td>
        <td>
            <a href="#"><i class="fas fa-edit"></i></a>
            <a href="#"><i class="fas fa-trash text-danger"></i></a>
        </td>
      </tr>
      
    </tbody>
  </table>
</div>
  @endsection