@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Comptabilites </h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}" class="breadcrumb-link">Ferme</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Comptabilites</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-12 mt-2 col-sm-12">

        <div class="simple-card">

            <div class="tab-pane fade show">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-header">Liste des entrées</h5>
                            <h5 class="card-header">
                                <a href="#!" data-toggle="modal" data-target="#exampleModal"
                                    class="btn btn-primary btn-xs"
                                    onclick="add_approvisionnement('id{{$categorie->id}}')">Ajouter </a>
                                <button class="btn btn-danger btn-xs">Supprimer la sélection</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered first">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label class="custom-control custom-checkbox be-select-all">
                                                    <input class="custom-control-input chk_all" type="checkbox"
                                                        name="chk_all"><span class="custom-control-label"></span>
                                                </label>
                                            </th>
                                            <th>Etat</th>
                                            <th>Quantité</th>
                                            <th>Prix total</th>
                                            <th>Date</th>
                                            <th>Fournisseur</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($approvisionnements as $app)
                                        @if($app->categorie_approvisionnement_id == $categorie->id)
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-checkbox">
                                                    <input class="custom-control-input checkboxes" type="checkbox"
                                                        value="{{$app->id}}" name="ids[]" id="check{{$app->id}}"><span
                                                        class="custom-control-label"></span>
                                                </label>
                                            </td>
                                            <td>
                                                @if($app->vague)
                                                <a href="{{route("vagues.show", $app->vague)}}"
                                                    class="btn btn-primary btn-xs"><i
                                                        class="fas fa-external-link-alt"></i> Consulter la
                                                    vague</a>
                                                @else
                                                <a href="#" class="btn btn-success btn-xs"> Disponible</a>

                                                @endif
                                            </td>
                                            <td>{{$app->quantite}}</td>
                                            <td>{{$app->prix_total}}</td>
                                            <td>{{$app->date_approvisionnement}}</td>
                                            <td>
                                                <a
                                                    href="{{route("fournisseurs.show", App\Fournisseur::find($app->fournisseur_id))}}">
                                                    {{App\Fournisseur::find($app->fournisseur_id)->nom}}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{route("approvisionnements.edit", $app)}}"
                                                    class="btn btn-brand btn-xs">Modifier</a>
                                                <button onclick="deleteElt('{{$app->id}}')"
                                                    class="btn btn-danger btn-xs">Supprimer</button>
                                            </td>
                                        </tr>
                                        @endif
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
                                            <th>Etat</th>
                                            <th>Quantité</th>
                                            <th>Prix total</th>
                                            <th>Date</th>
                                            <th>Fournisseur</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
{{-- <div class="ecommerce-widget">
    <div class="row">
    </div>
</div> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route("approvisionnements.store")}}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Création d'un nouvelle approvisionnement</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    @csrf<div class="form-group">
                        <label for="inputText3" class="col-form-label">Catégorie de l'approvisionnement</label>
                        <select class="form-control" name="categorie" id="categorie_select">
                            @foreach ($categories_approvisionnements as $cat)
                            <option id="id{{$cat->id}}" value="{{$cat->id}}">{{$cat->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Fournisseur de l'approvisionnement</label>
                        <select class="form-control" name="fournisseur" id="">
                            @foreach ($fournisseurs as $fournisseur)
                            <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantité*</label>
                        <input id="inputText3" type="number" required name="quantite" min="0" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Prix Total (en FCFA)*</label>
                        <input id="inputText3" type="number" required name="prix_total" min="0" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Date et heure de réception*</label>
                        <input id="inputText3" type="datetime-local" required name="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description de l'approvisionnement reçu</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                            rows="5"></textarea>
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
<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/datatables/css/dataTables.bootstrap4.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/datatables/css/buttons.bootstrap4.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/datatables/css/select.bootstrap4.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/datatables/css/fixedHeader.bootstrap4.css")}}">
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


    function deleteElt(id){
        $(".checkboxes").prop("checked", false);
        $("#check"+id).prop("checked", true);
        $("form").submit()
    }

    function add_approvisionnement(id){
        // $("#categorie_select option").attr("disabled")
        // $("#categorie_select option").addClass("disabled")
        // $("#categorie_select #"+id).removeClass("disabled")
        // $("#categorie_select #"+id).removeAttr("disabled")
        $("#"+id).attr("selected", "selected")
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