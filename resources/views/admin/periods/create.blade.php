@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    
        <ul>
            @foreach($errors->all() as $error)
            <li> {{ $error}}</li>
            @endforeach
        </ul>
   
</div>
@endif
 

{!! Form::open(['route' => 'period.store']) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

    <div class="container">
        <div class="form-group">
    {!! Form::label('name','Nombre',['class'=>'control-label']) !!}
    {!! Form::text('name',null,['id'=>'name','class'=>'form-control text-uppercase','placeholder' => 'Nombre del del periodo','required', 'maxlenght'=> '4']) !!}
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
