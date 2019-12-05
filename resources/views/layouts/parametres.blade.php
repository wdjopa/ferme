@extends("layouts.app")

@section("content")

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">Paramètres </h2>
            <p class="pageheader-text"></p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("home")}}" class="breadcrumb-link">Administrateur</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Paramètres</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-3 mt-2 col-sm-12 aside-content">
        {{-- <div class="aside-header">
            <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span
                    class="icon"><i class="fas fa-caret-down"></i></span></button><span class="title">Mail
                Service</span>
            <p class="description">Service description</p>
        </div> --}}
        <div class="aside-nav bg-white">
            <ul class="nav">
                <li class="@if(Request::segment(1)=='users' && Request::segment(2) == Auth::id()) active @endif"><a
                        href="{{route("users.show", Auth::user())}}"><span class="icon"><i
                                class="fas fa-fw fa-user"></i></span>Mon compte</a></li>
                {{-- <li><a href="#"><span class="icon"><i class="fas fa-fw fa-inbox"></i></span>Approvisionnement<span
                            class="badge badge-primary float-right">8</span></a></li> --}}
                <li class="@if(Request::segment(1)=='categories_approvisionnements') active @endif"><a
                        href="{{route("categories_approvisionnements.index")}}"><span class="icon"><i
                                class="fas fa-fw  fa-tag"></i></span>Catégories d'Approvisionnement</a></li>
            </ul>

        </div>
    </div>
    <div class="col-md-9 mt-2 col-sm-12">
           @yield('subcontent')
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


@endsection