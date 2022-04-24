@extends("plantillas/final")

<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<section id="tutorial">
		<h1>Tutorial</h1>
		<div id="containerTutorial">
			<x-advice titulo="Crear recta" mensaje="Una vez estes en el tablero deberas pulsar el boton de crear recta (el 2 de la parte izquierda),tras esto pulsa en el lienzo dos veces,la primera contabilizará el inicio de la recta y la segunda el final." number="first"/>

			<x-advice titulo="Descargar dibujos" mensaje="Una vez creado tu dibujo,te dirigiras a tu dashboard,en esta podras ver un boton de descarga al pulsarlo te abrira un modal con el que podras elegir el formato de la imagen" number="second"/>

			<x-advice titulo="Crear circulos" mensaje="Una vez estes en el tablero deberas pulsar el boton de crear circulo (el 3 de la parte izquierda),tras esto para crear el circulo deberas pulsar (y mantener pulsado) el lienzo,cuando veas que tienes la dimension suelta el raton " number="third"/>

			<x-advice titulo="Crear cuadrados" mensaje="Una vez estes en el tablero deberas pulsar el boton de crear cuadrado (el 1 de la parte izquierda),tras esto para crear el cuadrado deberas pulsar (y mantener pulsado) el lienzo,cuando veas que tienes la dimension suelta el raton" number="fourth"/>

			<x-advice titulo="Cambiar relleno" mensaje="Una vez estes en el tablero deberas pulsar el boton de cambiar relleno (el 8 de la parte izquierda),tras esto se abrira un color picker,tras elegir color podras dibujar con el color seleccionado" number="fifth"/>

		</div>
	</section>

@extends("plantillas/cabecera")

