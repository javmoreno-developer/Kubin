
<meta name="csrf-token" content="{{ csrf_token() }}">
<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<title>KUBIN</title>
</head>
<body>

	<!-- Profile user image -->
	<section id="userModal">
		@if(sizeof(Auth::user()->getMedia("avatars"))>0)
			<div id="userImage" style="background:url('{{Auth::user()->getMedia("avatars")->first()->getUrl("thumb")}}');background-size: cover;">
		@else 
			<div id="userImage" style="background:url({{$imagen}});background-size: cover;">
		@endif
		
			<div id="cambiarModal">
				<button id="cambiarFoto">{{__("messages.men1_das")}}</button>
			</div>
		</div>
		<h3>{{__("messages.men2_das")}} {{$nomUsu}}</h3>
		<h3>{{__("messages.men3_das")}} {{$fecha}}</h3>
		
	</section>

	<!-- Enf of user image -->

	<!-- Main table -->
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
				<tr draggable="true" id="drag_{{$cuadro["idLie"]}}">
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
	
	<!-- End of main table -->

	<!-- Drag container -->
	<div class="drag_destiny">
		<i class="bi bi-trash" id="drag_icon"></i>
	</div>

	<!-- Pagination -->
	<div id="paginacion">
		<div id="container">
			{!! $cuadros->links() !!}
		</div>
	</div>

	<!-- Create canvas and group buttons -->
	<div id="btnCrearLie">
		<a draggable="false" href="{{route("crearLienzo")}}">{{__("messages.men11_das")}}</a>
		@if(Auth::user()->perfUsu==2)
			<button id="create_group">{{__("messages.m8_gr")}}</button>
		@endif
		@if(sizeof($grupo)!=0)
			<button id="see_group">{{__("messages.m9_gr")}}</button>
		@endif
		@if(Auth::user()->perfUsu!=2)
			<button id="turn_premium_btn">Cambiar a premium</button>
		@endif
	</div>

	<!-- Download modal -->
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

	<!-- Change profile modal -->
	<div id="changeFotoModal">
		<div id="fotoMain">
			<div id="main">
				<h1>{{__("messages.men14_das")}}</h1>
				<div id="options">
					<div id="urlModal">url</div>
					@if(Auth::user()->perfUsu==2)
						<div id="fileModal">file</div>
					@endif
				</div>
				<div id="url">	
						<form action="{{route("cambiarFoto")}}" method="post">
							@csrf
							<div>
								<label for="textChange">{{__("messages.men15_das")}}</label>
								<input type="text" name="url" id="textChange">
							</div>
							<button>{{__("messages.men16_das")}}</button>
						</form>
				</div>
				@if(Auth::user()->perfUsu==2)
					<div id="file">	
							<form action="{{route("cambiarFotoFile")}}" method="post" enctype="multipart/form-data">
								@csrf
								<div>
									<label for="textChange">{{__("messages.m38_tab")}}</label>
									<input type="file" name="avatar" id="textChange">
								</div>
								<button>{{__("messages.men16_das")}}</button>
								
								
							</form>
					</div>
				@endif	
			</div>
			<div id="closeMain">
				<i class="bi bi-x-lg" id="closeFoto"></i>
			</div>
		</div>
	</div>

	<!--Create group form-->
	@if(Auth::user()->perfUsu==2)
		<div id="createGroupModal">
			<div id="create_group_main">
				<div id="contentCreateGroup">
					<h1>{{__("messages.title_group")}}</h1>
					<form action="{{route("send-email")}}" method="post">
						@csrf
						<div>	
							<label for="group_name">{{__("messages.m10_gr")}}</label> <br>
							<input type="text" id="group_name" name="name">
						</div>	
						<div>	
							<label for="email_create">{{__("messages.m11_gr")}}</label> <br>
							<textarea name="email_group" id="email_create" cols="30" rows="10"></textarea>
						</div>	
						<button>{{__("messages.m12_gr")}}</button>
					</form>
				</div>
				<div id="closeCreateGroup">
					<i class="bi bi-x-lg" id="closeGroup"></i>
				</div>
			</div>
		</div>
	@endif

	<!-- See group -->
	<div id="seeGroupModal">
		<div id="see_group_main">
			<div id="contentSeeGroup">
				<h1>{{__("messages.m13_gr")}}</h1>
				<div id="container">
					@foreach($grupo as $item)
						<div class="filaGroup">
							<div class="frS">
								<p>{{$item->nomGrup}}</p>
							</div>
							<div class="seS">
								<a href="{{route("grupo",$item->idGrup)}}">{{__("messages.m14_gr")}}</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div id="closeSeeGroup">
				<i class="bi bi-x-lg" id="closeGroup2"></i>
			</div>
		</div>
	</div>

	<!-- Turn into premium modal -->
	<div id="turn_premium_modal">
		<div id="turn_premium_main">
			<div id="turn_premium_content">
				<h1>Introduce el codigo</h1>
				<div id="arrow_container">
					<div id="arrows">
						<div id="arrow_first">
							<i class="bi bi-arrow-up arrow" id="up"></i>
						</div>
						<div id="arrow_second">
							<div id="pt1">
								<i class="bi bi-arrow-left arrow" id="left"></i>
							</div>
							<div id="pt2">
								<i class="bi bi-arrow-right arrow" id="right"></i>
							</div>
						</div>
						<div id="arrow_three">
							<i class="bi bi-arrow-down arrow" id="down"></i>
						</div>
						<div id="arrow_four">
							<p class="arrow" id="a">A</p>
							<p class="arrow" id="b">B</p>
						</div>
					</div>
				</div>
				<div id="conf_prem">
					<button id="closePremium">Cancelar</button>
					<button id="tryPremium">Comprobar</button>
				</div>
			</div>
			
		</div>
	</div>
	<!-- Notifications -->
	<div class="notis">

		@if($not==="mayor")
			<x-notificacion tipo="success" texto="Picture added" identificador="2"/>
		@elseif($not=="menor")
			<x-notificacion tipo="danger" texto="Picture deleted" identificador="1"/>
		@endif

			<x-notificacion tipo="success" texto="Picture downloaded" identificador="0"/>
			<x-notificacion tipo="danger" texto="Codigo incorrecto" identificador="7"/>
			<x-notificacion tipo="success" texto="Codigo correcto" identificador="8"/>

		@if($not=="edit")
			<x-notificacion tipo="success" texto="Picture edited" identificador="5"/>
		@endif

		@if($not=="grupoCreado")
			<x-notificacion tipo="success" texto="Group created" identificador="4"/>
		@endif

	</div>


</body>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--Snap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js" integrity="sha512-Gk+uNk8NWN235mIkS6B7/424TsDuPDaoAsUekJCKTWLKP6wlaPv+PBGfO7dbvZeibVPGW+mYidz0vL0XaWwz4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</html>
@extends("plantillas/cabecera")

