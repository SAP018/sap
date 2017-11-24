@extends('admin.template.main')
@section('title','Pagina principal')

@section('content')

	<center>	<img class="img-fluid" src="{{ asset('img/SAP2.png') }}" height="300" width="400" alt=" Sitio Web En construccion"></center>

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