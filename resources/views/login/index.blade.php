@extends("plantillas/final")

	<x-cabecera title="true" tutorial="true" showcase="true" github="true" log="false"/>

	<section id="containerLogin">
		<section id="login">
			<div id="signIn">
				
				<p>Bienvenid@ de nuevo a kubin</p>
				<div id="formIn">
					<form method="POST" action="{{ route('login') }}">
						 @csrf
						<div>
							<label for="emailIn">Email</label>
						    <input type="email" id="emailIn" name="email" placeholder="Escribe aqui">
						</div>

                        <div>
                        	<label for="passIn">Pass</label>
						    <input type="password" id="passIn" name="password" placeholder="Escribe aqui">
                        </div>

                       <div id="btnIn">
                       	 <button>Acceder</button>
                       </div>
					</form>
				</div>
			</div>
			<section id="signUp">
				
				<p>Bienvenid@ a kubin</p>
				<div id="formUp">
					<form method="post" action="{{route("registrar")}}">
						@csrf
						<div>
							<label for="nombreUp">Nombre</label>
						    <input type="text" name="nombreUp" id="nombreUp" placeholder="Escribe aqui">
						</div>

						<div>
							<label for="apeUp">Apellidos</label>
						    <input type="text" id="apeUp" name="apellidosUp" placeholder="Escribe aqui">
						</div>

						<div>
							<label for="emailUp">Email</label>
						    <input type="email" id="emailUp" name="emailUp" placeholder="Escribe aqui">
						</div>

                        <div>
                        	<label for="passUp">Pass</label>
						    <input type="text" id="passUp" name="passUp" placeholder="Escribe aqui">
                        </div>

                         <div id="btnUp">
                       		 <button>Registrar</button>
                       	</div>

					</form>
				</div>
			</section>
			<section id="overlay">
				<button id="changeLogin">Sign up</button>

			</section>
		</section>
	</section>

@extends("plantillas/cabecera")