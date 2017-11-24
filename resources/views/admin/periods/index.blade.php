@extends('admin.template.main')
@section('title','Nuevo Periodo')
@section('link1')

@endsection

@section('link2')
<form class="form-inline my-2 my-lg-0" action="{{route('period.index')}}" method="GET">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="dato">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar..</button>
    </form>
@endsection
@section('link3')
<a href="" class="" data-toggle="modal" data-placement="bottom" title="Crear Un nuevo Periodo" data-target="#exampleModal"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>

<!-- <button type="button" class="btn btn-success" data-toggle="modal"  data-whatever="@getbootstrap">Crear Nuevo Usuario</button>
 -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Periodo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--Form de Crear Usuarios -->
       @include('admin.periods.create')
    </div>
  </div>

@endsection




<!--Contenido De La Seccion -->
@section('content')


<!--Id De la Tabla -->
<div style="padding:10px">
@foreach($periods as $period)

<div class="alert alert-success" role="alert"  ">
  <div class="text">
  <a href="{{route('admin.period1.index',$period->id)}}" class="alert-link"><strong>{{$period->year}}</strong> {{$period->name}}</a>
  
  <a href="{{route('period.edit',$period->id)}}" class="btn btn-sm btn-warning  text-right">Editar</a>
  <a href="" class="btn btn-sm btn-danger  text-right"> eliminar</a>

</div>
</div>

@endforeach
</div>
  
    <div class="" style="margin-left:40% ">
      {{ $periods->links() }}
    </div>
  
@endsection
@section('aside')
<div class="card "  style="width: 20rem;">
  <div class="card-header">
    <i class="fa fa-cog" aria-hidden="true"></i> Datos Generales
  </div>
  <div class="card-block">
    <h4 class="card-title">Consumidores</h4>
    <p class="card-text">
      <div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>
<p>Total:</p>
<div class="progress">
  
  <div class="progress-bar" role="progressbar" style="width: 48%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">48%</div>
</div>
<div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 95%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">95%</div>
</div>
    </p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>
@endsection

@section('script')

@endsection


