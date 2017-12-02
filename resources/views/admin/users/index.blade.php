@extends('admin.template.main')
@section('title','Nuevo Usuario')
@section('link1')

@endsection

@section('link2')

<form class="form-inline my-2 my-lg-0" action="{{route('user.index')}}" method="GET">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="dato">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar..</button>
    </form>
@endsection
@section('link3')
<a href="" class="" data-toggle="modal" data-placement="bottom" title="Crear Un nuevo Usuario" data-target="#exampleModal"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>

<!-- <button type="button" class="btn btn-success" data-toggle="modal"  data-whatever="@getbootstrap">Crear Nuevo Usuario</button>
 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Form de Crear Usuarios -->
       @include('admin.users.create')
    </div>
  </div>

@endsection




<!--Contenido De La Seccion -->
@section('content')


<!--Id De la Tabla -->
<div class="table-responsive">
  <table id="" class="table table-sm table-hover  table-bordered table-warning ">
    <thead class="table-inverse">
      <tr class=" ">
        <th class="">ID</th>
            <th class="">NOMBRE</th>
            <th class="" >E-MAIL</th>
            <th class="">TIPO</th>
            <th class="">ACCION</th>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          @if($user->type==1)
          <span class="label label-success text-success">Administrador</span>
          @else
          <span class="label label-success text-danger">Usuario</span>
          @endif
        </td>
        <!--Botones -->
              <td class="text-center">
                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar al Usuario {{$user->name}}">
                <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                </a>

          <a href="" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver al Usuario {{$user->name}}">
                <i class="fa fa-eye" aria-hidden="true"></i>
                </a>

                <a href="{{ route('admin.user.destroy',$user->id) }}"" onclick="return confirm('Seguro que deseas eliminar?  {{$user->name}}')" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar al Usuario {{$user->name}}">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
              </td>





      </tr>
      @endforeach
    </tbody>
  </table>

</div>
  
    <div class="" style="margin-left:40% ">
      {{ $users->links() }}
    </div>
  
@endsection

@section('aside')
<div class="card est " >
  <div class="card-header">
    <i class="fa fa-cog" aria-hidden="true"></i> Datos Generales
  </div>
  <div class="card-block">
    <h4 class="card-title">Special title treatment</h4>
    <p class="card-text">
      <ul class="list-group">
  <li class="list-group-item justify-content-between">
    Cras justo odio
    <span class="badge badge-default badge-pill">14</span>
  </li>
  <li class="list-group-item justify-content-between">
    Dapibus ac facilisis in
    <span class="badge badge-default badge-pill">2</span>
  </li>
  <li class="list-group-item justify-content-between">
    Morbi leo risus
    <span class="badge badge-default badge-pill">1</span>
  </li>
</ul>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
@endsection

@section('script')

@endsection





