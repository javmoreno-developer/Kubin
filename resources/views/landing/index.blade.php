@extends("plantillas/final")
<meta name="csrf-token" content="{{ csrf_token() }}" />
	<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="true"/>
	<!--1 seccion (header)-->
	<section id="firstSection">
		<div id="containerFirst">

			<svg width="127.15614mm"height="130.57559mm"viewBox="0 0 127.15614 130.57559"version="1.1"id="logo"inkscape:version="1.1.1 (3bf5ae0d25, 2021-09-20)"sodipodi:docname="KUBIN.svg"xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"xmlns="http://www.w3.org/2000/svg"xmlns:svg="http://www.w3.org/2000/svg"> <sodipodi:namedview id="namedview7"pagecolor="#ffffff"bordercolor="#666666"borderopacity="1.0"inkscape:pageshadow="2"inkscape:pageopacity="0.0"inkscape:pagecheckerboard="0"inkscape:document-units="mm"showgrid="false"inkscape:zoom="0.72337262"inkscape:cx="-222.56856"inkscape:cy="335.23525"inkscape:window-width="1920"inkscape:window-height="1001"inkscape:window-x="-9"inkscape:window-y="-9"inkscape:window-maximized="1"inkscape:current-layer="layer1"fit-margin-top="0"fit-margin-left="0"fit-margin-right="0"fit-margin-bottom="0" /> <defs id="defs2" /> <g inkscape:label="Capa 1"inkscape:groupmode="layer"id="layer1"transform="translate(-40.664536,-59.922427)">  <ellipse class="thirdly" id="path31-8"cx="102.96255"cy="129.11481"rx="56.739517"ry="53.630341" style="stroke:var(--texto)"/>  <ellipse class="secondly" style="fill:none;stroke:var(--texto);stroke-width:0.974098;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0"id="path31-8-0-7"cx="102.84927"cy="129.56007"rx="45.745026"ry="43.347385" /> 
    		<text  class="text-logo" xml:space="preserve"style="font-style:normal;font-weight:normal;font-size:12.5279px;line-height:1.25;font-family:sans-serif;"x="90.394997"y="122.84196" transform="scale(0.92550036,1.0804966)">
      		<tspan sodipodi:role="line" class="text-logo" x="90.394997"y="122.84196">KUBIN</tspan>
    		</text> 
  			</g> 
		  </svg>


			<div id="textFirst">
				<h1> {{__('messages.titulo_landing')}} <div id="changeWord">{{__("messages.sub_landing")}}</div></h1>
				
				
				<p>{{__('messages.men1_1_landing')}}</p>

				
			</div>
			
		</div>
		<div id="buttonDown">
				<div id="outliner">
					<i class="bi bi-arrow-down"></i>
				</div>
			</div>
	</section>

	<!--2 seccion ¿Que es kubin?-->
	<section id="secondSection">
		<div id="text">
			<h1 class="title">{{__("messages.title1_2_landing")}}</h1>
			<div class="pretext"> 
				<p class="texto">{{__("messages.men1_2_landing")}}</p>
			
			    <p class="texto">{{__("messages.men2_2_landing")}}</p>
			</div>
		</div>
		<div id="image">
			<svg viewBox="0 0 407.15614 500.57559"><rect x="0" y="0" width="460.8" height="412.4" fill="var(--body)" style=""></rect><circle class="fade" id="circ1" cx="154.39999999999998" cy="124.69999999999999" r="72.5" fill="#FAFAFA" stroke="#00000f" style="stroke-width: 0;stroke: var(--texto);fill: none;"></circle><circle class="fade" id="circ2" cx="154.39999999999998" cy="270.69999999999999" r="72.5" fill="#FAFAFA" stroke="#00000f" style="stroke-width: 0;stroke: var(--texto);fill: none;"></circle><circle id="circ3" class="fade" cx="300" cy="270.69999999999999" r="72.5" fill="#FAFAFA" stroke="#00000f" style="stroke-width: 0;stroke: var(--texto);fill: none;"></circle><circle id="circ4" class="fade" cx="300" cy="124.69999999999999" r="72.5" fill="#FAFAFA" stroke="#00000f" style="stroke-width: 0;stroke: var(--texto);fill: none;"></circle></svg>
		</div>
	</section>

	<!--3 seccion Creadores-->
	<section id="thirdSection">
		<div id="text">
			<h1 class="title">{{__("messages.title1_3_landing")}}</h1>
			<p class="texto">{{__("messages.men1_3_landing")}}</p>
			<p class="texto">{{__("messages.men2_3_landing")}}</p>
		</div>

		<div id="pictureContainer">
			<div id="pictures">
				<div id="p1" class="picture">
					<svg viewBox="0 0 400 300" id="clock">
						<circle cx="209.39999999999998" cy="194.7" r="85.5" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></circle><line x1="205.39999999999998" x2="205.39999999999998" y1="191.2" y2="191.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></line><line x1="205.39999999999998" x2="205.39999999999998" y1="144.2" y2="144.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></line><line x1="205.39999999999998" x2="205.39999999999998" y1="144.2" y2="144.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></line><line x1="208.39999999999998" x2="208.39999999999998" y1="192.2" y2="192.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></line><line x1="207.39999999999998" x2="207.39999999999998" y1="189.2" y2="134.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></line><line x1="207.39999999999998" x2="182.39999999999998" y1="186.2" y2="218.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></line><line x1="155.39999999999998" x2="133.39999999999998" y1="262.2" y2="286.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></line><line x1="258.4" x2="278.4" y1="265.2" y2="287.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></line><rect x="195.39999999999998" y="92.19999999999999" width="22" height="10" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><line x1="175.39999999999998" x2="234.39999999999998" y1="88.19999999999999" y2="88.19999999999999" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></line>
					</svg>
				</div>
				<div id="p2" class="picture">
					<svg viewBox="0 0 400 300">
						<circle cx="202.39999999999998" cy="203.7" r="79.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f" id="alert"></circle><line x1="197.39999999999998" x2="197.39999999999998" y1="161.2" y2="245.2" fill="#000000" stroke="#ffffff" style="stroke-width: 10;" stroke-linecap="round"></line><line x1="195.39999999999998" x2="195.39999999999998" y1="235.2" y2="235.2" fill="#000000" stroke="#ffffff" style="stroke-width: 10;" stroke-linecap="round"></line><line x1="195.39999999999998" x2="160.39999999999998" y1="245.2" y2="198.2" fill="#000000" stroke="#ffffff" style="stroke-width: 10;" stroke-linecap="round"></line><line x1="200.39999999999998" x2="228.39999999999998" y1="245.2" y2="198.2" fill="#000000" stroke="#ffffff" style="stroke-width: 10" stroke-linecap="round"></line>
					</svg>
				</div>
				<div id="p3" class="picture">
					<svg viewBox="0 0 300 500">
						<ellipse cx="129.39999999999998" cy="153.2" rx="59" ry="67"></ellipse><path d="M  93.39999999999998 142.2 Q 99.39999999999998 113.19999999999999 120.39999999999998 107.19999999999999" fill="none" stroke="#ffffff" style="stroke-width: 10;"></path><line x1="124.39999999999998" x2="112.39999999999998" y1="200.2" y2="236.2" fill="#1c0d0d" stroke="#0a0a0a" style="stroke-width: 10;"></line><line x1="134.39999999999998" x2="142.39999999999998" y1="200.2" y2="236.2" fill="#1c0d0d" stroke="#0a0a0a" style="stroke-width: 10;"></line><line x1="108" x2="147.39999999999998" y1="236.2" y2="235.2" fill="#1c0d0d" stroke="#0a0a0a" style="stroke-width: 10;"></line><path d="M 119.39999999999998 224.2 L 119.39999999999998 224.2 L 120.39999999999998 224.2 L 121.39999999999998 224.2 L 122.39999999999998 224.2 L 124.39999999999998 224.2 L 125.39999999999998 224.2 L 126.39999999999998 224.2 L 126.39999999999998 224.2 L 127.39999999999998 224.2 L 128.39999999999998 224.2 L 129.39999999999998 224.2 L 130.39999999999998 224.2 L 130.39999999999998 224.2 L 130.39999999999998 224.2" fill="none" stroke="#0a0a0a" style="stroke-width: 10;"></path><path d="M 118.39999999999998 228.2 L 118.39999999999998 228.2 L 119.39999999999998 228.2 L 120.39999999999998 228.2 L 121.39999999999998 228.2 L 122.39999999999998 228.2 L 122.39999999999998 228.2 L 123.39999999999998 228.2 L 124.39999999999998 228.2 L 125.39999999999998 228.2 L 126.39999999999998 228.2 L 126.39999999999998 228.2 L 127.39999999999998 228.2 L 128.39999999999998 228.2 L 129.39999999999998 228.2 L 130.39999999999998 228.2 L 130.39999999999998 228.2 L 131.39999999999998 228.2 L 132.39999999999998 228.2 L 133.39999999999998 228.2 L 134.39999999999998 228.2 L 134.39999999999998 228.2 L 134.39999999999998 228.2" fill="none" stroke="#0a0a0a" style="stroke-width: 10;"></path><path d="M 129.39999999999998 218.2 L 129.39999999999998 218.2 L 130.39999999999998 218.2 L 130.39999999999998 218.2 L 132.39999999999998 219.2 L 133.39999999999998 219.2 L 134.39999999999998 220.2 L 134.39999999999998 220.2 L 135.39999999999998 221.2 L 136.39999999999998 221.2 L 137.39999999999998 221.2 L 138.39999999999998 221.2 L 138.39999999999998 221.2" fill="none" stroke="#0a0a0a" style="stroke-width: 10;"></path><path d="M 131.39999999999998 222.2 L 131.39999999999998 222.2 L 131.39999999999998 223.2 L 132.39999999999998 224.2 L 133.39999999999998 224.2 L 133.39999999999998 225.2 L 133.39999999999998 226.2 L 134.39999999999998 226.2 L 134.39999999999998 226.2 L 135.39999999999998 226.2 L 135.39999999999998 227.2 L 135.39999999999998 228.2 L 136.39999999999998 228.2 L 137.39999999999998 228.2 L 136.39999999999998 228.2 L 135.39999999999998 228.2 L 134.39999999999998 228.2 L 134.39999999999998 228.2 L 134.39999999999998 227.2 L 134.39999999999998 226.2 L 134.39999999999998 226.2" fill="none" stroke="#0a0a0a" style="stroke-width: 10;"></path><path id="bal" d="M  126.39999999999998 234.2 Q 142.39999999999998 290.2 127.39999999999998 314.2" fill="none" stroke="#0a0a0a" style="stroke-width: 10;"></path>
					</svg>
				</div>
				<div id="p4" class="picture">
					<svg viewBox="0 0 400 300" id="walletSvg">
						<rect x="100.39999999999998" y="153.2" width="200" height="129" fill="#ffffff" stroke="#00000f" style="stroke-width: 8;" rx="6" ry="6"></rect><path d="M 175.39999999999998 154.2 L 175.39999999999998 154.2 L 175.39999999999998 153.2 L 175.39999999999998 152.2 L 175.39999999999998 150.2 L 175.39999999999998 149.2 L 175.39999999999998 148.2 L 175.39999999999998 146.2 L 176.39999999999998 144.2 L 176.39999999999998 143.2 L 177.39999999999998 142.2 L 177.39999999999998 142.2 L 178.39999999999998 142.2 L 178.39999999999998 141.2 L 179.39999999999998 139.2 L 179.39999999999998 138.2 L 179.39999999999998 138.2 L 180.39999999999998 138.2 L 181.39999999999998 137.2 L 181.39999999999998 136.2 L 181.39999999999998 135.2 L 182.39999999999998 134.2 L 182.39999999999998 134.2 L 183.39999999999998 134.2 L 183.39999999999998 132.2 L 183.39999999999998 131.2 L 184.39999999999998 130.2 L 185.39999999999998 130.2 L 186.39999999999998 129.2 L 186.39999999999998 128.2 L 187.39999999999998 127.19999999999999 L 188.39999999999998 126.19999999999999 L 190.39999999999998 126.19999999999999 L 190.39999999999998 126.19999999999999 L 191.39999999999998 126.19999999999999 L 192.39999999999998 126.19999999999999 L 193.39999999999998 125.19999999999999 L 194.39999999999998 124.19999999999999 L 195.39999999999998 124.19999999999999 L 197.39999999999998 123.19999999999999 L 198.39999999999998 123.19999999999999 L 198.39999999999998 123.19999999999999 L 200.39999999999998 123.19999999999999 L 201.39999999999998 123.19999999999999 L 202.39999999999998 122.19999999999999 L 203.39999999999998 122.19999999999999 L 204.39999999999998 122.19999999999999 L 205.39999999999998 122.19999999999999 L 206.39999999999998 122.19999999999999 L 206.39999999999998 122.19999999999999 L 207.39999999999998 122.19999999999999 L 208.39999999999998 122.19999999999999 L 209.39999999999998 122.19999999999999 L 210.39999999999998 122.19999999999999 L 210.39999999999998 122.19999999999999 L 211.39999999999998 122.19999999999999 L 212.39999999999998 122.19999999999999 L 213.39999999999998 122.19999999999999 L 214.39999999999998 122.19999999999999 L 214.39999999999998 122.19999999999999 L 215.39999999999998 123.19999999999999 L 216.39999999999998 124.19999999999999 L 217.39999999999998 125.19999999999999 L 218.39999999999998 126.19999999999999 L 219.39999999999998 126.19999999999999 L 221.39999999999998 127.19999999999999 L 222.39999999999998 129.2 L 222.39999999999998 130.2 L 222.39999999999998 130.2 L 223.39999999999998 130.2 L 223.39999999999998 131.2 L 224.39999999999998 132.2 L 224.39999999999998 133.2 L 225.39999999999998 133.2 L 226.39999999999998 134.2 L 226.39999999999998 134.2 L 226.39999999999998 134.2 L 226.39999999999998 135.2 L 227.39999999999998 136.2 L 227.39999999999998 137.2 L 228.39999999999998 138.2 L 228.39999999999998 139.2 L 228.39999999999998 140.2 L 229.39999999999998 140.2 L 229.39999999999998 141.2 L 230.39999999999998 142.2 L 230.39999999999998 142.2 L 230.39999999999998 143.2 L 230.39999999999998 144.2 L 230.39999999999998 144.2 L 230.39999999999998 145.2 L 230.39999999999998 146.2 L 230.39999999999998 146.2 L 230.39999999999998 147.2 L 231.39999999999998 148.2 L 231.39999999999998 149.2 L 231.39999999999998 150.2 L 231.39999999999998 150.2 L 232.39999999999998 150.2 L 232.39999999999998 151.2 L 232.39999999999998 151.2" fill="none" stroke="#00000f" style="stroke-width: 8;"></path><line x1="168.39999999999998" x2="192.39999999999998" y1="205.2" y2="230.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 8;"></line><line x1="192.39999999999998" x2="231.39999999999998" y1="235.2" y2="194.2" fill="#ffffff" stroke="#00000f" style="stroke-width: 8;"></line>
					</svg>
				</div>
				<div id="p5" class="picture">
					<svg viewBox="0 0 400 300">
						<rect x="116.39999999999998" y="135.2" width="131" height="196" fill="#fcfcfc" stroke="#00000f" style="stroke-width: 10;" rx="6"></rect><rect x="136.39999999999998" y="153.2" width="86" height="22" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect class="unactive" x="133.39999999999998" y="206.2" width="18" height="14" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect x="173.39999999999998" y="206.2" width="18" height="14" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect class="unactive" x="213.39999999999998" y="206.2" width="18" height="14" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect x="133.39999999999998" y="246.2" width="18" height="14" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect x="173.39999999999998" y="246.2" width="18" height="14" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect x="213.39999999999998" y="246.2" width="18" height="54" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect x="133.39999999999998" y="286.2" width="18" height="14" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect x="173.39999999999998" y="286.2" width="18" height="14" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect><rect x="214.39999999999998" y="299.2" width="0" height="0" fill="#0d0d0d" stroke="#00000f" style="stroke-width: 10;"></rect>
					</svg>
				</div>
				<div id="p6" class="picture">
					<svg viewBox="0 0 400 500" id="cubSvg">
						<line x1="106.39999999999998" x2="106.39999999999998" y1="190.7" y2="317.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;" stroke-linecap="round"></line><line x1="110.39999999999998" x2="184.39999999999998" y1="194.2" y2="226.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line><line x1="107.39999999999998" x2="180.39999999999998" y1="314.2" y2="346.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;" stroke-linecap="round"></line><line x1="180.39999999999998" x2="180.39999999999998" y1="342.2" y2="223.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line><line x1="182.39999999999998" x2="245.39999999999998" y1="342.2" y2="314.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line><line x1="182.39999999999998" x2="245.39999999999998" y1="222.2" y2="194.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line><line x1="244.39999999999998" x2="244.39999999999998" y1="189.7" y2="318.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;" stroke-linecap="round"></line><line x1="245.39999999999998" x2="179.39999999999998" y1="190.2" y2="155.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line><line x1="107.39999999999998" x2="182.39999999999998" y1="190.2" y2="156.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line>
					</svg>
				</div>
				<div id="p7" class="picture">
					<svg viewBox="0 0 400 400" id="bull">
						<circle cx="196.89999999999998" cy="230.2" r="95" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></circle><circle cx="193.89999999999998" cy="227.7" r="59.5" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></circle><circle cx="192.39999999999998" cy="226.2" r="32" fill="#ffffff" stroke="#00000f" style="stroke-width: 10;"></circle><circle cx="192.39999999999998" cy="225.2" r="14" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></circle>
					</svg>
				</div>
			</div>
		</div>

		<div id="thirdBtn">
			<a href="{{route("showcase")}}">{{__("messages.men3_3_landing")}} <i class="bi bi-arrow-right"></i> </a>	
		</div>
		
	</section>

	<!--4 seccion cree y edite-->
	<section id="fourthSection">
		<div id="text">
			<div id="titleFourth">
				<h1 class="title">{{__("messages.title1_4_landing")}}</h1>
			    <h1 class="title">{{__("messages.title2_4_landing")}}</h1>
			</div>
			<div id="pretext2">
				<p class="texto">{{__("messages.men1_4_landing")}}</p>
			</div>
		</div>
		<div id="toolsLanding">
			<div class="toolLan" id="toolLan1">
				<div class="photoTool" id="photo1">
					<svg viewBox="0 0 327.15614 520.57559" id="plus">
						<line x1="197.39999999999998" x2="198.39999999999998" y1="176.2" y2="297.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line><line x1="138.39999999999998" x2="259.3999" y1="237.2" y2="237.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line>
					</svg>
				</div>
				<p>{{__("messages.men2_4_landing")}}</p>
			</div>
			<div class="toolLan" id="toolLan2">
				<div class="photoTool" id="photo2">
					<svg viewBox="0 0 477.15614 320.57559" id="shareSvg">
						<circle cx="294.4" cy="91.69999999999999" r="20.5" style="stroke-width: 10;" fill="#fffff" stroke="#00000f"></circle><line x1="278.4" x2="218.39999999999998" y1="105.19999999999999" y2="152.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line><circle cx="214.39999999999998" cy="160.7" r="14.5" fill="#fffff" stroke="#00000" style="stroke-width: 10;"></circle><line x1="230.39999999999998" x2="282.4" y1="170.2" y2="204.2" fill="#000000" stroke="#00000f" style="stroke-width: 10;"></line><circle cx="294.9" cy="212.2" r="14" fill="#fffff" stroke="#00000f" style="stroke-width: 10;"></circle>
					</svg>
				</div>
				<p>{{__("messages.men3_4_landing")}}</p>
			</div>
			<div class="toolLan" id="toolLan3">
				<div class="photoTool" id="photo3">
					<svg viewBox="0 0 447.15614 480.57559" id="imageSvg">
						<rect x="96.39999999999998" y="161.2" width="256" height="178" fill="#ffffff" stroke="#00000f" style="stroke-width: 9;"></rect><circle cx="156.39999999999998" cy="201.2" r="24" fill="#000000" stroke="#00000f" style="stroke-width: 9;"></circle><line x1="99.39999999999998" x2="150.39999999999998" y1="308.2" y2="276.2" fill="#000000" stroke="#00000f" style="stroke-width: 5;"></line><line x1="148.39999999999998" x2="182.39999999999998" y1="275.2" y2="302.2" fill="#000000" stroke="#00000f" style="stroke-width: 5;"></line><line x1="181.39999999999998" x2="266.4" y1="302.2" y2="252.2" fill="#000000" stroke="#00000f" style="stroke-width: 5;"></line><line x1="264.4" x2="348.4" y1="252.2" y2="286.2" fill="#000000" stroke="#00000f" style="stroke-width: 5;"></line>
					</svg>
				</div>
				<p>{{__("messages.men4_4_landing")}}</p>
			</div>
		</div>
		<div id="btnContainer">
			<a href="{{route("tutorial")}}">{{__("messages.men5_4_landing")}} <i class="bi bi-arrow-right"></i> </a>
		</div>
	</section>

	<!--5 seccion lleva tu juego-->
	<section id="fifthSection">
		<div id="fifthText">
			<p class="title">{{__("messages.title1_5_landing")}}</p>
			<h1 class="titleLeft">{{__("messages.men1_5_landing")}}</h1>
			<div id="fifthBtn">
				<a href="login">{{__("messages.men2_5_landing")}}</a>
			</div>
		</div>
		<div id="imageFifthContainer">
			<div id="imageFifth">
				<svg viewBox="0 0 327.15614 520.57559" id="arrow">
					<line  x1="130.39999999999998" x2="200.39999999999998" y1="368.2" y2="368.2" fill="#000000" stroke="var(--texto)" stroke-linecap="round" style="stroke-width: 7;"></line><line x1="130.39999999999998" x2="130.39999999999998" y1="368.2" y2="250.2" fill="#000000" stroke="var(--texto)" stroke-linecap="round" style="stroke-width: 7;"></line><line x1="200.39999999999998" x2="200.39999999999998" y1="368.2" y2="250.2" fill="#000000" stroke="var(--texto)" stroke-linecap="round"style="stroke-width: 7;"></line><line x1="198.39999999999998" x2="249.39999999999998" y1="250.2" y2="250.2" fill="#000000" stroke="var(--texto)" stroke-linecap="round" style="stroke-width: 7;"></line><line x1="130.39999999999998" x2="79.39999999999998" y1="249.2" y2="249.2" fill="#000000" stroke="var(--texto)" stroke-linecap="round" style="stroke-width: 7;"></line><line x1="249.39999999999998" x2="166.39999999999998" y1="250.2" y2="163.2" fill="#000000" stroke="var(--texto)" stroke-linecap="round" style="stroke-width: 7;"></line><line x1="80.39999999999998" x2="166.39999999999998" y1="249" y2="162.2" fill="#000000" stroke="var(--texto)" stroke-linecap="round" style="stroke-width: 7;"></line>
				</svg>
			</div>	
		</div>
		
	</section>

	<!--6 seccion footer-->
	<div id="footerContainer">
		<hr id="footerStart">
	</div>
	<section id="footer">
		<div id="logoSection">
			<div id="logoImage">
				
			<svg viewBox="0 0 127.15614 130.57559"version="1.1"id="logo"inkscape:version="1.1.1 (3bf5ae0d25, 2021-09-20)"sodipodi:docname="KUBIN.svg"xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"xmlns="http://www.w3.org/2000/svg"xmlns:svg="http://www.w3.org/2000/svg"> <sodipodi:namedview id="namedview7"pagecolor="#ffffff"bordercolor="#666666"borderopacity="1.0"inkscape:pageshadow="2"inkscape:pageopacity="0.0"inkscape:pagecheckerboard="0"inkscape:document-units="mm"showgrid="false"inkscape:zoom="0.72337262"inkscape:cx="-222.56856"inkscape:cy="335.23525"inkscape:window-width="1920"inkscape:window-height="1001"inkscape:window-x="-9"inkscape:window-y="-9"inkscape:window-maximized="1"inkscape:current-layer="layer1"fit-margin-top="0"fit-margin-left="0"fit-margin-right="0"fit-margin-bottom="0" /> <defs id="defs2" /> <g inkscape:label="Capa 1"inkscape:groupmode="layer"id="layer1"transform="translate(-40.664536,-59.922427)">  <ellipse class="thirdly" id="path31-8"cx="102.96255"cy="129.11481"rx="56.739517"ry="53.630341" style="stroke:var(--texto)"/>  <ellipse class="secondly" style="fill:none;stroke:var(--texto);stroke-width:0.974098;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0"id="path31-8-0-7"cx="102.84927"cy="129.56007"rx="45.745026"ry="43.347385" /> 
    		<text  class="text-logo" xml:space="preserve"style="font-style:normal;font-weight:normal;font-size:12.5279px;line-height:1.25;font-family:sans-serif;"x="90.394997"y="122.84196" transform="scale(0.92550036,1.0804966)">
      		<tspan sodipodi:role="line" class="text-logo" x="90.394997"y="122.84196">KUBIN</tspan>
    		</text> 
  			</g> 
		  </svg>

			</div>
			
		</div>
		<div id="textSection">
			<div class="textPr">
				<h1>{{__("messages.men_1_footer_landing")}}</h1>
				<select id="idiomaSelect">
					@if (session('idioma_session')=="es") 
						<option value="es" selected>{{__("messages.id_es")}}</option>
					@else
						<option value="es">{{__("messages.id_es")}}</option>
					@endif

					@if (session('idioma_session')=="en") 
						<option value="en" selected>{{__("messages.id_en")}}</option>
					@else
						<option value="en">{{__("messages.id_en")}}</option>
					@endif
					
					@if (session('idioma_session')=="fr") 
						<option value="fr" selected>{{__("messages.id_fr")}}</option>
					@else
						<option value="fr">{{__("messages.id_fr")}}</option>
					@endif
					
				</select>
				
				

			</div>
			<div class="textPr">
				<h1>{{__("messages.men2_footer_landing")}}</h1>
				<p>javmoreno766@gmail.com</p>
				
			</div>
		</div>
	</section>

	<!--loader
	<div class="loader_container">
	  <div class="span-container">
	    <span class="one"></span>
	    <span class="two"></span>
	    <span class="three"></span>
	    <span class="four"></span>
	  </div>
	</div>-->

@extends("plantillas/cabecera")