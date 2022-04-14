//importar


var t;
var argConsole;
var doc;
var xmlString;
var s;


function pintar(arg) {
	let h=VhToPx(100)-2;
	//let w=VwToPx(100)-90;
	let w=VwToPx(100);
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