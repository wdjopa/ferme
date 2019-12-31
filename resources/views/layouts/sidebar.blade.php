<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="{{route("home")}}">Gestionnaire</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @if(Request::segment(1)==='home' || strlen(Request::segment(1))===0) {{ 'active' }} @endif"
                            href="{{route("home")}}"><i class="fa fa-fw fa-home"></i>Accueil
                            <!--<span class="badge badge-success">6</span>--></a>
                        {{-- <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                                    <div id="submenu-1-2" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.html">E Commerce Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product.html">Product List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product-single.html">Product Single</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product-checkout.html">Product Checkout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard-finance.html">Finance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard-sales.html">Sales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>
                                    <div id="submenu-1-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="dashboard-influencer.html">Influencer</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="influencer-finder.html">Influencer Finder</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="influencer-profile.html">Influencer Profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                    </li>
                    <li class="nav-divider">
                        FERME
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == " fournisseurs") active @endif"
                            href="{{route("fournisseurs.index")}}"><i
                                class="fa fa-fw fa-hands-helping"></i>Fournisseurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == " clients") active @endif"
                            href="{{route("clients.index")}}"><i class="fa fa-fw fa-user-plus"></i>Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1) == " approvisionnements") active @endif"
                            href="{{route("approvisionnements.index")}}"><i
                                class="fa fa-fw fa-inbox"></i>Approvisionnement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1)==='comptabilites') {{ 'active' }} @endif"
                            href="{{route("comptabilites.index")}}"><i class="fa fa-fw fa-donate"></i>
                            Comptabilité</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @if(Request::segment(1)==='vagues') {{ 'active' }} @endif"
                            href="{{route("users.index")}}" data-toggle="collapse"
                            aria-expanded="@if(Request::segment(1)==='vagues') {{ 'true' }} @else {{'false'}} @endif"
                            data-target="#submenu-1" aria-controls="submenu-1"><i
                                class="fa fa-fw fa-box-open"></i>Gestion de la production
                            <!--<span class="badge badge-success">6</span>--></a>
                        <div id="submenu-1"
                            class="@if(Request::segment(1)==='vagues' ) {{ 'collapsed' }} @else {{'collapse'}} @endif submenu"
                            style="">
                            <ul class="nav flex-column">
                                {{-- <li class="nav-item">
                                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                                                        <div id="submenu-1-2" class="collapse submenu" style="">
                                                            <ul class="nav flex-column">
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="index.html">E Commerce Dashboard</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="ecommerce-product.html">Product List</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="ecommerce-product-single.html">Product Single</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="ecommerce-product-checkout.html">Product Checkout</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link @if(Request::segment(1)==='vagues') {{ 'active' }} @endif"
                                        href="{{route("vagues.index")}}">Vagues de production</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-1-1" aria-controls="submenu-1-1">Rôles & Permissions</a>
                                    <div id="submenu-1-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Rôles</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Permissions</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Categories</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </li>

                    <li class="nav-divider">
                        ADMINISTRATEUR
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link @if(Request::segment(1)==='users') {{ 'active' }} @endif"
                            href="{{route("users.index")}}" data-toggle="collapse"
                            aria-expanded="@if(Request::segment(1)==='users' || Request::segment(1)==='roles' || Request::segment(1)==='permissions' || Request::segment(1)==='categories') {{ 'true' }} @else {{'false'}} @endif"
                            data-target="#submenu-2" aria-controls="submenu-2"><i
                                class="fa fa-fw fa-user-circle"></i>Gestion du personnel
                            <!--<span class="badge badge-success">6</span>--></a>
                        <div id="submenu-2"
                            class="@if(Request::segment(1)==='users' || Request::segment(1)==='roles' || Request::segment(1)==='permissions' || Request::segment(1)==='categories') {{ 'collapsed' }} @else {{'collapse'}} @endif submenu"
                            style="">
                            <ul class="nav flex-column">
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                                    <div id="submenu-1-2" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.html">E Commerce Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product.html">Product List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product-single.html">Product Single</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product-checkout.html">Product Checkout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link @if(Request::segment(1)==='users') {{ 'active' }} @endif"
                                        href="{{route("users.index")}}">Employés</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-2-1" aria-controls="submenu-2-1">Rôles & Permissions</a>
                                    <div id="submenu-2-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route("roles.index")}}">Rôles</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="{{route("permissions.index")}}">Permissions</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route("categories.index")}}">Categories</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(in_array(Request::segment(1), array("parametres", "categories_approvisionnements"))) {{ 'active' }} @endif" href="{{route("parametres")}}"><i class="fa fa-fw fa-cog"></i>Parametres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Request::segment(1)==='activity') {{ 'active' }} @endif" href="{{route("activity")}}"><i class="fa fa-fw fa-clipboard-list"></i>Activités</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>UI Elements</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/cards.html">Cards <span class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/general.html">General</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/carousel.html">Carousel</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/listgroup.html">List Group</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/typography.html">Typography</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/accordions.html">Accordions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/tabs.html">Tabs</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Chart</a>
                        <div id="submenu-3" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/chart-c3.html">C3 Charts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/chart-chartist.html">Chartist Charts</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/chart-charts.html">Chart</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/chart-morris.html">Morris</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/chart-sparkline.html">Sparkline</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/chart-gauge.html">Guage</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Forms</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/form-elements.html">Form Elements</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/form-validation.html">Parsely Validations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/multiselect.html">Multiselect</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/datepicker.html">Date Picker</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/bootstrap-select.html">Bootstrap Select</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Tables</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/general-table.html">General Tables</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/data-tables.html">Data Tables</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Features
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Pages </a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/blank-page.html">Blank Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/blank-page-header.html">Blank Page Header</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/login.html">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/404-page.html">404 page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/sign-up.html">Sign up Page</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/forgot-password.html">Forgot Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/pricing.html">Pricing Tables</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/timeline.html">Timeline</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/calendar.html">Calendar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/sortable-nestable-lists.html">Sortable/Nestable List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/widgets.html">Widgets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/media-object.html">Media Objects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/cropper-image.html">Cropper</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/color-picker.html">Color Picker</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Apps <span class="badge badge-secondary">New</span></a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/inbox.html">Inbox</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/email-details.html">Email Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/email-compose.html">Email Compose</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/message-chat.html">Message Chat</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>Icons</a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/icon-fontawesome.html">FontAwesome Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/icon-material.html">Material Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/icon-simple-lineicon.html">Simpleline Icon</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/icon-themify.html">Themify Icon</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/icon-flag.html">Flag Icons</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/icon-weather.html">Weather Icon</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Maps</a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/map-google.html">Google Maps</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/map-vector.html">Vector Maps</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Menu Level</a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Level 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                                    <div id="submenu-11" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Level 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Level 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Level 3</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
</div>