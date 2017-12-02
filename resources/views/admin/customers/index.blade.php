@extends('admin.template.main')
@section('title','Lista de Consumidores')
@section('link1')
<a href="{{route('customer.create')}}" class=""> <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>
@endsection

@section('link2')
	<form class="form-inline my-2 my-lg-0" action="{{route('customer.index')}}" method="GET">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" name="dato">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar..</button>
    </form>

@endsection

@section('link3')

@endsection

<!--Contenido De La Seccion -->
@section('content')



<!--Id De la Tabla -->
<div class="table-responsive">
  <table id="" class="table table-sm table-hover">
    <thead>
      <tr class="bg-warning">
        <th class="">ID</th>
            <th class="">NOMBRE</th>
           <!-- <th class="" >E-MAIL</th>-->
            <th class=""><i class="fa fa-phone-square" aria-hidden="true"></i> PHONE</th>
            <th class=""><i class="fa fa-address-card" aria-hidden="true"></i> ADDRESS </th>
            <th class=""><i class="fa fa-clock-o" aria-hidden="true"></i> #MEDIDOR </th>
            <th class=""><i class="fa fa-cogs" aria-hidden="true"></i> ACCION</th>
      </tr>
    </thead>

    <tbody>
      @foreach($customers as $customer)
      <tr>
        <td><h6 class="">{{ $customer->id}}</h6></td>
        <td>{{$customer->name}}</td>
       <!-- <td>{{--}} {{$customer->email}} {{--}}</td>-->
        <td><span class="badge badge-default">{{$customer->phone}}</span> </td>
        <td>{{$customer->address}}</td>
        <td><span class="badge  badge-danger"> {{$customer->num_medidor}}</span></td>
        <!--Botones -->
              <td class="text-center">
                <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar al Usuario {{$customer->name}}">
                <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                </a>

          <a href="" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver al Usuario {{$customer->name}}">
                <i class="fa fa-eye" aria-hidden="true"></i>
                </a>

                <a href="" onclick="return confirm('Seguro que deseas eliminar?  {{$customer->name}}')" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar al Usuario {{$customer->name}}">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
              </td>





      </tr>
      
      @endforeach
    </tbody>
  </table>

</div>
  
    <div class="" style="margin-left:40% ">
      {{ $customers->links() }}
    </div>
  
@endsection
@section('aside')
<div class="card ">
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


