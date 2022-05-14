<meta name="csrf-token" content="{{ csrf_token() }}">
<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<title>KUBIN</title>
</head>
<body>

	<section id="mainGroup">
		<div id="title_group">
			<h1>{{$nombreGrupo}}</h1>
		</div>
		<!--Subtitulo-->
		<div id="subtitle_container">
			<div id="title_members">
				<h3 id="member_open">Miembros</h3>
			</div>
			<div id="members_container">
				@if(sizeof($imagenes)>=4)
					@for($i=0;$i<4;$i++) 
						<div class="member_icon" style="background: url({{$imagen}});background-size: cover;></div>
					@endfor
				@else
					@foreach($imagenes as $imagen)
						<div class="member_icon" style="background: url({{$imagen}});background-size: cover;"></div>
					@endforeach
				@endif
			</div>
			<div id="title_category">
				<h3>Categorias</h3>
			</div>

			<div id="category_container">
				
			</div>
		</div>
	</section>

	<!--ver lista de miembros-->
	<div id="modalMembersContainer">
		<div id="modalMembersMain">
			<div id="contentModalMembers">
				<h1>Lista de miembros</h1>
				@foreach($miembros as $miembro)
					<p>{{$miembro}}</p>
				@endforeach
			</div>
			<div id="closeModalMembers">
				<i class="bi bi-x-lg" id="closeGroup3"></i>
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