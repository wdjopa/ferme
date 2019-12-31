@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Vagues </h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}" class="breadcrumb-link">Ferme</a></li>
                        <li class="breadcrumb-item"><a href="{{route("vagues.index")}}"
                                class="breadcrumb-link">Vagues</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Vague [{{$vague->nom}}]</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Qté
                    {{ strtolower($vague->libelle)}}
                    restante</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{$vague->quantite}}
                        {{ ucfirst($vague->libelle)}}(s)
                    </h1>
                </div>
                <br>
                <div class="metric-label text-muted d-inline-block float-right font-weight-bold">
                    <span>Sur {{App\Approvisionnement::find($vague->approvisionnement_id)->quantite}} {{ ucfirst($vague->libelle)}}(s)</span>
                </div>
            </div>
            <div id="sparkline-revenue"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Total Ventes comptant</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $vague->totalVentesComptant() }} FCFA</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                <span></span><span>{{ $vague->commandes->sum("cout_total") - $vague->totalVentesComptant() }} FCFA restant</span>
                </div>
            </div>
            <div id="sparkline-revenue"></div>
        </div>
    </div>
    {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Argent à récupérer</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">0 FCFA</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                    <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                </div>
            </div>
            <div id="sparkline-revenue2"></div>
        </div>
    </div> --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Total Pertes</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{$vague->pertes->sum('somme')}} FCFA</h1>
                </div>
                <br>
                <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                    <span>{{$vague->pertes->sum('quantite')}} {{ ucfirst($vague->libelle)}}(s) </span>
                </div>
            </div>
            <div id="sparkline-revenue3"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Total Gain</h5>
                <div class="metric-value d-inline-block">
                    @php
                    $gain = 0;
                    $gain = $vague->commandes->sum("cout_total") - $vague->pertes->sum('somme');    
                    @endphp
                    <h1 class="mb-1" style="color: @if($gain>0) forestgreen @else red @endif">{{ $gain }} FCFA</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                    @if($vague->totalVentesComptant() - $vague->pertes->sum('somme') < $gain)
                    <span><span></span>{{$vague->totalVentesComptant() - $vague->pertes->sum('somme')}} FCFA réel</span>
                    @else
                        <br><br><br>
                    @endif
                </div>
            </div>
            <div id="sparkline-revenue4"></div>
        </div>
    </div>
</div>


