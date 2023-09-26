@extends('layouts.masterReceptionniste')
@section('contenu')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

            <form action="{{route('recept.client.add')}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nomclient" id="nom">
                    <label for="nom">Nom Client</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="prenomclient" id="prenom">
                    <label for="prenom">Prenom Client</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="numeroclient" id="contact">
                    <label for="contact">Contact Client</label>
                </div>

                <button class="btn btn-success">Ajoutez</button>
                <button class="btn btn-danger">Annuler</button>
            </form>

        </div>
    </div>
@endsection
