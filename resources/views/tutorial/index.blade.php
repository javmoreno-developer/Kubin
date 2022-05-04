@extends("plantillas/final")

<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>
	<section id="tutorial">
		<h1>Tutorial</h1>
		<section id="first-timeline">
			<div class="timeline">
			</div>

			<svg id="first" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>

		</section>
		<section id="second-timeline">
			<div class="timeline">

			</div>
			<svg id="second" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>
			<svg id="third" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>
		</section>
		<section id="third-timeline">
			<div class="timeline"></div>
			<svg id="fourth" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>
			<svg id="fifth" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>
		</section>
		<section id="fourth-timeline">
			<div class="timeline"></div>
			<svg id="six" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>
			<svg id="seven" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>
		</section>
		<section id="fifth-timeline">
			<div class="timeline"></div>
			<svg id="eight" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>
			<svg id="noveno" class="circle" viewBox="0 0 100 400"><circle class="at" cx="154.39999999999998" cy="224.7" r="106.5" style="stroke-width: 1;" fill="#000000" stroke="#00000f"></circle></svg>
		</section>
		<section id="sixth-timeline">
			<div class="timeline"></div>
			
		</section>
		<a href="/showcase">Conseguido</a>
	</section>

<div id="advices">
	<x-advice titulo="{{__('messages.tit1_1_tut')}}" mensaje="{{__('messages.men1_1_tut')}}" number="first"/>
	<x-advice titulo="{{__('messages.tit1_2_tut')}}" mensaje="{{__('messages.men1_2_tut')}}" number="second"/>
	<x-advice titulo="{{__('messages.tit1_3_tut')}}" mensaje="{{__('messages.men1_3_tut')}}" number="third"/>
	<x-advice titulo="{{__('messages.tit1_4_tut')}}" mensaje="{{__('messages.men1_4_tut')}}" number="fourth"/>
	<x-advice titulo="{{__('messages.tit1_5_tut')}}" mensaje="{{__('messages.men1_5_tut')}}" number="fifth"/>

</div>
@extends("plantillas/cabecera")

