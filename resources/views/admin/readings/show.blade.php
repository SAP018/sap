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
        @endif
        <td>{{$read->monto}}</td>
        @if($read->recargo=="")
          <td><span class="badge  badge-danger"> Ninguno</span></td>
        @else
  <td><span class="badge  badge-danger"> {{$read->recargo}}</span></td>
        @endif
        @if($read->month=="11")
          <td><span class="badge  badge-success">Noviembre</span></td>
        @else
  <td><span class="badge  badge-danger"> otro</span></td>
        @endif
        
        <!--Botones -->
              <td class="text-center">
                <a href="" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar Lectura">
                <i class="fa fa-pencil-square-o " aria-hidden="true"></i>
                </a>

          <a href="" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Pagar">

                <i class="fa fa-money" aria-hidden="true"></i>
                </a>

                <a href="" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Imprimir Tiket">
                 <i class="fa fa-ticket" aria-hidden="true"></i>
                </a>
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


