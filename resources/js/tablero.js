//tablero
//coordenadas raton
$(document).mousemove((e)=> {
	$("#coorX").text("X: "+e.clientX);
	$("#coorY").text("Y: "+e.clientY);
});


//general
let h=VhToPx(100)-2;
let w=VwToPx(100);
var s=Snap(w,h);
s.attr({ id: 'lienzo' });
var arrayX=[];
var arrayY=[];
var colorTrazo="#00000f";
var grosorTrazo=1;
var fill="black";

//funciones de conversion
function VwToPx(param) {
	return (param*window.innerWidth)/100;
}

function VhToPx(param) {
	return (param*window.innerHeight)/100;
}

//sqr
$("#sqr").click(()=> {
	
	$("#board").mousedown((e)=> {
			arrayX.push(e.clientX);
			arrayX.push(e.clientY);
			console.log(arrayX);
	});

	$("#board").mouseup((e)=> {
		arrayY.push(e.clientY);
		arrayY.push(e.clientX);
		console.log(arrayY);
		console.log(arrayX);
		pintarSqr();
		arrayX=[];
		arrayY=[];
	});
});

function pintarSqr() {
	var rect=s.rect(arrayX[0],arrayX[1],(arrayY[1]-arrayX[0]),(arrayY[0]-arrayX[1])).click(function () {
	    
	    this.attr('fill', fill);

	});
}
//fin sqr
//recta
var rectaX=[];
var rectaY=[];
var contadorLineas=0;
$("#recta").click(()=> {
		$("#board").click((e)=> {
			if(contadorLineas<2) {
				rectaX.push(e.clientX);
				rectaY.push(e.clientY);
				contadorLineas++;
				if(contadorLineas==2) {
					dibujaLinea();
					rectaY=[];
					rectaX=[];
					contadorLineas=0;
				}
			} else {
				dibujaLinea();
			}
		});
});

function dibujaLinea() {
	console.log("h");
	var t1 = s.line(rectaX[0], rectaY[0], rectaX[1], rectaY[1]);
}
//fin recta
//circle
var circleCont=0;
var circleArray=[];

$("#circle").click(()=> {
	$("#board").mousedown((e)=> {
		circleArray.push(e.clientY);
		circleArray.push(e.clientX);
		console.log(circleArray);
	});

	$("#board").mouseup((e)=> {
		circleArray.push(e.clientY);
		circleArray.push(e.clientX);
		console.log(circleArray);
		pintarCircle();
		circleArray=[];
	});
});

function pintarCircle() {
	console.log("creando");
	var c = s.circle(((circleArray[1]+circleArray[3])/2), ((circleArray[0]+circleArray[2])/2), ((circleArray[2]-circleArray[0])/2));
}
//fin circle

//curve
var curveArray=[];
var contadorCurve=0;

$("#curve").click(()=> {
	$("#board").click((e)=> {
		if(contadorCurve<3) {
			let aux=[e.clientX,e.clientY];
			console.log(aux);
			curveArray.push(aux);
			contadorCurve++;
		} else {
			console.log(curveArray);
			pintarCurva();
			contadorCurve=0;
			curveArray=[];
		}
	});
});
function pintarCurva() {
    let a=`M  ${curveArray[0][0]} ${curveArray[0][1]} C ${curveArray[0][0]} ${curveArray[0][1]} ${curveArray[1][0]} ${curveArray[1][1]} ${curveArray[2][0]} ${curveArray[2][1]}`;
    console.log(a);
    var myPath = s.path(a).attr({
        fill: "none",
        stroke: colorTrazo,
        strokeWidth: grosorTrazo
    });
}
//fin curve

//dibujo libre
var arrayFree=[];
var inicio=false;

$("#freet").click(()=> {
	$("#board").mousedown((e)=> {
		let aux=[e.clientX,e.clientY];
		arrayFree.push(aux);
		inicio=true;
	});

	$("#board").mousemove((e)=> {
		if(inicio==true) {
			let aux=[e.clientX,e.clientY];
			arrayFree.push(aux);
		}
	});

	$("#board").mouseup((e)=> {
		console.log("inicio: "+inicio);
		let aux=[e.clientX,e.clientY];
		arrayFree.push(aux);
		pintarFreet();
		arrayFree=[];
		inicio=false;
	});
});