<div class="row">
    <form id="modifierLivraison" method="POST" action="{{route("commandes.livraison")}}">
        @csrf
        <input type="hidden" name="livraison" id="livraison">
        <input type="hidden" name="etat" value="1">
    </form>
    <div class="col-md-12 mt-2 col-sm-12">

        <div class="simple-card">
            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border-left-0" id="poulet-tab-simple" data-toggle="tab"
                        href="#poulet-simple" role="tab" aria-controls="poulet" aria-selected="true"><span
                            class="icon"><img src="{{asset("images/increase.png")}}" width="18" class="mr-2"
                                alt="" /></span> Gains / Ventes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="aliments-tab-simple" data-toggle="tab" href="#aliments-simple" role="tab"
                        aria-controls="aliments" aria-selected="false"><span class="icon"><img
                                src="{{asset("images/decrease.png")}}" width="18" class="mr-2"
                                alt="" /></span>Pertes</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="vaccins-tab-simple" data-toggle="tab" href="#vaccins-simple" role="tab"
                        aria-controls="vaccins" aria-selected="false"><span class="icon"><img
                                src="{{asset("images/box.png")}}" width="18" class="mr-2" alt="" /></span>Etat
                commandes</a>
                </li> --}}
            </ul>
            <div class="tab-content" id="myTabContent5">

                <div class="tab-pane fade show active" id="poulet-simple" role="tabpanel"
                    aria-labelledby="poulet-tab-simple">
                    <form method="POST" id="commandesForm" action="{{route("commandes.multipleDestroy")}}">
                        @csrf
                        <input type="hidden" name="vague" value="{{$vague->id}}">

                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-header">Liste des commandes</h5>
                                <h5 class="card-header">
                                    <a href="#!" data-toggle="modal" data-target="#nouvelleCommande"
                                        class="btn btn-primary btn-xs">Nouvelle
                                        commande</a>
                                    <button class="btn btn-danger btn-xs">Supprimer la sélection</button>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="tableCommandes">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="custom-control custom-checkbox be-select-all">
                                                        <input class="custom-control-input chk_all" type="checkbox"
                                                            name="chk_all"><span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th>ID</th>
                                                <th>Client</th>
                                                <th>Quantité</th>
                                                <th>Total</th>
                                                <th>Etat paiement</th>
                                                <th>Etat livraison</th>
                                                <th>Date</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vague->commandes->reverse() as $commande)
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkboxes" type="checkbox"
                                                            value="{{$commande->id}}" name="ids[]"
                                                            id="check{{$commande->id}}"><span
                                                            class="custom-control-label"></span>
                                                    </label>
                                                </td>
                                                <td>{{$commande->id}}</td>

                                                <td>
                                                    <a href="{{route("clients.show", $commande->client)}}">{{$commande->client->prenom}}
                                                        {{$commande->client->nom}}</a>
                                                </td>
                                                <td>{{$commande->quantite}}</td>
                                                <td>{{$commande->cout_total}} FCFA
                                                    @if($commande->paiement->restant > 0)<br>
                                                <small class="text-danger">{{$commande->paiement->restant}} FCFA restant</small>@endif</td>
                                                <td>
                                                    @if($commande->paiement->etat == 0)
                                                    <button type="button" class="btn btn-xs btn-danger"
                                                        data-toggle="modal" data-target="#paiementCommande"
                                                        onclick="paiement_commande('{{$commande->id}}')">Non
                                                        reçu</button>
                                                    @elseif($commande->paiement->etat == 1)
                                                    <button type="button" class="btn btn-xs btn-warning"
                                                        data-toggle="modal" data-target="#paiementCommande"
                                                        onclick="paiement_commande('{{$commande->id}}')">partiellement
                                                        payée</button>
                                                    @else
                                                    <button class="btn btn-xs btn-success disabled">Entièrement
                                                        payée</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($commande->livraison->etat == 0)

                                                    <button type="button"
                                                        onclick="document.querySelector('#modifierLivraison #livraison').value='{{$commande->livraison_id}}'; document.querySelector('#modifierLivraison').submit()"
                                                        class="btn btn-xs btn-info">En
                                                        cours</button>
                                                    @else
                                                    <button class="btn btn-xs btn-success disabled">Livrée</button>
                                                    @endif
                                                </td>
                                                <td>{{$commande->date}}</td>
                                                <td>
                                                    <a href="{{route("commandes.edit", $commande)}}"
                                                        class="btn btn-brand btn-xs"><i class="fas fa-pencil-alt"></i></a>
                                                    <button onclick="deleteElt('{{$commande->id}}')"
                                                        class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    <label class="custom-control custom-checkbox be-select-all">
                                                        <input class="custom-control-input chk_all" type="checkbox"
                                                            name="chk_all"><span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th>ID</th>
                                                <th>Client</th>
                                                <th>Quantité</th>
                                                <th>Total</th>
                                                <th>Etat paiement</th>
                                                <th>Etat livraison</th>
                                                <th>Date</th>
                                                <th>Options</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade" id="aliments-simple" role="tabpanel" aria-labelledby="aliments-tab-simple">
                    <form method="POST" id="pertesForm" action="{{route("pertes.multipleDestroy")}}">
                        @csrf
                        <input type="hidden" name="vague" value="{{$vague->id}}">
                        <div class="card">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-header">Liste des pertes</h5>
                                <h5 class="card-header">
                                    <a href="#!" data-toggle="modal" data-target="#nouvellePerte"
                                        class="btn btn-primary btn-xs">Nouvelle
                                        perte</a>
                                    <button class="btn btn-danger btn-xs">Supprimer la sélection</button>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first" id="tablePertes">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="custom-control custom-checkbox be-select-all">
                                                        <input class="custom-control-input chk_all" type="checkbox"
                                                            name="chk_all"><span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th>Quantité perdue</th>
                                                <th>Coût Total</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vague->pertes->reverse() as $perte)
                                            <tr>
                                                <td>
                                                    <label class="custom-control custom-checkbox">
                                                        <input class="custom-control-input checkboxes" type="checkbox"
                                                            value="{{$perte->id}}" name="ids[]"
                                                            id="checkpertesForm{{$perte->id}}"><span
                                                            class="custom-control-label"></span>
                                                    </label>
                                                </td>

                                                <td>{{$perte->quantite}}</td>
                                                <td>{{$perte->somme}}</td>
                                                <td>{{$perte->description}}</td>
                                                <td>{{$perte->created_at}}</td>
                                                <td>
                                                    <a href="{{route("pertes.edit", $perte)}}"
                                                        class="btn btn-brand btn-xs">Modifier</a>
                                                <button type="button" onclick="deleteElt('{{$perte->id}}', '#pertesForm')"
                                                        class="btn btn-danger btn-xs">Supprimer</button>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                    <label class="custom-control custom-checkbox be-select-all">
                                                        <input class="custom-control-input chk_all" type="checkbox"
                                                            name="chk_all"><span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <th>Quantité perdue</th>
                                                <th>Coût Total</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Options</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>


    </div>
</div>

