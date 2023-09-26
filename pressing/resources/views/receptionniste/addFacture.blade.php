@extends('layouts.masterAdmin')
@section('contenu')
    <div class="container-fluid pt-4 px-4">

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form action="{{ route('ajout.facture.action') }}" method="post">
            @csrf
            <div class="row g-4">
                <div class="col-6">

                    <p>Choisissez une tarification :</p>
                    @foreach ($tarifications as $tarif)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $tarif->prixtarif }}"
                                name="tarification[]" id="prixtarif_{{ $tarif->id }}">
                            <label class="form-check-label" for="prixtarif_{{ $tarif->id }}">
                                {{ $tarif->libtarif }} -> {{ $tarif->prixtarif }}
                            </label>
                        </div><br>
                    @endforeach

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach

                </div>

                <div class="col-md-6">
                    <form action="{{route('search.client')}}" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nomclient" id="floatingInput" placeholder="">
                            <label for="floatingInput">Tapez le nom du client</label>
                        </div>
    
                        <button class="btn btn-warning mb-3">Rechercher</button>
                    </form>
                   

                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" name="nomclient"
                            aria-label="Floating label select example">
                            <option selected>Choisissez un client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->nomclient }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Cliquer pour sélectionner</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nomclient" placeholder="" disabled>
                        <label for="nomclient"></label>
                    </div>
                    <div class="form-floating">
                        <input type="date" class="form-control" name="daterecup" id="daterecup">
                        <label for="daterecup">Date récupération</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="time" class="form-control" name="heurerecup" id="heurerecup">
                        <label for="heurerecup">Heure récupération</label>
                    </div>

                    
                </div>
                <button class="btn btn-success">Creer facture</button>
            </div>
        </form>

    </div>
@endsection
