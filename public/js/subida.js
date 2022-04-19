//importar


var t;
var argConsole;
var doc;
var xmlString;
var s;


function pintar(arg) {

	let h=0;
	let w=0;


	if(screen.width>900) {
	 h=VhToPx(60);
	 w=VwToPx(30);
	} else {
	  h=VhToPx(55);
	  w=VwToPx(80);
	}

	s=Snap(w,h);
	s.attr({ id: 'lienzo' });


	argConsole=arg;
	xmlString = arg;
	console.log(arg);

	var snip = Snap.parse(xmlString);
	console.log(snip);
	s.append(snip);
	
}

function VwToPx(param) {
		return (param*window.innerWidth)/100;
	}

	function VhToPx(param) {
		return (param*window.innerHeight)/100;
	}


//fin importar