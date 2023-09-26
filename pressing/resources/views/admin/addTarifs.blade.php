@extends('layouts.masterAdmin')

@section('contenu')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

            <form action="{{route('action.ajout.tarif')}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="libtarif" id="libelletarif">
                    <label for="libelletarif">Libelle Tarif</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="prixtarif" id="prixtarif">
                    <label for="prixtarif">Prix Tarif</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="desctarif" id="desctarif">
                    <label for="desctarif">Description Tarif</label>
                </div>

                <button class="btn btn-success">Ajoutez</button>
                <button class="btn btn-danger">Annuler</button>
            </form>

        </div>
    </div> 
@endsection
