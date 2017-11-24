<div class="table-responsive">
	<table id="" class="table table-sm table-hover  table-bordered ">
		<thead>
			<tr>
				<th class="">ID</th>
		        <th class="">NOMBRE</th>
		        <th class="" >E-MAIL</th>
		        <th class="">TIPO</th>
		        <th class="">ACCION</th>
			</tr>
		</thead>

		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>
					@if($user->type==1)
					<span class="label label-success">Administrador</span>
					@else
					<span class="label label-success">Usuario</span>
					@endif
				</td>
				<!--Botones -->
          		<td>
          			<a href="" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Editar al Usuario {{$user->name}}">
         				<i class="fa fa-pencil-square-o " aria-hidden="true"></i>
          			</a>

					<a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Ver al Usuario {{$user->name}}">
         				<i class="fa fa-eye" aria-hidden="true"></i>
          			</a>

          			<a href="" onclick="return confirm('Seguro que deseas eliminar?')" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Eliminar al Usuario {{$user->name}}">
          	 			<i class="fa fa-trash-o" aria-hidden="true"></i>
          			</a>
          		</td>



			</tr>
			@endforeach
		</tbody>
	</table>

</div>
	
		<div class="" style="margin-left:40% ">
			{{ $users->links() }}
		</div>
	