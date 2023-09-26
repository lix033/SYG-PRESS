@extends('layouts.masterReceptionniste')
@section('contenu')
    <div class="container-fluid pt-4 px-4">

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <form action="{{ route('facture.ajout.action') }}" method="post">
            @csrf
            <div class="row g-4">
                <input type="text" name="codefacture" class="form-control" value="{{$codeFacture}}" readonly>
                <div class="col-6">

                    <p>Choisissez une tarification :</p>
                    @foreach ($tarifications as $index=>$tarif)
                        <div class="form-check">


                            <input class="form-check-input" type="checkbox" value="{{ $tarif->id}}"
                            name="tarification[]" id="prixtarif_{{ $tarif->id }}"
                            onchange="toggleQuantity({{$tarif->id}})">


                            {{-- c'est le label qui affiche la tarification et le prix --}}
                            <label class="form-check-label" for="prixtarif_{{ $tarif->id }}">
                                {{ $tarif->libtarif }} -> {{ $tarif->prixtarif }}
                            </label>
                            {{-- {{$tarif->libtarif}} --}}
                            {{-- //input lié a la la quantité du tarif --}}
                            <input class="form-control w-50" type="number" id="quantite_{{ $tarif->id }}"
                                oninput="updateSubTotal({{$tarif->id}})" name="quantite[]" placeholder="Quantité"
                                min="0" disabled>

                                {{-- //c'est la partie ou on affiche le sous-total du tafif selectionné --}}
                            {{-- <span id="tot_{{ $tarif->id }}" name="soutot[]"></span> --}}
                        </div>
                        <br>
                    @endforeach
                            {{-- <input type="hidden" value="{{ $tarif->libtarif }}" name="libtarif[]"> --}}

                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>

                <div class="col-md-6">


                    <div class="form-floating mb-3">

                        <select class="form-select select2" id="floatingSelect" name="nomclient" aria-label="Floating label select example">
                            <option selected>Choisissez un client</option>

                            @foreach ($clients as $client)
                            <option value="{{$client->nomclient}}">{{$client->nomclient}}</option>
                            @endforeach

                        </select>

                        <label for="floatingSelect"></label>

                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="paiement" id="avance" value="0">
                        <label for="avance">Avance paiement</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="remise" id="remise" value="0">
                        <label for="remise">Remise</label>
                    </div>

                    <div class="form-floating">
                        <input type="date" class="form-control" name="daterecup" id="daterecup">
                        <label for="daterecup">Date récupération</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="time" class="form-control" name="heurerecup" id="heurerecup">
                        <label for="heurerecup">Heure récupération</label>
                    </div>

                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="total_facture" id="total_facture" readonly>
                    <label for="total_facture">Total facture</label>
                </div>
                <button class="btn btn-primary">Ajouter facture</button>
            </div>
        </form>

    </div>

    <script>
        //c'est la foncion pour activer ou desactiver la quantité si le checkbox est coché ou pas.
        function toggleQuantity(tarifId) {
            var checkBox = document.getElementById("prixtarif_" + tarifId);
            var quantiteInput = document.getElementById("quantite_" + tarifId);

            if (checkBox.checked) {
                quantiteInput.disabled = false;
                updateSubTotal(tarifId); // Appel pour mettre à jour le sous-total
            } else {
                quantiteInput.disabled = true;
                quantiteInput.value = ""; // Réinitialisation de la valeur de la quantité
                document.getElementById("tot_" + tarifId).innerHTML = ""; // Réinitialiser le total affiché pour le chefkbox
            }
        }

        function updateSubTotal(tarifId) {
            //je recupère la quantité pour chaque checkbox et la valeur de leur total
            var quantiteInput = document.getElementById("quantite_" + tarifId);
            var sousTotalInput = document.getElementById("tot_" + tarifId);

            if (quantiteInput && sousTotalInput) {
                var quantite = quantiteInput.value;
                var prix = document.getElementById("prixtarif_" + tarifId).value;
                var total = quantite * prix;

                sousTotalInput.value = total; // Mettre à jour le champ de sous-total
                document.getElementById("tot_" + tarifId).innerHTML = "Total : " + total;

                // Mettre à jour le grand total en additionnant tous les sous-totaux
                var grandTotal = 0;
                var sousTotals = document.getElementsByName("soutot[]");

                for (var i = 0; i < sousTotals.length; i++) {

                    var sousTotalValue = parseFloat(sousTotals[i].value);
                    //ici je verifie si la valeur est numérique ou pas pour eviter d'afficher une valeur NaN
                    if (!isNaN(sousTotalValue) && sousTotalValue >= 0) {
                        //Calcul du grad total
                        grandTotal += sousTotalValue;
                    }
                }

                console.log(grandTotal);
                //ici on affiche le grand total ///
                document.getElementById("total_facture").value = grandTotal;

            }
        }
    </script>
@endsection
