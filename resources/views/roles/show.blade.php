@extends("layouts.app")
@section("titre", "Details Role")
@section("content")

<div class="modal modal-warning fade" id="modal-revoke">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>
                    Êtes-vous sûr de vouloir révoquer ce rôle à cette personne  ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <button type="button" onclick="document.tableRevokeForm.submit()" class="btn btn-outline">Confirmer</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-warning fade" id="modal-assign">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>
                    Êtes-vous sûr de vouloir assigner ce rôle à ce(s)-tte personne(s) ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <button type="button" onclick="document.tableAssignForm.submit()" class="btn btn-outline">Confirmer</button>
            </div>
        </div>
    </div>
</div>



<div class="modal modal-warning fade" id="modal-revoke-permission">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>
                    Êtes-vous sûr de vouloir révoquer ce rôle à cette permission  ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <button type="button" onclick="document.tableRevokePermissionForm.submit()" class="btn btn-outline">Confirmer</button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-warning fade" id="modal-assign-permission">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>
                    Êtes-vous sûr de vouloir assigner ce rôle à ce(s)-tte permission(s) ?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>
                <button type="button" onclick="document.tableAssignPermissionForm.submit()" class="btn btn-outline">Confirmer</button>
            </div>
        </div>
    </div>
</div>


      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
                <div class="profile-user-img img-responsive img-circle" style="height: 100px; background: purple; display: flex; justify-content: center; align-items: center; font-size: 50px; color: white;">
                    {{strtoupper($role->name[0].$role->name[1])}}
                </div>
              <h3 class="profile-username text-center">{{ucfirst($role->name)}}</h3>

              <p class="text-muted text-center"></p>

              <ul class="list-group list-group-unbordered">
                
                <li class="list-group-item">
                  <b>Membres</b> <a class="pull-right">{{sizeof($role->users)}}</a>
                </li>
                <li class="list-group-item">
                  <b>Créée le </b> <a class="pull-right">{{ $role->created_at }}</a>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Description</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <p class="text-muted">
                {{ $role->description}}
              </p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <li class="active"><a href="#collaborateurs" data-toggle="tab">Collaborateurs</a></li>
                <li class=""><a href="#permissions" data-toggle="tab">Permissions</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="permissions">
                        <!-- Permissions  -->
                        <div class="margin">
                            <div class="box-header">
                                <h3 class="box-title">Permissions affectées à ce rôle</h3>
                                <div class="text-right ">
                                    <button type="button" data-toggle="modal" data-target="#modal-revoke-permission" class="btn bg-maroon btn-flat margin">Révoquer la sélection</button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <form action="{{ route('roles.revokePermission', $role)}}" method="post" name="tableRevokePermissionForm" id="tableRevokePermissionForm">
                                @csrf
                                <div class="box-body table-responsive">
                                    <table id="tableRevokePermission" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Categorie</th>
                                                <th>Roles</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Spatie\Permission\Models\Permission::role($role->name)->get() as $permit)
                                                <tr>
                                                    <td><input type="checkbox" value="{{ $permit->id }}" id="id{{$permit->id}}"name="ids[]" ></td>
                                                    <td>{{ $permit->id }}</td>
                                                    <td>
                                                        <a href="{{ route('permissions.show',$permit) }}">
                                                            {{ $permit->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $permit->description }}</td>
                                                    <td>{{ $permit->categorie }}</td>
                                                    <td>
                                                    @foreach($permit->roles as $equipe)
                                                        @if($equipe->id == 1)
                                                            <a class="label label-danger" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                        @elseif($equipe->id == 2)
                                                            <a class="label label-warning" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                        @elseif($equipe->id == 3)
                                                            <a class="label label-primary" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                        @elseif($equipe->id == 4)
                                                            <a class="label label-success" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                        @else
                                                            <a class="label bg-purple" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                        @endif
                                                    @endforeach
                                                    </td>
                                                    <td>
                                                    <button type="button" class="btn btn-danger btn-flat"  onclick="$('#id{{$permit->id}}').iCheck('check')" data-toggle="modal" data-target="#modal-revoke-permission" class="btn btn-flat btn-block bg-red">Révoquer</button>
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
                                                <th>Categorie</th>
                                                <th>Roles</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                            <!-- /.box-body -->
                        </div>
                        
                        <!-- Permissions non liees -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Autres permissions</h3>
                                <div class="text-right ">
                                <button data-toggle="modal" data-target="#modal-assign-permission" class="btn bg-yellow btn-flat margin">Assigner la sélection</button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <form action="{{ route('roles.assignPermission', $role)}}" method="post" name="tableAssignPermissionForm" id="tableAssignPermissionForm">
                                @csrf
                                <div class="box-body table-responsive">
                                    <table id="tableAssignPermission" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Roles</th>
                                        <th>Catégorie</th>
                                        <th>Actions </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissions as $permission)
                                            @if(!$role->hasPermissionTo($permission->name))
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
                                                @foreach($permission->roles as $equipe)
                                                    @if($equipe->id == 1)
                                                        <a class="label label-danger" href="{{route('permissions.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 2)
                                                        <a class="label label-warning" href="{{route('permissions.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 3)
                                                        <a class="label label-primary" href="{{route('permissions.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 4)
                                                        <a class="label label-success" href="{{route('permissions.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @else
                                                        <a class="label bg-purple" href="{{route('permissions.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                    @if($permission->categorie)
                                                        <button type="button" class="btn btn-xs btn-outline-warning">{{ App\CategoriePermission::find($permission->categorie)->name }}</button>
                                                    @else
                                                        <button type="button" class="btn btn-xs btn-default">{{'unknow'}}</button>
                                                        
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-flat" onclick="$('#id{{$permission->id}}').iCheck('check')" data-toggle="modal" data-target="#modal-assign-permission">Assigner</button>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Roles</th>
                                        <th>Categorie</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </form>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="active tab-pane" id="collaborateurs">
                         <!-- Membres -->
                        <div class="margin">
                            <div class="box-header">
                                <h3 class="box-title">Membres ayant ce rôle</h3>
                                <div class="text-right ">
                                    <button type="button" data-toggle="modal" data-target="#modal-revoke" class="btn bg-maroon btn-flat margin">Révoquer la sélection</button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <form action="{{ route('roles.revoke', $role)}}" method="post" name="tableRevokeForm" id="tableRevokeForm">
                                @csrf
                                <div class="box-body table-responsive">
                                    <table id="tableRevokeUser" class="table table-bordered table-striped ">
                                    <thead>
                                    <tr>
                                        <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Titre</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(App\User::role($role->name)->get() as $user)
                                            <tr>
                                                <td><input type="checkbox" value="{{ $user->id }}" id="id{{$user->id}}"name="ids[]" ></td>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <a href="{{ route('users.show',$user) }}">
                                                        {{ $user->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $user->titre }}</td>
                                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                <td>
                                                @foreach($user->roles as $equipe)
                                                    @if($equipe->id == 1)
                                                        <a class="label label-danger" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 2)
                                                        <a class="label label-warning" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 3)
                                                        <a class="label label-primary" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 4)
                                                        <a class="label label-success" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @else
                                                        <a class="label bg-purple" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                <button type="button" class="btn btn-danger btn-flat"  onclick="$('#tableRevokeForm #id{{$user->id}}').iCheck('check')" data-toggle="modal" data-target="#modal-revoke" class="btn btn-flat btn-block bg-red">Révoquer</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Titre</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </form>
                            <!-- /.box-body -->
                        </div>
                        
                        <!-- Non Membres -->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Autres collaborateurs</h3>
                                <div class="text-right ">
                                <button data-toggle="modal" data-target="#modal-assign" class="btn bg-yellow btn-flat margin">Assigner la sélection</button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <form action="{{ route('roles.assign', $role)}}" method="post" name="tableAssignForm" id="tableAssignForm">
                                @csrf
                                <div class="box-body table-responsive">
                                    <table id="tableAssignUser" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Titre</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Actions </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            @if(!$user->hasRole($role->name))
                                            <tr>

                                                <td><input type="checkbox" value="{{ $user->id }}" id="id{{$user->id}}"name="ids[]" ></td>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <a href="{{ route('users.show',$user) }}">
                                                        {{ $user->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $user->titre }}</td>
                                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                <td>
                                                @foreach($user->roles as $equipe)
                                                    @if($equipe->id == 1)
                                                        <a class="label label-danger" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 2)
                                                        <a class="label label-warning" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 3)
                                                        <a class="label label-primary" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @elseif($equipe->id == 4)
                                                        <a class="label label-success" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @else
                                                        <a class="label bg-purple" href="{{route('roles.show',$equipe)}}">{{ $equipe->name }}</a>
                                                    @endif
                                                @endforeach
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-flat" onclick="$('#tableAssignForm #id{{$user->id}}').iCheck('check')" data-toggle="modal" data-target="#modal-assign">Assigner</button>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Titre</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </form>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>      
        </div>
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
    $('.SelectRole').select2()
    $('#tableRevokePermission').DataTable()
    $('#tableAssignPermission').DataTable()
    $('#tableAssignUser').DataTable()
    $('#tableRevokeUser').DataTable()

  })
  
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('#tableRevokePermissionForm input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    $('#tableAssignPermissionForm input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    $('#tableAssignForm input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
    $('#tableRevokeForm input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $("#tableRevokePermissionForm .checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("#tableRevokePermissionForm  input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $("#tableRevokePermissionForm  input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
    //Enable check and uncheck all functionality
    $("#tableAssignPermissionForm .checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("#tableAssignPermissionForm  input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $("#tableAssignPermissionForm  input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
    //Enable check and uncheck all functionality
    $("#tableAssignForm .checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("#tableAssignForm  input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $("#tableAssignForm  input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
    //Enable check and uncheck all functionality
    $("#tableRevokeForm .checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("#tableRevokeForm  input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $("#tableRevokeForm  input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

 
  });
</script>
@endsection