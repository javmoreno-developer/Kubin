
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<title>KUBIN</title>
</head>
<body>

	<section id="userModal">
		<div id="userImage" style="background:url({{$imagen}});background-size: cover;">
			<div id="cambiarModal">
				<button id="cambiarFoto">{{__("messages.men1_das")}}</button>
			</div>
		</div>
		<h3>{{__("messages.men2_das")}} {{$nomUsu}}</h3>
		<h3>{{__("messages.men3_das")}} {{$fecha}}</h3>
		
	</section>

	
	<section id="exhibition">
		
		<table>
			<thead>
				<tr id="header">
					<th>{{__("messages.men4_das")}}</th>
				    <th>{{__("messages.men5_das")}}</th>
				    <th>{{__("messages.men6_das")}}</th>
				    <th></th>
				    <th>{{__("messages.men7_das")}}</th>
				    <th></th>
				</tr>
			</thead>
			@foreach($cuadros as $cuadro)
				<tr>
					<td><strong><h4>{{$cuadro["nomLie"]}}</h4></strong></td>
					<td><p> {{$cuadro["created_at"]}}</p></td>
				    <td><p> {{$cuadro["updated_at"]}}</p></td>
				    <td><a id="editBtn" href="{{route("tablero",["id"=>$cuadro["idLie"]])}}">{{__("messages.men8_das")}}</a></td>
				    <td><a id="delBtn" href="{{route("borrarLienzo",["id"=>$cuadro["idLie"]])}}">{{__("messages.men9_das")}}</a>
				    @if(Auth::user()->perfUsu==2)
				    	<td><button class="download" id="download-{{$cuadro["idLie"]}}">{{__("messages.men10_das")}}</button></td>
				    @endif
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
		<a href="{{route("crearLienzo")}}">{{__("messages.men11_das")}}</a>
		<button id="create_group">Crear grupo</button>
	</div>

	@if(Auth::user()->perfUsu==2)
		<div id="downloadContainer">
			<div id="downloadModal">
			<div id="contentDown">
				<h3>{{__("messages.men12_das")}}</h3>
				<p id="nomDown"></p>
				<select id="selectDown">
					<option disabled selected>{{__("messages.men13_das")}}</option>
					<option value="svg">SVG</option>
					<option value="png">PNG</option>
				</select>
				<textarea id="textDown" cols="40" rows="5"></textarea>

				<a id="download">{{__("messages.men10_das")}}</a>
			</div>
			<div id="closeDownload">
				<i class="bi bi-x-lg"></i>
			</div>
		</div>	
		</div>
	@endif

	<div id="changeFotoModal">
		<div id="fotoMain">
			<div id="main">
				<h1>{{__("messages.men14_das")}}</h1>
				<form action="{{route("cambiarFoto")}}" method="post">
					@csrf
					<div>
						<label for="textChange">{{__("messages.men15_das")}}</label>
						<input type="text" name="url" id="textChange">
					</div>
					<button>{{__("messages.men16_das")}}</button>
				</form>
			</div>
			<div id="closeMain">
				<i class="bi bi-x-lg" id="closeFoto"></i>
			</div>
		</div>
	</div>
	</body>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--Snap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js" integrity="sha512-Gk+uNk8NWN235mIkS6B7/424TsDuPDaoAsUekJCKTWLKP6wlaPv+PBGfO7dbvZeibVPGW+mYidz0vL0XaWwz4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</html>
@extends("plantillas/cabecera")

