<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset("css/main.css")}}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<!--Jquery-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!--Snap-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js" integrity="sha512-Gk+uNk8NWN235mIkS6B7/424TsDuPDaoAsUekJCKTWLKP6wlaPv+PBGfO7dbvZeibVPGW+mYidz0vL0XaWwz4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!--subida.js-->
	<script src="{{asset("js/subida.js")}}"></script>
	<title>KUBIN</title>
</head>
<body>
	<section id="boardContainer">
		<!--atras-->
		<div id="atrasTablero">
				<svg viewBox="0 0 200 200">
					<line x1="82.39999999999998" x2="133.39999999999998" y1="106.2" y2="66.19999999999999" fill="#000000" stroke="#00000f" style="stroke-width: 7;" stroke-linecap="round"></line>
					<line x1="82.5" x2="133.5" y1="106.2" y2="148.2" fill="#000000" stroke="#00000f" style="stroke-width: 7;" stroke-linecap="round"></line>
					<line x1="103.5" x2="127.5" y1="105.2" y2="86.19999999999999" fill="#000000" stroke="#00000f" style="stroke-width: 3;"></line>
					<line x1="103.5" x2="127.5" y1="105.2" y2="126.19999999999999" fill="#000000" stroke="#00000f" style="stroke-width: 3;"></line>
					<circle cx="141.89999999999998" cy="105.7" r="2.5" fill="#000000" stroke="#00000f" style="stroke-width: 3;"></circle>
				</svg>
				<p>{{__("messages.m1_tab")}}</p>
			</a>
		</div>
		<!--tools2-->
	<div id="tools2">
		
		<div class="tool" id="seleccionar" title="{{__('messages.m2_tab')}}"><i class="bi bi-cursor"></i></div>
		<div class="tool" id="ellipse" title="{{__('messages.m3_tab')}}"><i class="bi bi-circle-square"></i></div>
		<div id="exportar" title="{{__('messages.m4_tab')}}" class="tool"><i class="bi bi-check-lg"></i></i></div>
		<div id="borrarTotal" class="tool" title="{{__('messages.m5_tab')}}"><i class="bi bi-trash3"></i></div>
		<div id="borrarSelectivo" class="tool" title="{{__('messages.m6_tab')}}"><i class="bi bi-skip-backward"></i></div>

		@if(Auth::user()->perfUsu==2)
			<div id="gradient" class="tool" title="{{__('messages.m7_tab')}}"><i class="bi bi-rainbow"></i></div>

			<div id="use" class="tool" title="{{__('messages.m8_tab')}}"><i class="bi bi-cursor-fill"></i></div>
		@endif
	</div>

		<div id="board">
			<div id="punteros"></div>
		</div>
		<div id="tools">
			<div id="sqr" class="tool" title="{{__('messages.m9_tab')}}"><i class="bi bi-square"></i></div>
			<div id="recta" class="tool" title="{{__('messages.m10_tab')}}"><i class="bi bi-slash-lg"></i></div>
			<div id="circle" class="tool" title="{{__('messages.m11_tab')}}"><i class="bi bi-circle"></i></div>
			<div id="curve" class="tool" title="{{__('messages.m12_tab')}}"><i class="bi bi-activity"></i></div>
			<div id="freet" class="tool" title="{{__('messages.m13_tab')}}"><i class="bi bi-brush"></i></div>
			<div id="color" class="tool" title="{{__('messages.m14_tab')}}">
				<i class="bi bi-palette" id="colorEmu"></i>
				<input type="color" id="colorPicker">
			</div>
			<div id="grosor" title="{{__('messages.m15_tab')}}" class="tool">
				<i class="bi bi-border-width" id="openGrosor"></i>

			</div>
			<div id="fillContainer" class="tool" title="{{__('messages.m16_tab')}}">
				<i class="bi bi-paint-bucket" id="fillEmu"></i>
				<input type="color" id="fill">
			</div>

			@if(Auth::user()->perfUsu==2)
				<div id="texto" class="tool"><i class="bi bi-fonts" title="{{__('messages.m17_tab')}}"></i></div>
				
				<div class="tool" id="changeBg" title="{{__('messages.m18_tab')}}">
					<i class="bi bi-back" id="triggerBg"></i>
					<input type="color" id="chbg">
				</div>
			@endif
			
		</div>
		<div id="coor" title="Coordenadas del puntero">
			<h4 id="coorX">X:</h4>
			<h4 id="coorY">Y:</h4>
		</div>



		<!--Componentes-->	
		<div id="textoInput">
			<textarea name="" id="area" cols="30" rows="10"></textarea>
		</div>

		@isset($id)
			@if($id!=null)
				<!--tablero.js-->
				
				<script>
					let a='<?= html_entity_decode($path) ?>';
					pintar(a);
				</script>
				<input type="hidden" id="idAct" value="{{$id}}">
			@endif
		@endisset
		
		

	</section>

	<!--Nombre lienzo-->
	<div id="namingContainer">
		<h1>Asigna un nombre</h1>
		<div id="namingLoader">
			<p>Subiendo lienzo:</p>
			<div id="loader"></div>
		</div>
		<textarea id="nameLienzo" cols="30" rows="4" maxlength="50">@isset($nombre){{$nombre}}@endisset</textarea>
		<div>
			<button id="naming">Asignar</button>
			<button id="cancellNaming">Cancelar</button>
		</div>
		
	</div>

	<!---done fill-->
	<div id="doneFill">
		<div id="cancelFill" class="tool"><button>Done fill</button></div>
	</div>

	<!--grosor-->
	<div id="grosorContainer">
		<p>Varia el grosor del trazo: &nbsp;</p>
		<input type="range" min="1" max="10" id="grosorPicker">
	</div>

	<!--Gradient-->
	<div id="gradientContainer">
		<div id="contentGradient">
			<h3>creacion de gradientes</h3>
			<h4>Tipo de gradiente</h4>
			<select id="gradientType">
				<option value="linear">Linear</option>
			</select>
			<select id="verticalidad">
				<option value="AB">arriba a abajo</option>
				<option value="ID">izquierda a derecha</option>
			</select>

			<div>Color1:<input type="color" id="c1"></div>
			<div>Color2:<input type="color" id="c2"></div>
			<button id="crearGradient">Crear</button>
		</div>
		<div id="cancellGradient">
			<i class="bi bi-x-lg"></i>
		</div>
	</div>

	
</body>

	<!--tablero.js-->
	<script src="{{asset("js/tablero.js")}}"></script>
	<!--efectos mo.js-->
	<script src="https://cdn.jsdelivr.net/mojs/0.265.6/mo.min.js"></script>
	<script src="https://cdn.jsdelivr.net/mojs-player/0.43.15/mojs-player.min.js"></script>
	<script src="{{asset("js/mo.js")}}"></script>

</html>


