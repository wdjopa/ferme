@extends("layouts.app")
@section("titre", "Modification d'une permission")
@section("content")
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Modification d'une permission</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{ route('permissions.update', $permission) }}" permission="form">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Entrez le nom de l'équipe" value="{{$permission->name}}" name="name">
                </div>
            </div>
            <div class="form-group">
                <label>Categorie</label>
                <select class="form-control SelectTeam" name="categorie" data-placeholder="Selectionnez la categorie" >
                    @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control "placeholder="Une petite description" id="" cols="30" rows="10">{{$permission->description}}</textarea>
                </div>
            </div>
        </div>  
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Annuler/Retour</a>
        </div>
    </form>
</div>

@endsection

@section("css")
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('scripts')

<!-- Select2 -->
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
      $('.SelectTeam').select2()
  });
</script>
@endsection