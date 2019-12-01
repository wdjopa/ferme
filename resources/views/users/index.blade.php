@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Gestion des utilisateurs </h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}"
                                class="breadcrumb-link">Administrateur</a></li>
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Gestion du personnel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gestion des employés</li>
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
            <div class="card">
                <div class="d-flex justify-content-between">
                    <h5 class="card-header">Liste des employés</h5>
                    <h5 class="card-header">
                        <a href="{{route("users.create")}}" class="btn btn-primary btn-xs">Ajouter un employé</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first" id="table">
                            <thead>
                                <tr>
                                    <th>Noms & Prénoms</th>
                                    <th>Poste</th>
                                    <th>Tél</th>
                                    <th>Email</th>
                                    <th>Sexe</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->titre}}</td>
                                        <td>{{$user->tel}}</td>
                                        <td> <a href="mailto:{{$user->email}}">{{$user->email}}</a> </td>
                                        <td>{{$user->sexe}}</td>
                                        <td>
                                            <a href="#" class="btn btn-brand btn-xs">Modifier</a>
                                            <a href="#" class="btn btn-danger btn-xs">Supprimer</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Noms & Prénoms</th>
                                    <th>Poste</th>
                                    <th>Tél</th>
                                    <th>Email</th>
                                    <th>Sexe</th>
                                    <th>Options</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
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
    $(document).ready(function() {
            var table = $('#table').DataTable({
                fixedHeader: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
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