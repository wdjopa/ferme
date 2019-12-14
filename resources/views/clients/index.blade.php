@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Clients </h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}" class="breadcrumb-link">Ferme</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Liste des clients</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="ecommerce-widget">
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <form method="POST" action="{{route("clients.multipleDestroy")}}">
                @csrf
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header">Liste des clients</h5>
                        <h5 class="card-header">
                            <a href="{{route("clients.create")}}" class="btn btn-primary btn-xs">Ajouter un
                                client</a>
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
                                                <input class="custom-control-input chk_all" type="checkbox"
                                                    name="chk_all"><span class="custom-control-label"></span>
                                            </label>
                                        </th>
                                        <th>Noms</th>
                                        <th>Adresse</th>
                                        <th>Tél</th>
                                        <th>Email</th>
                                        <th>Description</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                    <tr>
                                        <td>
                                            <label class="custom-control custom-checkbox">
                                                <input class="custom-control-input checkboxes" type="checkbox"
                                                    value="{{$client->id}}" name="ids[]"
                                                    id="check{{$client->id}}"><span
                                                    class="custom-control-label"></span>
                                            </label>
                                        </td>
                                        <td>{{$client->prenom}} {{$client->nom}}</td>
                                        <td>{{$client->localisation}}</td>
                                        <td>{{$client->tel}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->description}}</td>
                                        <td>
                                            <a href="{{route("clients.edit", $client)}}"
                                                class="btn btn-brand btn-xs">Modifier</a>
                                            <button onclick="deleteElt('{{$client->id}}')"
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
                                        <th>Noms</th>
                                        <th>Adresse</th>
                                        <th>Tél</th>
                                        <th>Email</th>
                                        <th>Description</th>
                                        <th>Options</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
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