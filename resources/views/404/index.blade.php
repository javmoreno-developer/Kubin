@extends("plantillas/final")
<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="true"/>
	


<section id="total_error">
	<section class="error-container">
	  <span class="four"><span class="screen-reader-text">4</span></span>
	  <span class="zero"><span class="screen-reader-text">0</span></span>
	  <span class="four"><span class="screen-reader-text">4</span></span>
	</section>

	<div class="text">
		<span>Ooops...</span>
		<p>{{__("messages.main_404")}}</p>
	</div>
</section>


@extends("plantillas/cabecera")