@extends("layouts.app")
@section("titre", "Modification d'un rôle")
@section("content")
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Modification du role</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{ route('roles.update', $role) }}" role="form">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Entrez le nom du role" value="{{$role->name}}" name="name">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control "placeholder="Une petite description" id="" cols="30" rows="10">{{$role->description}}</textarea>
                </div>
            </div>
        </div>  
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Annuler/Retour</a>
        </div>
    </form>
</div>

@endsection