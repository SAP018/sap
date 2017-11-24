@extends('admin.template.main')
@section('link1')
<a href="{{route('customer.index')}}" class=""> Regresar</a>
@endsection
<!--Seccion de contenido -->
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
 
 <div style="padding:30px">
{!! Form::open(['route' => ['customer.update',$customer],'method' => 'put']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <!--Nombre del consumidor -->
    <div class="form-group">
    {!! Form::label('name','Nombre',['class'=>'control-label']) !!}
    {!! Form::text('name',$customer->name,['class'=>'form-control','placeholder' => 'Nombre del Consumidor','required']) !!}
    </div>
    <!--Corrreo electronico -->
    <div class="form-group">
    {!! Form::label('email','Correo Electronico',['class'=>'control-label']) !!}
    {!! Form::email('email',$customer->email,['class'=>'form-control','placeholder' => 'Correo@example','required']) !!}
    </div>

     <!--Corrreo Telefono -->
    <div class="form-group">
    {!! Form::label('phone','Telefono',['class'=>'control-label']) !!}
    {!! Form::tel('phone',$customer->phone,['class'=>'form-control','placeholder' => 'Numero de telefono','required', 'maxlength' => '10' ]) !!}
    </div>
    <!--Direccion -->
    <div class="form-group">
    {!! Form::label('address','Domicilio',['class'=>'control-label']) !!}
    {!! Form::text('address',$customer->address,['class'=>'form-control','placeholder' => 'Direccion de la vivienda','required' ]) !!}
    </div>

     <div class="form-group">
    {!! Form::label('num_medidor','Numero de Medidor',['class'=>'control-label']) !!}
    {!! Form::text('num_medidor',$customer->num_medidor,['class'=>'form-control','placeholder' => 'Numero de medidor','required' ]) !!}
    </div>


<br>
<div class="form-gropu">
	 {!! Form::submit('Registrar',['class' => 'btn btn-success']) !!}
</div>
{!! Form::close() !!}
</div>
@endsection

