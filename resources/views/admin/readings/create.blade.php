@extends('admin.template.main')
@section('title','Crear Lectura')
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
 
{!! Form::open(['route' => 'reading.store','method' => 'POST']) !!}
<div class="" style="padding:30px;">

    <div class="form-group ">
	{!! Form::label('customer_id','Customer_id',['class'=>'control-label']) !!}
	{!! Form::select('customer_id',$customers,null,['class' => 'form-control','placeholder' => 'seleccione una opcion..', 'requerid']) !!}
	</div>

	<div class="form-group">
    {!! Form::label('mediada','Mediada',['class'=>'control-label']) !!}
    {!! Form::text('medida',null,['class'=>'form-control','placeholder' => 'Metros Del Medidor','required']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('monto','Cantidad',['class'=>'control-label']) !!}
    {!! Form::text('monto',null,['class'=>'form-control','placeholder' => 'Cantidad A Cobrar','required']) !!}
    </div>
    


	

<br>
<div class="form-gropu">
	 {!! Form::submit('Registrar',['class' => 'btn btn-success']) !!}
</div>
</div>
{!! Form::close() !!}
@endsection

@section('js')
		<script>
		$('.select-tag').chosen({
			no_results_text: "No encontrado"
		});

		$('textarea').trumbowyg({
    
		});
		</script>
@endsection