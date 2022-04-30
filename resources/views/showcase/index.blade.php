@extends("plantillas/final")
<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<div id="showcaseContainer">
		<h1>Showcase</h1>
		<div id="imagesShow">
			<x-showcase descripcion="categoria" number="showfirst" svg=23/>
			<x-showcase descripcion="categoria" number="showsecond" svg=24/>
			<x-showcase descripcion="categoria" number="showthird" svg=25/>
			<x-showcase descripcion="categoria" number="showfourth" svg=33/>
			<x-showcase descripcion="categoria" number="showfifth" svg=27/>
			<x-showcase descripcion="categoria" number="showsix" svg=30/>
			<x-showcase descripcion="categoria" number="showseven" svg=32/>
		</div>
		
	</div>

@extends("plantillas/cabecera")