//importar
function pintar(arg) {
	let h=VhToPx(100);
	let w=VwToPx(100)-90;
	s=Snap(w,h);
	s.attr({ id: 'lienzo' });


	console.log(arg);
	argConsole=arg;
	 xmlString = arg;

	var snip = Snap.parse(xmlString);
	s.append(snip);
	
}

function VwToPx(param) {
		return (param*window.innerWidth)/100;
	}

	function VhToPx(param) {
		return (param*window.innerHeight)/100;
	}

//fin importar