@extends("plantillas/final")

	<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>

	<div id="call_free"></div>
	<!-- register variable is used to make the difference between sign up and sign in-->
	@if($register==false)
		<section class="login_container">
			<div class="oculto"></div>
			<div class="login_main">
				<p>{{__('messages.tit1_in')}}</p>
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<div>
						<label for="emailIn">{{__('messages.men1_in')}}</label>
					    <input type="email" id="emailIn" name="email" placeholder="{{__('messages.placeholder')}}">
					</div>

                     <div>
                       	<label for="passIn">{{__('messages.men2_in')}}</label>
                       	<section class="passLog">
					    <input type="password" id="passIn" name="password" placeholder="{{__('messages.placeholder')}}">
					    <i class="bi bi-eye-slash-fill" id="showIn"></i>	
                       	</section>
                    </div>

                    <div id="btnIn">
                    	<button>{{__('messages.men3_in')}}</button>
                    </div>
				</form>
			</div>
		</section>
		<div id="aw">
			<p>{{__("messages.m4_lo")}}</p>
			<a class="loginEnlace" href="{{route("register")}}">{{__("messages.men3_up")}}</a>
		</div>

	@else 
	<!-- Sign up form -->
		<section class="login_container">
			<div class="oculto"></div>
			<div class="login_main">
				<p>{{__('messages.tit1_up')}}</p>
				<form method="post" id="form_register" action="{{route("register")}}">
					@csrf
					<div>
						<label for="nombreUp">{{__('messages.men1_up')}}</label>
					    <input type="text" name="nombreUp" id="nombreUp" placeholder="{{__('messages.placeholder')}}">
					</div>

					<div>
						<label for="apeUp">{{__('messages.men2_up')}}</label>
					    <input type="text" id="apeUp" name="apellidosUp" placeholder="{{__('messages.placeholder')}}">
					</div>

					<div>
						<label for="emailUp">{{__('messages.men1_in')}}</label>
					    <input type="email" id="emailUp" name="emailUp" placeholder="{{__('messages.placeholder')}}">
					</div>

                    <div>
                       	<label for="passUp">{{__('messages.men2_in')}}</label>
					    <section class="passLog">
					    <input type="password" id="passUp" name="passUp" placeholder="{{__('messages.placeholder')}}">
					    <i class="bi bi-eye-slash-fill" id="showUp"></i>	
                       	</section>
                    </div>

                    <div>
                    	<label for="prem">{{__("messages.m5_lo")}}</label>
                    	<div id="premium_container">
                    		<input type="checkbox" name="prem" id="prem">
	                    	<svg id="crown" viewBox="0 0 300 300">
	                    		<g transform="translate(128 128) scale(0.72 0.72)" style="">
								<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(-175.05 -175.05000000000004) scale(3.89 3.89)" >
								<path id="crown_path" d="M 78.517 77.617 H 11.483 c -0.951 0 -1.77 -0.669 -1.959 -1.601 L 0.041 29.542 c -0.159 -0.778 0.157 -1.576 0.806 -2.034 c 0.648 -0.459 1.506 -0.489 2.186 -0.079 l 25.585 15.421 l 14.591 -29.358 c 0.335 -0.674 1.021 -1.104 1.774 -1.11 c 0.709 -0.003 1.445 0.411 1.792 1.08 l 15.075 29.1 L 86.968 27.43 c 0.681 -0.41 1.537 -0.379 2.186 0.079 s 0.965 1.256 0.807 2.034 l -9.483 46.474 C 80.286 76.948 79.467 77.617 78.517 77.617 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
								</g>
								</g>
	                    	</svg>
                    	</div>

                    </div>

                    <div id="btnUp">
                        <button>{{__('messages.men3_up')}}</button>
                    </div>

				</form>
			</div>
		</section>
		<div id="aq">
			<p>{{__('messages.m6_lo')}}</p>
			<a class="loginEnlace" href="{{route("login")}}">{{__('messages.m7_lo')}}</a>
		</div>

		
	@endif

@extends("plantillas/cabeceraSin")