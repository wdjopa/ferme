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

    <div class="col-md-3 mt-2 col-sm-12 aside-content">
        {{-- <div class="aside-header">
            <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse" type="button"><span
                    class="icon"><i class="fas fa-caret-down"></i></span></button><span class="title">Mail
                Service</span>
            <p class="description">Service description</p>
        </div> --}}
        <div class="aside-nav bg-white">
            <ul class="nav">
                <li class="@if($page == trim("approvisionnement")) active @endif"><a
                        href="{{route("vagues.approvisionnement", $vague)}}"><span class="icon"><i
                                class="fas fa-fw fa-inbox"></i></span>Approvisionnement</a></li>
                {{-- <li><a href="#"><span class="icon"><i class="fas fa-fw fa-inbox"></i></span>Approvisionnement<span
                            class="badge badge-primary float-right">8</span></a></li> --}}
                <li class="@if($page == trim("comptabilite")) active @endif"><a
                        href="{{route("vagues.comptabilite", $vague)}}"><span class="icon"><i
                                class="fas fa-fw  fa-donate"></i></span>Comptabilité</a></li>
            </ul>

        </div>
    </div>
    <div class="col-md-9 mt-2 col-sm-12">
        @if($page == "approvisionnement")
        
        <div class="simple-card">
            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border-left-0" id="poulet-tab-simple" data-toggle="tab" href="#poulet-simple"
                role="tab" aria-controls="poulet" aria-selected="true"><span class="icon"><img src="{{asset("images/chick.png")}}" width="18" class="mr-2" alt="" /></span> Poulets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="aliments-tab-simple" data-toggle="tab" href="#aliments-simple" role="tab"
                        aria-controls="aliments" aria-selected="false"><span class="icon"><img src="{{asset("images/rice.png")}}" width="18" class="mr-2"  alt="" /></span>Aliments</a>
                </li><li class="nav-item">
                    <a class="nav-link" id="vaccins-tab-simple" data-toggle="tab" href="#vaccins-simple" role="tab"
                        aria-controls="vaccins" aria-selected="false"><span class="icon"><img src="{{asset("images/vaccin.png")}}" width="18" class="mr-2" alt="" /></span>Vaccins</a>
                </li><li class="nav-item">
                    <a class="nav-link" id="materiel-tab-simple" data-toggle="tab" href="#materiel-simple" role="tab"
                        aria-controls="materiel" aria-selected="false"><span class="icon"><img src="{{asset("images/materiel.png")}}" width="18" class="mr-2" style="" alt="" /></span>Materiel</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent5">
                <div class="tab-pane fade show active" id="poulet-simple" role="tabpanel"
                    aria-labelledby="poulet-tab-simple">
                   
                    
                </div>
                <div class="tab-pane fade" id="aliments-simple" role="tabpanel" aria-labelledby="aliments-tab-simple">
                    
                    
                </div>
                <div class="tab-pane fade" id="vaccins-simple" role="tabpanel" aria-labelledby="vaccins-tab-simple">
                
                </div>
                <div class="tab-pane fade" id="materiel-simple" role="tabpanel" aria-labelledby="materiel-tab-simple">
                
                </div>
            </div>
        </div>
        
        @elseif($page == "comptabilite")
        
        <div class="simple-card">
            <ul class="nav nav-tabs" id="myTab5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active border-left-0" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                        role="tab" aria-controls="home" aria-selected="true">Tab#1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                        aria-controls="profile" aria-selected="false">Tab#2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab-simple" data-toggle="tab" href="#contact-simple" role="tab"
                        aria-controls="contact" aria-selected="false">Tab#3</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent5">
                <div class="tab-pane fade show active" id="home-simple" role="tabpanel"
                    aria-labelledby="home-tab-simple">
                    <p class="lead"> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                        necessary, making this the first true generator on the Internet. </p>
                    <p>Phasellus non ante gravida, ultricies neque a, fermentum leo. Etiam ornare enim arcu, at
                        venenatis odio
                        mollis quis. Mauris fermentum elementum ligula in efficitur. Aliquam id congue lorem. Proin
                        consectetur
                        feugiasse platea dictumst. Pellentesque sed justo aliquet, posuere sem nec, elementum ante.</p>
                    <a href="#" class="btn btn-secondary">Go somewhere</a>
                </div>
                <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                    <p>Nullam et tellus ac ligula condimentum sodales. Aenean tincidunt viverra suscipit. Maecenas id
                        molestie
                        est, a commodo nisi. Quisque fringilla turpis nec elit eleifend vestibulum. Aliquam sed purus in
                        odio
                        ullamcorper congue consectetur in neque. Aenean sem ex, tempor et auctor sed, congue id neque.
                    </p>
                </div>
                <div class="tab-pane fade" id="contact-simple" role="tabpanel" aria-labelledby="contact-tab-simple">
                    <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu. Fusce lobortis,
                        libero ac
                        cursus feugiat, nibh ex ultricies tortor, id dictum massa nisl ac nisi. Fusce a eros
                        pellentesque,
                        ultricies urna nec, consectetur dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.
                    </p>
                </div>
            </div>
        </div>
        @endif
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
    .simple-card .icon img{
    filter: grayscale(100%)
    }
    .simple-card .active .icon img{
    filter: grayscale(0%)
    }
    </style>
@endsection

@section("newscript")


@endsection