<!-- Modal paiement commande -->
<div class="modal fade" id="paiementCommande" tabindex="-1" role="dialog" aria-labelledby="nouvelleCommandeLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route("commandes.paiement")}}" method="POST">
            @csrf
            {{-- @method("PUT") --}}
            {{-- @method("PUT") --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nouvelleCommandeLabel">Nouveau paiement</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="commande" required id="commande">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Somme perçue*</label>
                        <input type="number" required name="total" min="0" value="" id="total" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Note concernant ce paiement</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <small>(*) : Obligatoire</small>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal nouvelle perte -->
<div class="modal fade" id="nouvellePerte" tabindex="-1" role="dialog" aria-labelledby="nouvellePerteLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route("pertes.store")}}" method="POST">
            @csrf
            {{-- @method("PUT") --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nouvellePerteLabel">Création d'un nouvelle perte</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="vague" value="{{$vague->id}}">

                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantité de {{$vague->libelle}} perdu(e)*</label>
                        <input id="inputText3" type="number" required name="quantite" min="0" max="{{$vague->quantite}}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Cout estimé de la perte*</label>
                        <input id="inputText3" type="number" required name="total" min="0" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <small>(*) : Obligatoire</small>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal nouvelle commande -->
<div class="modal fade" id="nouvelleCommande" tabindex="-1" role="dialog" aria-labelledby="nouvelleCommandeLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route("commandes.store")}}" method="POST">
            @csrf
            {{-- @method("PUT") --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nouvelleCommandeLabel">Création d'un nouvelle commande</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    @if(sizeof($clients) == 0)
                    <div class="alert alert-danger text-center">Aucun client n'est encore enregistré. <br>Enregistrez au
                        moins un client avant de pouvoir créer une commande.</div>
                    <a class="btn btn-primary" href="{{route("clients.create")}}">Ajouter un client</a>
                    @else
                    <input type="hidden" name="vague" value="{{$vague->id}}">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Sélectionnez le client</label>
                        <select class="form-control" name="client" id="client">
                            @foreach ($clients as $client)
                            <option id="id{{$client->id}}" value="{{$client->id}}">{{$client->prenom}} {{$client->nom}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantité de {{$vague->libelle}} vendues*</label>
                        <input id="inputText3" type="number" required name="quantite" min="1" max="{{$vague->quantite}}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Prix total de vente au client*</label>
                        <input id="inputText3" type="number" required name="total" min="1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <small>(*) : Obligatoire</small>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route("vagues.store")}}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Création d'un nouvelle vague</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Nom de la vague</label>
                        <input id="inputText3" type="text" name="nom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantité de poulets*</label>
                        <input id="inputText3" type="number" required name="quantite" min="0" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <small>(*) : Obligatoire</small>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                    <button class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section("newcss")
<style>
    .simple-card .icon img {
        filter: grayscale(100%)
    }

    .simple-card .active .icon img {
        filter: grayscale(0%)
    }
</style>
@endsection
@section("newscript")
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset("assets/vendor/datatables/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="{{asset("assets/vendor/datatables/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/vendor/datatables/js/data-table.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script>
    function changeTab(nom){
        localStorage.setItem("approvisionnement_onglet", nom)
    }

    var commandes = [];
    @foreach ($vague->commandes as $commande)
        commandes[{{$commande->id}}] = {
            total : '{{$commande->paiement->restant}}',
        }
    @endforeach

    function paiement_commande(id){
        $("#paiementCommande #commande").val(id)
        $("#paiementCommande #total").val(""+commandes[id].total)
        $("#paiementCommande #total").attr("max",""+commandes[id].total)
    }


    function deleteElt(id, form){
        $(form+ " .checkboxes").prop("checked", false);
        $(form+" #check"+form.replace("#", "")+id).prop("checked", true);
        // console.log(form+" #check"+form.replace("#", "")+id)
        $("form"+form).submit()
    }

    $(document).ready(function() {

        // Ouverture par défaut de la premiere table
        if(localStorage.getItem("approvisionnement_onglet")){
            $("#"+localStorage.getItem("approvisionnement_onglet")+"-tab-simple").click()
        }
        
        var table = $('.table').DataTable({
            fixedHeader: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
            }
        });
        // binding the check all box to onClick event
        $(".chk_all").click(function() {
        
            var checkAll = $(".chk_all").prop('checked');
            if (checkAll) {
                $(".checkboxes").prop("checked", true);
            } else {
                $(".checkboxes").prop("checked", false);
            }
        
        });
        
        // if all checkboxes are selected, then checked the main checkbox class and vise versa
        $(".checkboxes").click(function() {
        
        if ($(".checkboxes").length == $(".subscheked:checked").length) {
            $(".chk_all").attr("checked", "checked");
        } else {
            $(".chk_all").removeAttr("checked");
        }
        
        });
    })
</script>

@endsection