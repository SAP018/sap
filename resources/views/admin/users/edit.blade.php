@extends('admin.template.main')
@section('title','Editar El Usuario:'.' '.$user->name)
@section('link1')
<a class="btn btn-primary" href="{{route('user.index')}}">Regresar</a>
@endsection
@section('content')
 <div style="padding:30px">
{!! Form::open(['route' => ['user.update',$user],'method' => 'put']) !!}
    <div class="form-group">
    {!! Form::label('name','Nombre',['class'=>'control-label']) !!}
    {!! Form::text('name',$user->name,['class'=>'form-control','placeholder' => 'Nombre del Usuario','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('email','Correo Electrónico',['class'=>'control-label']) !!}
    {!! Form::text('email',$user->email,['class'=>'form-control','placeholder' => 'Servando@example.com','required']) !!}
</div>



<div class="form-group">
     {!! Form::label('type','Tipo',['class'=>'control-label']) !!}
     {!! Form::select('type',['' =>'Seleccione','2' =>'Miembro','1' => 'Administrador'],$user->type,['id'=>'type','class' => 'form-control','required']) !!}

</div>

<br>
<div class="form-gropu">
     {!! Form::submit('Registrar',['class' => 'btn btn-success']) !!}
</div>
{!! Form::close() !!}
</div>
@endsection