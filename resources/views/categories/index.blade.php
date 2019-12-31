@extends("layouts.app")
@section("titre", "Categories de permission")
@section("content")

<div class="modal modal-danger fade" id="modal-supprimer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>
                    Êtes-vous sûr de vouloir supprimer ces données ?
                    <br>
                    Cett action est <b>irreversible</b>.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <button type="button" onclick="document.tableForm.submit()" class="btn btn-outline">Confirmer</button>
            </div>
        </div>
    </div>
</div>

<div class="box">
<div class="box-header">
    <h3 class="box-title">Categories de permissions</h3>
    <div class="text-right ">
    <button type="button" data-toggle="modal" data-target="#modal-supprimer" class="btn bg-maroon btn-flat margin">Supprimer la sélection</button>
    <a href="{{ route('categories.create') }}" class="btn bg-olive btn-flat margin">Ajouter une categorie</a>
    </div>
</div>
<!-- /.box-header -->
<form action="{{ route('categories.multipleDestroy')}}" method="post" name="tableForm">
    @csrf
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr>
                    <td><input type="checkbox" value="{{ $categorie->id }}" id="id{{$categorie->id}}"name="ids[]" ></td>
                    <td>{{ $categorie->id }}</td>
                    <td>
                        <a href="{{ route('categories.show',$categorie) }}">
                            {{ $categorie->name }}
                        </a>
                    </td>
                    <td>{{ $categorie->description }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('categories.edit', $categorie)}}"class="btn btn-flat bg-yellow margin">Modifier</a>
                            <button type="button" onclick="$('#id{{$categorie->id}}').iCheck('check')" data-toggle="modal" data-target="#modal-supprimer" class="btn btn-flat bg-red margin">Supprimer</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </tfoot>
        </table>
    </div>
</form>
<!-- /.box-body -->
</div>
@endsection

@section("scripts")

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
  
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $(' input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(" input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(" input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

 
  });
</script>
@endsection