
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<title>Document</title>
</head>
<body>
	<section id="userModal">
		<div id="userImage" style="background:url({{$imagen}});background-size: cover;"></div>
		<h3>Bienvenid@ {{$nomUsu}}</h3>
		<h3>Ultima vez : 26/03/2022</h3>
		
	</section>

	
	<section id="exhibition">
		
		<table>
			<thead>
				<tr id="header">
					<th>Nombre</th>
				    <th>Creacion</th>
				    <th>Ultima act</th>
				    <th></th>
				    <th>Operaciones</th>
				    <th></th>
				</tr>
			</thead>
			@foreach($cuadros as $cuadro)
				<tr>
					<td><h4>{{$cuadro["nomLie"]}}</h4></td>
					<td><p> {{$cuadro["pivot"]["created_at"]}}</p></td>
				    <td><p> {{$cuadro["pivot"]["updated_at"]}}</p></td>
				    <td><a id="editBtn" href="{{route("tablero",["id"=>$cuadro["idLie"]])}}">Editar</a></td>
				    <td><a id="delBtn" href="{{route("borrarLienzo",["id"=>$cuadro["idLie"]])}}">Borrar</a>
				    <td><button class="download" id="download-{{$cuadro["idLie"]}}">Descargar</button></td>
				</tr>
			@endforeach
		</table>
	</section>
	
	<div id="paginacion">
		<div id="container">
			{!! $cuadros->links() !!}
		</div>
	</div>

	<div id="btnCrearLie">
		<a href="{{route("crearLienzo")}}">Crear lienzo</a>
	</div>

	<div id="downloadModal">
		<div id="contentDown">
			<h3>Descargar lienzo: </h3>
			<p id="nomDown"></p>
			<select id="selectDown">
				<option disabled selected>Elije formato</option>
				<option value="svg">SVG</option>
				<option value="png">PNG</option>
			</select>
			<textarea id="textDown"></textarea>
			<a id="download">Descarga</a>
		</div>
		<div id="closeDownload">
			<i class="bi bi-x-lg"></i>
		</div>
	</div>
	</body>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--Snap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js" integrity="sha512-Gk+uNk8NWN235mIkS6B7/424TsDuPDaoAsUekJCKTWLKP6wlaPv+PBGfO7dbvZeibVPGW+mYidz0vL0XaWwz4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</html>
@extends("plantillas/cabecera")

