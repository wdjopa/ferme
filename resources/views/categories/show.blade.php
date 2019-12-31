@extends("layouts.app")
@section("titre", "Details Categorie")
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


      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
                <div class="profile-user-img img-responsive img-circle" style="height: 100px; background: purple; display: flex; justify-content: center; align-items: center; font-size: 50px; color: white;">
                    {{strtoupper($categorie->name[0].$categorie->name[1])}}
                </div>
              <h3 class="profile-username text-center">{{ucfirst($categorie->name)}}</h3>

              <p class="text-muted text-center"></p>

              <ul class="list-group list-group-unbordered">
                
                <li class="list-group-item">
                  <b>Permissions</b> <a class="pull-right">{{sizeof($categorie->permissions)}}</a>
                </li>
                <li class="list-group-item">
                  <b>Créée le </b> <a class="pull-right">{{ $categorie->created_at }}</a>
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
                {{ $categorie->description}}
              </p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <!-- Membres -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Membres ayant ce rôle</h3>
                    <div class="text-right ">
                        <button type="button" data-toggle="modal" data-target="#modal-revoke" class="btn bg-maroon btn-flat margin">Révoquer la sélection</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('categories.revoke', $categorie)}}" method="post" name="tableRevokeForm">
                    @csrf
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped ">
                        <thead>
                        <tr>
                            <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Titre</th>
                            <th>Email</th>
                            <th>categories</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach(App\User::categorie($categorie->name)->get() as $user)
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
                                    @foreach($user->categories as $equipe)
                                        @if($equipe->id == 1)
                                            <a class="label label-danger" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @elseif($equipe->id == 2)
                                            <a class="label label-warning" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @elseif($equipe->id == 3)
                                            <a class="label label-primary" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @elseif($equipe->id == 4)
                                            <a class="label label-success" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @else
                                            <a class="label bg-purple" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-danger btn-flat"  onclick="$('#id{{$user->id}}').iCheck('check')" data-toggle="modal" data-target="#modal-revoke" class="btn btn-flat btn-block bg-red">Révoquer</button>
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
                            <th>Categories</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        </table>
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
            
            <!-- Non Membres -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Autres collaborateurs</h3>
                    <div class="text-right ">
                    <button data-toggle="modal" data-target="#modal-assign" class="btn bg-yellow btn-flat margin">Assigner la sélection</button>
                    </div>
                </div>
                <!-- /.box-header -->
                <form action="{{ route('categories.assign', $categorie)}}" method="post" name="tableAssignForm">
                    @csrf
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th><button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button></th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Titre</th>
                            <th>Email</th>
                            <th>Categories</th>
                            <th>Actions </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                @if(!$user->hasCategorie($categorie->name))
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
                                    @foreach($user->categories as $equipe)
                                        @if($equipe->id == 1)
                                            <a class="label label-danger" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @elseif($equipe->id == 2)
                                            <a class="label label-warning" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @elseif($equipe->id == 3)
                                            <a class="label label-primary" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @elseif($equipe->id == 4)
                                            <a class="label label-success" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @else
                                            <a class="label bg-purple" href="{{route('categories.show',$equipe)}}">{{ $equipe->name }}</a>
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-flat" onclick="$('#id{{$user->id}}').iCheck('check')" data-toggle="modal" data-target="#modal-assign">Assigner</button>
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
                            <th>Categories</th>
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
    $('.SelectCategorie').select2()
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