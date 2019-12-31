@extends("layouts.app")


@section("content")
<div class="row">
    <!-- ============================================================== -->
    <!-- profile -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- card profile -->
        <!-- ============================================================== -->
        <div class="card">
            <div class="card-body">
                <div class="user-avatar text-center d-block">
                    {{-- <img src="assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl"> --}}
                </div>
                <div class="text-center">
                    <h2 class="font-24 mb-0">{{ucfirst($client->prenom)}} {{strtoupper($client->nom)}}</h2>
                    <p>Client depuis le {{$client->created_at}}</p>
                </div>
            </div>
            <div class="card-body border-top">
                <h3 class="font-16">Contacts</h3>
                <div class="">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><a href="mailto:{{$client->email}}">{{$client->email}}</a></li>
                        <li class="mb-2"><a href="https://wa.me/{{str_replace(array("(", ")", " ", "-"), array("", "", "", ""), $client->tel)}}"><i class="fab fa-fw fa-whatsapp mr-1 whatsapp-color"></i>https://wa.me/{{str_replace(array("(", ")", " ", "-"), array("", "", "", ""), $client->tel)}}</a></li>
                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i><a href="tel:{{str_replace(array("(", ")", " ", "-"), array("", "", "", ""), $client->tel)}}">{{$client->tel}}</a></li>
                    </ul>
                </div>
            </div>
            {{-- <div class="card-body border-top">
                <h3 class="font-16">Rating</h3>
                <h1 class="mb-0">4.8</h1>
                <div class="rating-star">
                    <i class="fa fa-fw fa-star"></i>
                    <i class="fa fa-fw fa-star"></i>
                    <i class="fa fa-fw fa-star"></i>
                    <i class="fa fa-fw fa-star"></i>
                    <i class="fa fa-fw fa-star"></i>
                    <p class="d-inline-block text-dark">14 Reviews </p>
                </div>
            </div> --}}
            {{-- <div class="card-body border-top">
                <h3 class="font-16">Social Channels</h3>
                <div class="">
                    <ul class="mb-0 list-unstyled">
                        <li class="mb-1"><a href="#"><i
                                    class="fab fa-fw fa-facebook-square mr-1 facebook-color"></i>fb.me/michaelchristy</a>
                        </li>
                        <li class="mb-1"><a href="#"><i
                                    class="fab fa-fw fa-twitter-square mr-1 twitter-color"></i>twitter.com/michaelchristy</a>
                        </li>
                        <li class="mb-1"><a href="#"><i
                                    class="fab fa-fw fa-instagram mr-1 instagram-color"></i>instagram.com/michaelchristy</a>
                        </li>
                        <li class="mb-1"><a href="#"><i
                                    class="fas fa-fw fa-rss-square mr-1 rss-color"></i>michaelchristy.com/blog</a></li>
                        <li class="mb-1"><a href="#"><i
                                    class="fab fa-fw fa-pinterest-square mr-1 pinterest-color"></i>pinterest.com/michaelchristy</a>
                        </li>
                        <li class="mb-1"><a href="#"><i
                                    class="fab fa-fw fa-youtube mr-1 youtube-color"></i>youtube/michaelchristy</a></li>
                    </ul>
                </div>
            </div> --}}<div class="card-body border-top">
                <h3 class="font-16">Adresse</h3>
                <div>
                    <p>{{$client->adresse}}</p>
                </div>
            </div>
            <div class="card-body border-top">
                <h3 class="font-16">Description</h3>
                <div>
                    <p>{{$client->description}}</p>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end card profile -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end profile -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- campaign data -->
    <!-- ============================================================== -->
    <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
        <!-- ============================================================== -->
        <!-- campaign tab one -->
        <!-- ============================================================== -->
        <div class="influence-profile-content pills-regular">
            <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign"
                        role="tab" aria-controls="pills-campaign" aria-selected="true">Commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab"
                        aria-controls="pills-review" aria-selected="false">Avis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab"
                        aria-controls="pills-msg" aria-selected="false">Envoyer un message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab"
                        aria-controls="pills-packages" aria-selected="false">Paramètres</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-campaign" role="tabpanel"
                    aria-labelledby="pills-campaign-tab">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">9</h1>
                                    <p>Campaign Invitations</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">35</h1>
                                    <p>Finished Campaigns</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">8</h1>
                                    <p>Accepted Campaigns</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="mb-1">1</h1>
                                    <p>Declined Campaigns</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block">
                                <h3 class="section-title">Commandes</h3>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card">
                                {{-- <div class="d-flex justify-content-between">
                                    <h5 class="card-header">
                                        <a href="#!" data-toggle="modal" data-target="#nouvelleCommande"
                                            class="btn btn-primary btn-xs">Nouvelle
                                            commande</a>
                                        <button class="btn btn-danger btn-xs">Supprimer la sélection</button>
                                    </h5>
                                </div> --}}
                                <div class="card-body">
                                    <form method="POST" id="commandesForm"
                                        action="{{route("commandes.multipleDestroy")}}">
                                        @csrf
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered first" id="tableCommandes">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <label class="custom-control custom-checkbox be-select-all">
                                                                <input class="custom-control-input chk_all"
                                                                    type="checkbox" name="chk_all"><span
                                                                    class="custom-control-label"></span>
                                                            </label>
                                                        </th>
                                                        <th>ID</th>
                                                        <th>Vague</th>
                                                        <th>Quantité</th>
                                                        <th>Total</th>
                                                        <th>Etat paiement</th>
                                                        <th>Etat livraison</th>
                                                        <th>Date</th>
                                                        {{-- <th>Options</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($client->commandes->reverse() as $commande)
                                                    <tr>
                                                        <td>
                                                            <label class="custom-control custom-checkbox">
                                                                <input class="custom-control-input checkboxes"
                                                                    type="checkbox" value="{{$commande->id}}"
                                                                    name="ids[]" id="check{{$commande->id}}"><span
                                                                    class="custom-control-label"></span>
                                                            </label>
                                                        </td>
                                                        <td>{{$commande->id}}</td>
                                                    <td><a href="{{route("vagues.show", $commande->vague)}}">
                                                            {{$commande->vague->nom}}
                                                    </a>
                                                        </td>

                                                        <td>{{$commande->quantite}}</td>
                                                        <td>{{$commande->cout_total}} FCFA
                                                            @if($commande->paiement->restant > 0)<br>
                                                            <small class="text-danger">{{$commande->paiement->restant}}
                                                                FCFA restant</small>@endif
                                                        </td>
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
                                                            <button
                                                                class="btn btn-xs btn-success disabled">Livrée</button>
                                                            @endif
                                                        </td>
                                                        <td>{{$commande->date}}</td>
                                                        {{-- <td>
                                                            <a href="{{route("commandes.edit", $commande)}}"
                                                                class="btn btn-brand btn-xs"><i
                                                                    class="fas fa-pencil-alt"></i></a>
                                                            <button onclick="deleteElt('{{$commande->id}}')"
                                                                class="btn btn-danger btn-xs"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </td> --}}
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>
                                                            <label class="custom-control custom-checkbox be-select-all">
                                                                <input class="custom-control-input chk_all"
                                                                    type="checkbox" name="chk_all"><span
                                                                    class="custom-control-label"></span>
                                                            </label>
                                                        </th>
                                                        <th>ID</th>
                                                        <th>Vague</th>
                                                        <th>Quantité</th>
                                                        <th>Total</th>
                                                        <th>Etat paiement</th>
                                                        <th>Etat livraison</th>
                                                        <th>Date</th>
                                                        {{-- <th>Options</th> --}}
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="section-block">
                        <h3 class="section-title">Campaign List</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="media influencer-profile-data d-flex align-items-center p-2">
                                        <div class="mr-4">
                                            <img src="assets/images/slack.png" alt="User Avatar" class="user-avatar-lg">
                                        </div>
                                        <div class="media-body ">
                                            <div class="influencer-profile-data">
                                                <h3 class="m-b-10">Your Campaign Title Here</h3>
                                                <p>
                                                    <span class="m-r-20 d-inline-block">Draft Due Date
                                                        <span class="m-l-10 text-primary">24 Jan 2018</span>
                                                    </span>
                                                    <span class="m-r-20 d-inline-block"> Publish Date
                                                        <span class="m-l-10 text-secondary">30 Feb 2018</span>
                                                    </span>
                                                    <span class="m-r-20 d-inline-block">Ends <span
                                                            class="m-l-10  text-info">30 May, 2018</span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top card-footer p-0">
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">45k</h4>
                                <p>Total Reach</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">29k</h4>
                                <p>Total Views</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">5k</h4>
                                <p>Total Click</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">4k</h4>
                                <p>Engagement</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">2k</h4>
                                <p>Conversion</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="media influencer-profile-data d-flex align-items-center p-2">
                                        <div class="mr-4">
                                            <img src="assets/images/dribbble.png" alt="User Avatar"
                                                class="rounded-circle user-avatar-lg">
                                        </div>
                                        <div class="media-body">
                                            <h3 class="m-b-10">Your Campaign Title Here</h3>
                                            <p><span class="m-r-20 d-inline-block">Draft Due Date<span
                                                        class="m-l-10 d-inline-block text-primary">28 Jan
                                                        2018</span></span><span class="m-r-20 d-inline-block"> Publish
                                                    Date<span class="m-l-10 text-secondary">20 March
                                                        2018</span></span><span class="m-r-20">Ends<span
                                                        class="m-l-10 text-info">10 July, 2018</span></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top card-footer p-0">
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0 ">35k</h4>
                                <p>Total Reach</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0 ">45k</h4>
                                <p>Total Views</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">8k</h4>
                                <p>Total Click</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0 ">10k</h4>
                                <p>Engagement</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">3k</h4>
                                <p>Conversion</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="media influencer-profile-data d-flex align-items-center p-2">
                                        <div class="mr-4">
                                            <img src="assets/images/dropbox.png" alt="User Avatar"
                                                class="user-avatar-lg">
                                        </div>
                                        <div class="media-body">
                                            <h3 class="m-b-10">Your Campaign Title Here</h3>
                                            <p><span class="m-r-20 d-inline-block">Draft Due Date
                                                    <span class="m-l-10 text-primary">05 Feb 2018</span></span>
                                                <span class="m-r-20 d-inline-block"> Publish Date
                                                    <span class="m-l-10 text-secondary">14 May 2018</span></span><span
                                                    class="m-r-20 d-inline-block">Ends<span class="m-l-10 text-info">16
                                                        Aug, 2018</span></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-top card-footer p-0">
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">40k</h4>
                                <p>Total Reach</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0 ">35k</h4>
                                <p>Total Views</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">5k</h4>
                                <p>Total Click</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">15k</h4>
                                <p>Engagement</p>
                            </div>
                            <div class="campaign-metrics d-xl-inline-block">
                                <h4 class="mb-0">14k</h4>
                                <p>Conversion</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="section-block">
                                <h2 class="section-title">My Packages</h2>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header bg-primary text-center p-3 ">
                                    <h4 class="mb-0 text-white"> Basic</h4>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1">$150</h1>
                                    <p>Per Month Plateform</p>
                                </div>
                                <div class="card-body border-top">
                                    <ul class="list-unstyled bullet-check font-14">
                                        <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                        <li>Guaranteed follower growth for increas brand awareness.</li>
                                        <li>Daily updates on choose platforms</li>
                                        <li>Stronger customer service through daily interaction</li>
                                        <li>Monthly progress report</li>
                                        <li>1 Million Followers</li>
                                    </ul>
                                    <a href="#" class="btn btn-outline-secondary btn-block btn-lg">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header bg-info text-center p-3">
                                    <h4 class="mb-0 text-white"> Standard</h4>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1">$350</h1>
                                    <p>Per Month Plateform</p>
                                </div>
                                <div class="card-body border-top">
                                    <ul class="list-unstyled bullet-check font-14">
                                        <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                        <li>Guaranteed follower growth for increas brand awareness.</li>
                                        <li>Daily updates on choose platforms</li>
                                        <li>Stronger customer service through daily interaction</li>
                                        <li>Monthly progress report</li>
                                        <li>2 Blog Post & 3 Social Post</li>
                                        <li>5 Millions Followers</li>
                                        <li>Growth Result</li>
                                    </ul>
                                    <a href="#" class="btn btn-secondary btn-block btn-lg">Get Started</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header bg-primary text-center p-3">
                                    <h4 class="mb-0 text-white">Premium</h4>
                                </div>
                                <div class="card-body text-center">
                                    <h1 class="mb-1">$550</h1>
                                    <p>Per Month Plateform</p>
                                </div>
                                <div class="card-body border-top">
                                    <ul class="list-unstyled bullet-check font-14">
                                        <li>Facebook, Instagram, Pinterest,Snapchat.</li>
                                        <li>Guaranteed follower growth for increas brand awareness.</li>
                                        <li>Daily updates on choose platforms</li>
                                        <li>Stronger customer service through daily interaction</li>
                                        <li>Monthly progress report & Growth Result</li>
                                        <li>4 Blog Post & 6 Social Post</li>
                                    </ul>
                                    <a href="#" class="btn btn-secondary btn-block btn-lg">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                    <div class="card">
                        <h5 class="card-header">Campaign Reviews</h5>
                        <div class="card-body">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“Quisque lobortis vestibulum elit, vel fermentum
                                    elit pretium et. Nullam id ultrices odio. Cras id nulla mollis, molestie diam eu,
                                    facilisis tortor. Mauris ultrices lectus laoreet commodo hendrerit. Nullam varius
                                    arcu sed aliquam imperdiet. Etiam ut luctus augue.”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold">Tabitha C. Campbell</span><small
                                    class="text-mute">
                                    (Company name)</small>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“Maecenas rutrum viverra augue. Nulla in eros
                                    vitae ante ullamcorper congue. Praesent tristique massa ac arcu dapibus tincidunt.
                                    Mauris arcu mi, lacinia et ipsum vel, sollicitudin laoreet risus.”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold">Luise M. Michet</span><small class="text-mute">
                                    (Company name)</small>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“ Cras non rutrum neque. Sed lacinia ex elit, vel
                                    viverra nisl faucibus eu. Aenean faucibus neque vestibulum condimentum maximus. In
                                    id porttitor nisi. Quisque sit amet commodo arcu, cursus pharetra elit. Nam
                                    tincidunt lobortis augueat euismod ante sodales non. ”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold">Gloria S. Castillo</span><small
                                    class="text-mute">
                                    (Company name)</small>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“Vestibulum cursus felis vel arcu convallis,
                                    viverra commodo felis bibendum. Orci varius natoque penatibus et magnis dis
                                    parturient montes, nascetur ridiculus mus. Proin non auctor est, sed lacinia velit.
                                    Orci varius natoque penatibus et magnis dis parturient montes nascetur ridiculus
                                    mus.”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold">Virgina G. Lightfoot</span><small
                                    class="text-mute">
                                    (Company name)</small>
                            </div>
                        </div>
                        <div class="card-body border-top">
                            <div class="review-block">
                                <p class="review-text font-italic m-0">“Integer pretium laoreet mi ultrices tincidunt.
                                    Suspendisse eget risus nec sapien malesuada ullamcorper eu ac sapien. Maecenas nulla
                                    orci, varius ac tincidunt non, ornare a sem. Aliquam sed massa volutpat, aliquet
                                    nibh sit amet, tincidunt ex. Donec interdum pharetra dignissim.”</p>
                                <div class="rating-star mb-4">
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                    <i class="fa fa-fw fa-star"></i>
                                </div>
                                <span class="text-dark font-weight-bold">Ruby B. Matheny</span><small class="text-mute">
                                    (Company name)</small>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link " href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
                    <div class="card">
                        <h5 class="card-header">Send Messages</h5>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div
                                        class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">
                                        <div class="form-group">
                                            <label for="name">Your Name</label>
                                            <input type="text" class="form-control form-control-lg" id="name"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email</label>
                                            <input type="email" class="form-control form-control-lg" id="email"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control form-control-lg" id="subject"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="messages">Messgaes</label>
                                            <textarea class="form-control" id="messages" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end campaign tab one -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end campaign data -->
    <!-- ============================================================== -->
</div>
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

    function deleteElt(id){
        $(".checkboxes").prop("checked", false);
        $("#check"+id).prop("checked", true);
        $("form").submit()
    }

    $(document).ready(function() {

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