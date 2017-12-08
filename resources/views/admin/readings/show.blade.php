@extends('admin.template.main')
@section('title','Lecturas')
@section('link1')
<a href="{{route('reading.create')}}" class=""> <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>
@endsection

@section('link2')

 

@endsection

@section('link3')

@endsection

<!--Contenido De La Seccion -->
@section('content')



<!--Id De la Tabla -->
<div class="table-responsive">
  <table id="" class="table table-sm table-hover">
    <thead>
      <tr class="bg-success">
        <th class="">ID</th>
            <th class="">CONSUMIDOR</th>
            <th class="">MEDIDA</th>
            <th>ESTATUS</th>
            <th class="">MONTO</th>
            <th class="">RECARGO</th>
            <th>MES</th>
            <th class="">ACCION</th>
      </tr>
    </thead>

    <tbody>
      @foreach($reads as $read)
      <tr>
        <td><h6 class="">{{ $read->id}}</h6></td>
        <td>{{$read->customer->name}}</td>

        <td><span class="badge badge-default">{{$read->medida}}</span> </td>

        @if($read->estatus ==1)
           <td><span class="badge  badge-warning">sin pagar</span></td>
        @else
          <td><span class="badge  badge-success">Pagado</span></td>
        @endif


        <td>{{$read->monto}}</td>
        @if($read->recargo=="")
          <td><span class="badge  badge-danger"> Ninguno</span></td>
        @else
        <td><span class="badge  badge-danger"> {{$read->recargo}}</span></td>
        @endif


        @if($read->month=="11")
          <td><span class="badge  badge-success">Noviembre</span></td>
        @elseif($read->month=="12")
          <td><span class="badge  badge-danger">Diciembre</span></td>
          @elseif($read->month=="1")
          <td><span class="badge  badge-danger">Enero</span></td>
          @elseif($read->month=="2")
          <td><span class="badge  badge-danger">Febrero</span></td>
          @elseif($read->month=="3")
          <td><span class="badge  badge-danger">Marzo</span></td>
          @elseif($read->month=="4")
          <td><span class="badge  badge-danger">Abril</span></td>
          @elseif($read->month=="5")
          <td><span class="badge  badge-danger">Mayo</span></td>
          @elseif($read->month=="6")
          <td><span class="badge  badge-danger">Junio</span></td>
          @else
          <td><span class="badge  badge-danger">Otro</span></td>
        @endif
        
        <!--Botones -->
              <td class="text-center">
                <a href="" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar Lectura">
                <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                </a>
                @if($read->estatus==2)
                  <a href="{{route('admin.reading.pay',$read->id)}}" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Deshacer pago">
                    <i class="fa fa-money" aria-hidden="true"></i>
          @elseif($read->estatus==1)
               
              
          <a href="{{route('admin.reading.pay',$read->id)}}" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Pagar">

                <i class="fa fa-money" aria-hidden="true"></i>

                @endif
                </a>
                @if($read->estatus==1)
                <a href="" class="btn btn-danger disabled" data-toggle="tooltip" data-placement="bottom" title="No puedes imprimir ticket pq no ha pagado" diseabled>
                 <i class="fa fa-ticket" aria-hidden="true"></i>
                </a>
                
                @else
                 <a href="{{route('admin.reading1.factura',$read->id)}}" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Imprimir Tiket">
                 <i class="fa fa-ticket" aria-hidden="true"></i>
                </a>
                @endif
              </td>





      </tr>
      
      @endforeach
    </tbody>
  </table>

</div>
  
    <div class="" style="margin-left:40% ">
     {{--}} {{ $reads->links() }} {{--}}
    </div>
  
@endsection

@section('script')

@endsection


@section('aside')
<div class="card " >
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

