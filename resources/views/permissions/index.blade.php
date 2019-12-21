@extends("layouts.app")
@section("titre", "Permissions")
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
    <h3 class="box-title">Permissions</h3>
    <div class="text-right ">
    <button type="button" data-toggle="modal" data-target="#modal-supprimer" class="btn bg-maroon btn-flat margin">Supprimer la sélection</button>
    <a href="{{ route('permissions.create') }}" class="btn bg-olive btn-flat margin">Ajouter une permission</a>
    </div>
</div>
<!-- /.box-header -->
<form action="{{ route('permissions.multipleDestroy')}}" method="post" name="tableForm">
    @csrf
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td><input type="checkbox" value="{{ $permission->id }}" id="id{{$permission->id}}"name="ids[]" ></td>
                    <td>{{ $permission->id }}</td>
                    <td>
                        <a href="{{ route('permissions.show',$permission) }}">
                            {{ $permission->name }}
                        </a>
                    </td>
                    <td>{{ $permission->description }}</td>
                    <td>
                        @if($permission->categorie)
                            <button type="button" class="btn btn-xs btn-warning">{{ App\CategoriePermission::find($permission->categorie)->name }}</button>
                        @else
                            <button type="button" class="btn btn-xs btn-default">{{'unknow'}}</button>
                            
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('permissions.edit', $permission)}}"class="btn btn-flat bg-yellow margin">Modifier</a>
                            <button type="button" onclick="$('#id{{$permission->id}}').iCheck('check')" data-toggle="modal" data-target="#modal-supprimer" class="btn btn-flat bg-red margin">Supprimer</button>
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
            <th>Catégorie</th>
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