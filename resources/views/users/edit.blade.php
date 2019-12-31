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
                        <li class="breadcrumb-item"><a href="{{route("users.index")}}" class="breadcrumb-link">Gestion
                                des employés</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Modifier un nouvel employé</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="ecommerce-widget">
    <div class="row">
        <!-- ============================================================== -->
        <!-- valifation types -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Modification de l'employé {{ ucfirst($user->name) }}</h5>
                <div class="card-body">
                    <form method="post" action="{{route("users.update", $user)}}" id="validationform"
                        class="needs-validation" data-parsley-validate="" novalidate="">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-sm-12 col-md-8">

                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Noms & prénoms</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <div class="row">

                                            <div class="col-6 col-sm-6 col-lg-6">
                                                <input type="text" value="{{$user->prenom}}" name="prenom"
                                                    placeholder="Entrez les prénoms complets" class="form-control">
                                            </div>
                                            <div class="col-6 col-sm-6 col-lg-6">
                                                <input type="text" value="{{$user->nom}}" required="" name="nom"
                                                    placeholder="Entrez les noms complets" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Titre/Fonction</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" value="{{$user->titre}}" name="titre"
                                            placeholder="Entrez le titre ou la fonction" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Adresse email</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="email" required="" value="{{$user->email}}" name="email"
                                            placeholder="Entrez l'adresse email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Téléphone
                                        portable</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="tel" class="form-control phone-inputmask" value="{{$user->tel}}"
                                            name="tel" required id="phone-mask" placeholder="(237) XXX-XXX-XXX">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">N° CNI</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="text" required="" name="cni" value="{{$user->cni}}"
                                            placeholder="Entrez le numéro de CNI" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Sexe</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <select name="sexe" id="" required class="form-control">
                                            <option value="homme" @if($user->sexe == 'homme') selected @endif>Homme
                                            </option>
                                            <option value="femme" @if($user->sexe == 'femme') selected @endif>Femme
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Date de
                                        naissance</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input required name="datenaissance" value="{{$user->datenaissance}}T00:00"
                                            type="datetime-local" class="form-control" placeholder="jj/mm/aaaa">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Notes</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <textarea name="note" placeholder="Entrez une note sur l'employé"
                                            class="form-control">{{$user->notes}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                        <a href="{{route("users.index")}}"
                                            class="btn btn-space btn-secondary">Annuler</a>
                                        <button type="submit" class="btn btn-space btn-primary">Modifier</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end valifation types -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection
@section("newcss")
<link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
@endsection

@section("newscript")
<script src="{{asset("assets/vendor/slimscroll/jquery.slimscroll.js")}}"></script>
<script src="{{asset("assets/vendor/parsley/parsley.js")}}"></script>
<script src="{{asset("assets/libs/js/main-js.js")}}"></script>
<script src="../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
<script>
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-999-999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("99%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
</script>
<script>
    $('#form').parsley();
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@endsection