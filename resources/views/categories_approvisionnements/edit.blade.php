@extends("layouts.parametres")

@section("subcontent")
<div class="ecommerce-widget">
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{route("categories_approvisionnements.update", $categories_approvisionnement)}}"
                            method="POST">
                            @csrf
                            @method("PUT")

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mise à jour d'une catégorie</h5>

                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Libellé de la catégorie</label>
                                        <input id="inputText3" type="text" name="libelle"
                                            value="{{$categories_approvisionnement->libelle}}" class="form-control">
                                    </div>
                                    {{-- <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Quantité de poulets*</label>
                                                <input id="inputText3" type="number" required name="quantite" min="0" class="form-control">
                                            </div> --}}
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" name="description"
                                            id="exampleFormControlTextarea1"
                                            rows="3">{{$categories_approvisionnement->description}}</textarea>
                                    </div>
                                    <small>(*) : Obligatoire</small>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Annuler</a>
                                    <button class="btn btn-primary">Modifier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- end basic table  -->
<!-- ============================================================== -->


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