function pintarFreet() {
	console.log(arrayFree);
	//let a="M "+curveArray[0][0]+" 90 C 200  90 0 0 90  300";
	let a=`M ${arrayFree[0][0]} ${arrayFree[0][1]}`;
	console.log(a);
	for(let i=0;i<arrayFree.length;i++) {
		a+=` L ${arrayFree[i][0]} ${arrayFree[i][1]}`;
	}
	console.log(a);
	var myPath = s.path(a).attr({
        fill: "none",
        stroke: colorTrazo,
        strokeWidth: grosorTrazo
    }).click(function () {
	    
	    this.attr('fill', fill);

	});
}

//fin dibujo libre

//color
$("#colorPicker").change(()=> {
	colorTrazo=$("#colorPicker").val();
});
//fin color

//grosor
$("#grosorPicker").change(()=> {
	grosorTrazo=$("#grosorPicker").val();
	console.log(grosorTrazo);
});
//fin grosor

//fill
$("#fill").change(()=> {
	$("svg")[0].style.zIndex=91;
	fill=$("#fill").val();
});

//cancel fill
$("#cancelFill").click(()=> {
	alert("cancelando");
	$("svg")[0].style.zIndex=-1;
});
//fin fill

//texto
var comText=false;

$("#texto").click((e)=> {
	comText=false;

	$("#board").click((e)=> {
		if(comText==false) {
			$("#textoInput").css("display","flex");

			$("#textoInput").css("top",e.clientY +"px");
			$("#textoInput").css("left",e.clientX +"px");
		
		}
	});

	$("#area").change((e)=> {
		
		let yV = $("#textoInput").css("top");
		let xV = $("#textoInput").css("left");
		console.log(yV);
		console.log(xV);	
		var t1 = s.text(xV, yV, $("#area").val());
		//textoInput.style.display="none";
		$("#textoInput").css("display","none");
		comText=true;	
	});

});
//fin texto

//asignar nombre
$("#exportar").click((e)=> {
	$("#namingContainer").css("display","flex");
});
//subir
var contenido=[];

$("#naming").click((e)=> {
	console.log("recopilando: ");
	
	let svg="<svg ";
	svg+='height="'+$("#lienzo").attr("height")+'"';
	svg+='width="'+$("#lienzo").attr("width")+'"';
	svg+='xmlns="'+$("#lienzo").attr("xmlns")+'"';

	svg+=">";
	console.log("svg:"+svg);
	contenido.push(svg);
	for(let i=2;i<$("svg")[0].childNodes.length;i++) {
		console.log($("svg")[0].childNodes[i]);
		console.log(typeof($("svg")[0].childNodes[i]));
		contenido.push($("svg")[0].childNodes[i].outerHTML);
	}
	contenido.push("</svg>");
	//window.location.href=window.location.href + "?contenido=" + contenido;
	enviar();
	console.log(contenido);
});
	

function enviar() {
	var datos = {
    "variable1" : contenido, // Dato #1 a enviar
    //"variable2" : variable2 // Dato #2 a enviar
    // etc...
};

var url = "./tablero"; // URL a la cual enviar los datos

enviarDatos(datos, url); // Ejecutar cuando se quiera enviar los datos

function enviarDatos(datos, url){
    $.ajax({
            data: {
            	 "_token": $("meta[name='csrf-token']").attr("content"),
            	 datos,
            }, 
            url: url,
            type: 'post',
            success:  function (response) {
                //console.log(response); // Imprimir respuesta del archivo
                window.location.replace(response);
            },
            error: function (error) {
                console.log(error.responseText); // Imprimir respuesta de error
            }
    });
}
}
//fin subir

//importar
function pintar(arg,type) {
	alert("pintando");
	
}
//fin importar