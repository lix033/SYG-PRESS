@extends('layouts.masterAdmin')
@section('contenu')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @endforeach


            <form action="{{route('action.ajouter.receptionniste')}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nom" id="nom">
                    <label for="nom">Nom Receptionniste</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="contact" id="contact">
                    <label for="contact">Contact Receptionniste</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password">
                    <label for="password">Mot de passe</label>
                </div>

                <button class="btn btn-success">Ajoutez</button>
                <button class="btn btn-danger">Annuler</button>
            </form>
        </div>
    </div>
@endsection
