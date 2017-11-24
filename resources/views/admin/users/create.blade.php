 @if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error}}</li>
            @endforeach
        </ul>
   
</div>
@endif
 

{!! Form::open(['route' => 'user.store']) !!}
<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
            <strong> Usuario Agregado Correctamente.</strong>
        </div>

        <div id="msj-error" class="alert alert-success alert-dismissible" role="alert" style="display:none">
            <strong> Usuario Agregado Correctamente.</strong>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

    <div class="container">
        <div class="form-group">
    {!! Form::label('name','Nombre',['class'=>'control-label']) !!}
    {!! Form::text('name',null,['id'=>'name','class'=>'form-control text-uppercase','placeholder' => 'Nombre del Usuario','required']) !!}
    </div>

<div class="form-group">
    {!! Form::label('email','Correo Electrónico',['class'=>'control-label']) !!}
    {!! Form::email('email',null,['id'=>'email','class'=>'form-control text-uppercase','placeholder' => 'Servando@example.com','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('password','Contraseña',['class'=>'control-label']) !!}
    {!! Form::password('password',['id'=>'password','class'=>'form-control' ,'placeholder' => '*******','required']) !!}
</div>

<div class="form-group">
     {!! Form::label('type','Tipo',['class'=>'control-label']) !!}
     {!! Form::select('type',['' =>'Seleccione','2' =>'Miembro','1' => 'Administrador'],null,['id'=>'type','class' => 'form-control','required']) !!}

</div>

<div class="form-group">
    {!! Form::label('image','Imagen',['class'=>'control-label']) !!}
    {!! Form::file('img',null,['class'=>'form-control','placeholder' => 'Nombre de la categoria','required']) !!}
  </div>

    </div>


       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
       {!! Form::submit('Registrar',['class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
      </div>

      @section('script')
    
         @endsection
