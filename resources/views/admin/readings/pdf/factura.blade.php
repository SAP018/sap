<style>
	.bord{
		border:solid;

	}
	.bord1{
		border:solid;
		margin:30px;
	
	}
	.fech{
		text-align: right;
		margin-right: 30px;
	}
	.tex1{
		margin:30px;
		text-decoration: underline;
	}
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin:30px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
hr{
	margin:70px;
}
</style>


<div class="bord">
	

<center><h1 class="bord1">RECIBO DE PAGO</h1></center>
<p class="fech"> <strong>FECHA:</strong> @php
echo date('y-m-d');
@endphp </p>
<p class="fech"><strong># Recibo:</strong>{{$factura->id}}</p>
<p class="fech"><strong">#medidor:</strong>{{$factura->customer->num_medidor}}</p>
<p class="fech"><strong>Recargos:</strong>{{$factura->recargo}}</p>
<p class="tex1"><strong>Nombre de Usuario:</strong>{{$factura->customer->name}}</p>

@if($factura->month== 1 and $factura->month = 1)
    <p class="tex1"><strong>Periodo de consumo:</strong> 1 A 1</p>
@elseif($factura->month== 1)
    <p class="tex1"><strong>Periodo de consumo:</strong> 12 A 1</p>
@else
<p class="tex1"><strong>Periodo de consumo:</strong> {{$flight->month}} A {{$factura->month}}</p>
@endif


<table >
  <tr>
    <th>LECTURA ANTERIOR</th>
    <th>LECTURA ACTUAL</th>
    <th>METROS GASTADOS</th>
    <th>COSTO POR METRO</th>
  </tr>
  <tr>
    @if($factura->month == 1 and $factura->period_id == 1)
    <td>Es el primer registro</td>
    @elseif($factura->month == 1 and $factura->period_id != 1)
    <td>{{$periodo->medida}}</td>
    @else
    <td>{{$flight->medida}}</td>
    @endif

    <td>{{$factura->medida}}</td>
    <td>{{$metros}}</td>
    <td>10.00</td>
  </tr>
</table>
<center><p><strong>Total A Pagar</strong> {{$cantidad}}</p></center>
<center><p><strong>ELTESORERO DEL COMITE</strong> </p></center>
<hr>
</body>
</html>

</div>