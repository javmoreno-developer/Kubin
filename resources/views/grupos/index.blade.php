<meta name="csrf-token" content="{{ csrf_token() }}">
<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<title>KUBIN</title>
</head>
<body>

	<section id="mainGroup">
		<div id="title_group">
			<h1>{{$nombreGrupo}}</h1>
			<i class="bi bi-pencil-fill" id="changeName"></i>
		</div>
		<!--Subtitulo-->
		<div id="subtitle_container">
			<div id="title_members">
				<h3 id="member_open">{{__("messages.m1_gr")}}</h3>
			</div>
			<div id="members_container">
				@if(sizeof($imagenes)>=4)
					@for($i=0;$i<4;$i++) 
						<div class="member_icon" style="background: url({{$imagen[$i]}});background-size: cover;></div>
					@endfor
				@else
					@foreach($imagenes as $imagen)
						<div class="member_icon" style="background: url({{$imagen}});background-size: cover;"></div>
					@endforeach
				@endif
			</div>
			<div id="title_category">
				<h3 id="category_open">{{__("messages.m2_gr")}}</h3>
			</div>

			<div id="category_container">
				@if(sizeof($categorias)>=4)
					@for($i=0;$i<4;$i++) 
						<p>#{{$categorias[$i]}}</p>
					@endfor
				@else
					@foreach($categorias as $categoria)
						<p>#{{$categoria}}</p>
					@endforeach
				@endif
			</div>
		</div>

		<!--Tabla-->
		<div id="group_canvas_container">
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
				  <td><a id="editBtn" href="{{route("tablero",["id"=>$cuadro["idLie"],"grupo"=>$id])}}">{{__("messages.men8_das")}}</a></td>
				  <td><a id="delBtn" href="{{route("borrarLienzo",["id"=>$cuadro["idLie"]])}}">{{__("messages.men9_das")}}</a>
				  @if(Auth::user()->perfUsu==2)
				    	<td><button class="download" id="download-{{$cuadro["idLie"]}}">{{__("messages.men10_das")}}</button></td>
				    @endif
				</tr>
				@endforeach
			</table>
		</div>
	</section>

	
	<!--Descargar-->

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
				<input type="hidden" id="grupoDownload" value="true">
				<a id="download">{{__("messages.men10_das")}}</a>
			</div>
			<div id="closeDownload">
				<i class="bi bi-x-lg"></i>
			</div>
		</div>	
		</div>
	@endif


	
	<!--ver lista de miembros-->
	<div id="modalMembersContainer">
		<div id="modalMembersMain">
			<div id="contentModalMembers">
				<h1>{{__("messages.m3_gr")}}</h1>
				<div id="contentMembers">
					
					@for($i=0;$i<sizeof($miembros);$i++)
						<div class="fila_miembro">
							<div class="name">
								<p>{{$miembros[$i]}}</p>
							</div>
							<div class="space"></div>
							<div class="icon">
								<i class="bi bi-person-dash" id="deletePerson_{{$idMiembros[$i]}}"></i>
							</div>
						</div>
					@endfor
					
				
				</div>
				<div id="addMembersContainer">
					<div id="nomPerCtr">
						<input type="text" name="nomPer" id="addMemberInput">
					</div>
					<div id="btnCtr">
						<button id="addMemberBtn">{{__("messages.m19_tab")}}</button>
					</div>
				</div>
			</div>
			<div id="closeModalMembers">
				<i class="bi bi-x-lg" id="closeGroup3"></i>
			</div>
		</div>
	</div>

	<!--ver lista de categorias-->
	<div id="modalCategoryContainer">
		<div id="modalCategoryMain">
			<div id="contentModalCategory">
				<h1>{{__("messages.m4_gr")}}</h1>
				@for($i=0;$i<sizeof($categorias);$i++)
					<div class="fila_miembro">
						<div class="name">
							<p>{{$categorias[$i]}}</p>
						</div>
						<div class="space"></div>
						<div class="icon">
							<i class="bi bi-trash" id="deleteCat_{{$idCat[$i]}}"></i>
						</div>
					</div>

				@endfor
			</div>
			<div id="closeModalCategory">
				<i class="bi bi-x-lg" id="closeGroup4"></i>
			</div>
		</div>
	</div>

	<!--cambiar nombre grupo-->
	<div id="modalNameContainer">
		<div id="modalNameMain">
			<div id="contentModalName">
				<h1>{{__("messages.m5_gr")}}</h1>
				<input type="text" id="changeNameInput">
				<input type="hidden" id="hiddenIdGroup" value="{{$id}}">
				<button id="nameBtn">{{__("messages.m6_gr")}}</button>
			</div>
			<div id="closeModalName">
				<i class="bi bi-x-lg" id="closeGroup5"></i>
			</div>
		</div>
	</div>

	


	<div id="paginacion">
		<div id="container">
			{!! $cuadros->links() !!}
		</div>
	</div>

	<!--Crear lienzo-->
	<div id="make_canvas_container">
		<form action="{{route("crearLienzo")}}" method="post">
			@csrf
			<input type="hidden" name="grupo" value="{{$id}}">
			<button>{{__("messages.men11_das")}}</button>
		</form>
		<a href="{{route("dashboard")}}">{{__("messages.m7_gr")}}</a>

	</div>

</body>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--Snap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js" integrity="sha512-Gk+uNk8NWN235mIkS6B7/424TsDuPDaoAsUekJCKTWLKP6wlaPv+PBGfO7dbvZeibVPGW+mYidz0vL0XaWwz4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</html>
@extends("plantillas/cabecera")