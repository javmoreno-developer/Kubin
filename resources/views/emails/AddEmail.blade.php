<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prueba de Correo</title>
</head>
<body>
	<h1>{{ $details["title"] }}</h1>

	<p>{{ $details["body"] }}</p>
	
	<br>

	<a href="{{route("addMember",$details['id'])}}">Acceder</a>
	<p>Adios.</p>
</body>
</html>