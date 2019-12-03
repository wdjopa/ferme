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
                        <li class="breadcrumb-item active" aria-current="page">Vagues en cours</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="ecommerce-widget">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card" data-toggle="modal" data-target="#exampleModal">
                <h5 class="card-header bg-primary ">Créer une nouvelle vague</h5>
                <div class="card-body bg-light">
                    <div id="sparkline-3">
                        <div class="p-t-60 p-b-60"
                            style="border: 3px dashed; font-weight: 100; font-size: 3rem; display: flex; justify-content: center; align-items: center; vertical-align: top;">
                            +</div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($vagues as $vague)
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Vague {{$vague->nom}}</h5>
                <div class="card-body">
                    <div class="metric-value d-inline-block">
                        <h3 class="mb-1">{{ $vague->quantite }} <small>Poulet(s)</small></h3>
                    </div>
                    {{-- <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i
                                class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">25%</span>
                    </div> --}}
                    
                </div>
                <div class="card-body bg-light ">
                    <div id="sparkline-3" style="height: 80px; overflow: auto;">{{$vague->description}}
                    </div>
                </div>
                <div class="card-footer text-center bg-white">
                    <a href="{{route("vagues.show", $vague)}}" class="card-link">Afficher</a>
                </div>
            </div>
        </div>
        @endforeach
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

@endsection

@section("newscript")
<!-- sparkline js -->
<script src="{{asset("assets/vendor/charts/sparkline/jquery.sparkline.js")}}"></script>
<script src="{{asset("assets/vendor/charts/sparkline/spark-js.js")}}"></script>
<script src="{{asset("assets/libs/js/main-js.js")}}"></script>
<script>
    // $("#sparkline-revenue3").sparkline([5, 3, 4, 6, 5, 7, 9, 4, 3, 5, 6, 1], {
    //     type: 'line',
    //     width: '99.5%',
    //     height: '100',
    //     lineColor: '#25d5f2',
    //     fillColor: '#dffaff',
    //     lineWidth: 2,
    //     spotColor: undefined,
    //     minSpotColor: undefined,
    //     maxSpotColor: undefined,
    //     highlightSpotColor: undefined,
    //     highlightLineColor: undefined,
    //     resize:true
    // });
</script>

@endsection