@extends('admin.template.main')
@section('title','Editar Periodo')
@section('link1')
<a class="btn btn-primary" href="{{route('period.index')}}">Regresar</a>
@endsection
@section('content')
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error}}</li>
            @endforeach
        </ul>
   
</div>
@endif
 

{!! Form::open(['route' => ['period.update',$period],'method' => 'put']) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

   
        <div class="form-group " style="padding: 30px">
    {!! Form::label('name','Nombre',['class'=>'control-label']) !!}
    {!! Form::text('name',$period->name,['id'=>'name','class'=>'form-control text-uppercase','placeholder' => 'Nombre del del periodo','required', 'maxlenght'=> '4']) !!}

        <br>	
   <div class="form-gropu">
     {!! Form::submit('Registrar',['class' => 'btn btn-success']) !!}
</div>
    </div>




       
    
  
        {!! Form::close() !!}
     
@endsection