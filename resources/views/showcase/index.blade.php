@extends("plantillas/final")
<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<div id="showcaseContainer">
		<h1>Showcase</h1>
		<div id="imagesShow">
			<!-- These are the showcase components -->
			<x-showcase descripcion="categoria" number="showfirst" svg=1/>
			<x-showcase descripcion="categoria" number="showsecond" svg=2/>
			<x-showcase descripcion="categoria" number="showthird" svg=3/>
			<x-showcase descripcion="categoria" number="showfourth" svg=4/>
			<x-showcase descripcion="categoria" number="showfifth" svg=5/>
			<x-showcase descripcion="categoria" number="showsix" svg=6/>
			<x-showcase descripcion="categoria" number="showseven" svg=7/>
		</div>
		
	</div>

@extends("plantillas/cabecera")