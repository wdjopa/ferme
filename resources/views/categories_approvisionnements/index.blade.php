@extends("layouts.parametres")

@section("subcontent")
<div class="ecommerce-widget">
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <form method="POST" action="{{route("categories_approvisionnements.multipleDestroy")}}">
                @csrf
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header">Liste des catégories</h5>
                        <h5 class="card-header">
                            <a href="#!"
                                data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-xs">Ajouter une catégorie</a>
                            <button class="btn btn-danger btn-xs">Supprimer la sélection</button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first" id="table">
                                <thead>
                                    <tr>
                                        <th>
                                           <label class="custom-control custom-checkbox be-select-all">
                                                <input class="custom-control-input chk_all" type="checkbox" name="chk_all"><span
                                                    class="custom-control-label"></span>
                                            </label>
                                        </th>
                                        <th>Libellé</th>
                                        <th>Description</th>
                                        <th>Créé le</th><th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories_approvisionnements as $categories_approvisionnement)
                                    <tr>
                                        <td>
                                            <label class="custom-control custom-checkbox">
                                                <input class="custom-control-input checkboxes" type="checkbox"
                                                    value="{{$categories_approvisionnement->id}}" name="ids[]"
                                                    id="check{{$categories_approvisionnement->id}}"><span
                                                    class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td>{{$categories_approvisionnement->libelle}}</td>
                                        <td>{{$categories_approvisionnement->description}}</td>
                                        <td>{{$categories_approvisionnement->created_by}}</td>
                                        <td>
                                            <a href="{{route("categories_approvisionnements.edit", $categories_approvisionnement)}}"
                                                class="btn btn-brand btn-xs">Modifier</a>
                                            <button onclick="deleteElt('{{$categories_approvisionnement->id}}')"
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
                                        <th>Libellé</th>
                                        <th>Description</th>
                                        <th>Créé le</th><th>Options</th>
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

<!-- ============================================================== -->
<!-- end basic table  -->
<!-- ============================================================== -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route("categories_approvisionnements.store")}}" method="POST">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Création d'un nouvelle catégorie</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Libellé de la catégorie</label>
                        <input id="inputText3" type="text" name="libelle" class="form-control">
                    </div>
                    {{-- <div class="form-group">
                        <label for="inputText3" class="col-form-label">Quantité de poulets*</label>
                        <input id="inputText3" type="number" required name="quantite" min="0" class="form-control">
                    </div> --}}
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

<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/datatables/css/dataTables.bootstrap4.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/datatables/css/buttons.bootstrap4.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/datatables/css/select.bootstrap4.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("assets/vendor/datatables/css/fixedHeader.bootstrap4.css")}}">

@endsection

@section("newscript")

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset("assets/vendor/datatables/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="{{asset("assets/vendor/datatables/js/buttons.bootstrap4.min.js")}}"></script>
<script>
    function deleteElt(id){
        $(".checkboxes").prop("checked", false);
        $("#check"+id).prop("checked", true);
        $("form").submit()
    }

    $(document).ready(function() {
            var table = $('#table').DataTable({
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
@endsection