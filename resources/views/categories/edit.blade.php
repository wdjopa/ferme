@extends("layouts.app")
@section("titre", "Création d'une categorie de permission")
@section("content")
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Modification d'une categorie de permission</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{ route('categories.update', $categorie) }}" role="form">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Entrez le nom de la catégorie" value="{{$categorie->name}}" name="name">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control "placeholder="Une petite description" id="" cols="30" rows="10">{{$categorie->description}}</textarea>
                </div>
            </div>
        </div>  
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler/Retour</a>
        </div>
    </form>
</div>

@endsection