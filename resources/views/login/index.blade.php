@extends("plantillas/final")

	<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>

	<section id="containerLogin">
		<section id="login">
			<div id="signIn">
				
				<p>{{__('messages.tit1_in')}}</p>
				<div id="formIn">
					<form method="POST" action="{{ route('login') }}">
						 @csrf
						<div>
							<label for="emailIn">{{__('messages.men1_in')}}</label>
						    <input type="email" id="emailIn" name="email" placeholder="{{__('messages.placeholder')}}">
						</div>

                        <div>
                        	<label for="passIn">{{__('messages.men2_in')}}</label>
						    <input type="password" id="passIn" name="password" placeholder="{{__('messages.placeholder')}}">
                        </div>

                       <div id="btnIn">
                       	 <button>{{__('messages.men3_in')}}</button>
                       </div>
					</form>
				</div>
			</div>
			<section id="signUp">
				
				<p>{{__('messages.tit1_up')}}</p>
				<div id="formUp">
					<form method="post" action="{{route("registrar")}}">
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
						    <input type="text" id="passUp" name="passUp" placeholder="{{__('messages.placeholder')}}">
                        </div>

                         <div id="btnUp">
                       		 <button>{{__('messages.men3_up')}}</button>
                       	</div>

					</form>
				</div>
			</section>
			<section id="overlay">
				<button id="changeLogin">{{__('messages.log_change')}}</button>

			</section>
		</section>
	</section>

@extends("plantillas/cabecera")