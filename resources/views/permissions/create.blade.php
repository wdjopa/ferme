@extends("layouts.app")
@section("titre", "Création d'une permission")
@section("content")
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Création d'une permission</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{ route('permissions.store') }}" role="form">
        @csrf
        <div class="box-body">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Entrez le nom de la permission" name="name">
                </div>
            </div>
            <div class="form-group">
                <label>Categorie @if(isset($categorie_id)) {{$categorie_id}} @endif</label>
                
                <select class="form-control SelectTeam" name="categorie_id" data-placeholder="Selectionnez la categorie" >
                    @foreach($categories as $categorie)
                        @if(isset($categorie_id) && $categorie_id == $categorie->id)
                        <option value="{{$categorie->id}}" selected="selected">{{$categorie->name}}</option>
                        @else
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control "placeholder="Une petite description" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>  
        <!-- /.box-body -->

        <div class="box-footer">
        <button type="submit" name="stay" value="stay" class="btn btn-primary">Enregistrer</button>
        <button type="submit" name="go"  value="go" class="btn btn-primary">Enregistrer & Quitter</button>
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