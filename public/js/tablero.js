var pulsacion=[false,false,false,false,false,false,false];


//tablero
//coordenadas raton
$(document).mousemove((e)=> {
	$("#coorX").text("X: "+e.clientX);
	$("#coorY").text("Y: "+e.clientY);
});


//general
//let h=VhToPx(100)-2;
let h=VhToPx(100)-2;
let w=VwToPx(100);
if($("#lienzo").length==0) {
	var s=Snap(w,h);
	s.attr({ id: 'lienzo' });
}

var arrayX=[];
var arrayY=[];
var colorTrazo="#00000f";
var grosorTrazo=1;
var fill="black";
var colorFondo="black";
var gradientColor="empty";
//funciones de conversion
function VwToPx(param) {
	return (param*window.innerWidth)/100;
}

function VhToPx(param) {
	return (param*window.innerHeight)/100;
}

//pulsacion
function changeTool(param) {
	pulsacion=[false,false,false,false,false,false,false];
	console.log(pulsacion);
	console.log(param);
	pulsacion[param]=true;
	
}

//sqr
$("#sqr").click(()=> {
	changeTool(0);

	if(pulsacion[0]==true) {
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
			if(pulsacion[0]==true) {
				pintarSqr();
			}
			arrayX=[];
			arrayY=[];
		});
	} else {
		console.log("sqr no");
	}
	
});

function pintarSqr() {
	var rect=s.rect(arrayX[0],arrayX[1],(arrayY[1]-arrayX[0]),(arrayY[0]-arrayX[1])).attr({
		fill: fill,
        stroke: colorTrazo,
        strokeWidth: grosorTrazo
	}).click(function(){
		if(gradientColor!="empty") {
			this.attr('fill', gradientColor);
			console.log(gradientColor);
		}

	});
}
//fin sqr
//recta
var rectaX=[];
var rectaY=[];
var contadorLineas=0;
$("#recta").click(()=> {
	changeTool(1);
	console.log("recta es:"+pulsacion[1]);
	if(pulsacion[1]==true) {
		$("#board").click((e)=> {
			if(contadorLineas<2) {
				rectaX.push(e.clientX);
				rectaY.push(e.clientY);
				contadorLineas++;
				if(contadorLineas==2) {
					if(pulsacion[1]==true) {
						dibujaLinea();
					}
					rectaY=[];
					rectaX=[];
					contadorLineas=0;
				}
			} else {
				if(pulsacion[1]==true) {
					dibujaLinea();
				}
			}
		});
	} else {
		console.log("recta no");
		console.log(pulsacion.recta);
	}
});

function dibujaLinea() {
	console.log("h");
	var t1 = s.line(rectaX[0], rectaY[0], rectaX[1], rectaY[1]).attr({
		fill: fill,
        stroke: colorTrazo,
        strokeWidth: grosorTrazo
	});

	 
}
//fin recta
//circle
var circleCont=0;
var circleArray=[];

$("#circle").click(()=> {
	changeTool(2);

	if(pulsacion[2]==true) {
		$("#board").mousedown((e)=> {
			circleArray.push(e.clientY);
			circleArray.push(e.clientX);
			console.log(circleArray);
		});

		$("#board").mouseup((e)=> {
			circleArray.push(e.clientY);
			circleArray.push(e.clientX);
			console.log(circleArray);
			if(pulsacion[2]==true) {
				pintarCircle();
			}
			circleArray=[];
		});
	}
});

function pintarCircle() {
	console.log("creando");
	var c = s.circle(((circleArray[1]+circleArray[3])/2), ((circleArray[0]+circleArray[2])/2), ((circleArray[2]-circleArray[0])/2)).attr({
		fill: fill,
        stroke: colorTrazo,
        strokeWidth: grosorTrazo
	});
}
//fin circle

//curve
var curveArray=[];
var contadorCurve=0;

$("#curve").click(()=> {
	changeTool(3);
	if(pulsacion[3]==true) {
		$("#board").click((e)=> {
			if(contadorCurve<3) {
				let aux=[e.clientX,e.clientY];
				console.log(aux);
				curveArray.push(aux);
				contadorCurve++;
			} else {
				console.log(curveArray);
				if(pulsacion[3]==true) {
					pintarCurva();
				}
				contadorCurve=0;
				curveArray=[];
			}
		});
	}
});
function pintarCurva() {
    //let a=`M  ${curveArray[0][0]} ${curveArray[0][1]} C ${curveArray[0][0]} ${curveArray[0][1]} ${curveArray[1][0]} ${curveArray[1][1]} ${curveArray[2][0]} ${curveArray[2][1]}`;
    let a=`M  ${curveArray[0][0]} ${curveArray[0][1]} Q ${curveArray[1][0]} ${curveArray[1][1]} ${curveArray[2][0]} ${curveArray[2][1]}`;
    console.log(a);
    var myPath = s.path(a).attr({
        fill: fill,
        stroke: colorTrazo,
        strokeWidth: grosorTrazo
    });
}
//fin curve

//dibujo libre
var arrayFree=[];
var inicio=false;

$("#freet").click(()=> {
	changeTool(4);
	if(pulsacion[4]==true) {
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
			if(pulsacion[4]==true) {
				pintarFreet();
			}
			arrayFree=[];
			inicio=false;
		});
	}
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
$("#colorEmu").click(()=>{
	$("#colorPicker").click();
	
});

$("#colorPicker").change(()=> {
	colorTrazo=$("#colorPicker").val();
});
//fin color

//grosor
let contadorGr=0;

$("#openGrosor").click(()=> {
	if(contadorGr%2==0) {
		$("#grosorContainer").css("display","flex");
	} else {
		$("#grosorContainer").css("display","none");
	}
	contadorGr++;
});

$("#grosorPicker").change(()=> {
	grosorTrazo=$("#grosorPicker").val();
	console.log(grosorTrazo);
});
//fin grosor

//fill

$("#fillEmu").click(()=>{
	$("#fill").click();
	
});

$("#fill").change(()=> {
	fill=$("#fill").val();
});


//fin fill

//texto
var comText=false;

$("#texto").click((e)=> {
	comText=false;
	changeTool(5);
	if(pulsacion[5]==true) {
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
			if(pulsacion[5]==true) {	
				var t1 = s.text(xV, yV, $("#area").val());
				//textoInput.style.display="none";
				$("#textoInput").css("display","none");
				comText=true;	
			}
		});
	}
});
//fin texto

//asignar nombre
$("#exportar").click((e)=> {
	$("#namingContainer").css("display","flex");
	$("body").css("background","grey");
});

//cancelar asignar nombre
$("#cancellNaming").click((e)=> {
	$("#namingContainer").css("display","none");
	$("body").css("background","white");
});

//subir
var contenido=[];
var nombre="";
$("#naming").click((e)=> {
	$("#namingLoader").css("display","flex");
	console.log("recopilando: ");
	//nombre del lienzo
	nombre=$("#nameLienzo").val();

	
	for(let i=2;i<$("svg")[0].childNodes.length;i++) {
		console.log($("svg")[0].childNodes[i]);
		console.log(typeof($("svg")[0].childNodes[i]));
		contenido.push($("svg")[0].childNodes[i].outerHTML);
	}
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
var id=0;

enviarDatos(datos, url); // Ejecutar cuando se quiera enviar los datos

function enviarDatos(datos, url){
	if($("#idAct").length>0) {
		id=$("#idAct").val();
		console.log("hey you");
	}
    $.ajax({
            data: {
            	 "_token": $("meta[name='csrf-token']").attr("content"),
            	 datos,
            	 id,
            	 nombre,
            }, 
            url: url,
            type: 'post',
            success:  function (response) {
               //console.log(response); // Imprimir respuesta del archivo
              // window.location.replace(response);
              window.location.href="./dashboard";
            },
            error: function (error) {
                console.log(error.responseText); // Imprimir respuesta de error
            }
    });
}
}
//fin subir



//seleccion de alguna herramienta(cambio de clase)
$( ".tool" ).each(function(index) {
    $(this).on("click", function(){
        // For the mammal value
        let id=$(this).attr('id');
        $( ".toolSelected" ).each(function(index) {
        	$(this).removeClass('toolSelected').addClass('tool')
        });
        $("#"+id).removeClass('tool').addClass('toolSelected')

       
    });
});


//borrar total
$("#borrarTotal").click(()=> {
	$("#lienzo").empty();
});

//$("#lienzo").removeChild($("#lienzo").lastChild);

$("#borrarSelectivo").click(()=> {
	//$("#lienzo").removeChild($("#lienzo").lastChild);

	$("#lienzo").children().last().remove();
});

//change bg
$("#triggerBg").click(()=>{
	$("#chbg").click();
});

$("#chbg").change(()=> {
	colorFondo=$("#chbg").val();
	console.log(colorFondo);
	if(screen.width>=900) {
		//obtenemos el punto desde donde pintar el cuadrado (ordenador)
		let x=VwToPx(50)-VwToPx(15);
		let y=VhToPx(50)-VhToPx(30);
		console.log(x);
		console.log(y);
		//obtenemos el height y width del cuadrado
		let height=VhToPx(60);
		let width=VwToPx(30);
		var rect=s.rect(x,y,width,height).attr({
			fill:colorFondo,
		}).click(function () {
	    	this.attr('fill', fill);
		});
	} else {
		//obtenemos el punto desde donde pintar el cuadrado (movil)
		let x=VwToPx(50)-VwToPx(40);
		let y=VhToPx(50)-VhToPx(25);
		console.log(x);
		console.log(y);
		//obtenemos el height y width del cuadrado
		let height=VhToPx(55);
		let width=VwToPx(80);
		var rect=s.rect(x,y,width,height).attr({
			fill:colorFondo,
		}).click(function () {
	    	this.attr('fill', fill);
		});
		
	}

	
});

//ellipse
var ellipse=[];

$("#ellipse").click(()=> {
	changeTool(6);

	if(pulsacion[6]==true) {
		$("#board").mousedown((e)=> {
			arrayX.push(e.clientX);
			arrayX.push(e.clientY);
			//console.log(arrayX);
	});

		$("#board").mouseup((e)=> {
			arrayY.push(e.clientY);
			arrayY.push(e.clientX);
			console.log(arrayY);
			console.log(arrayX);
			if(pulsacion[6]==true) {
				dibujarEllipse();
			}
			arrayX=[];
			arrayY=[];
		});
	} else {
		console.log("sqr no");
	}
});

function dibujarEllipse(param) {
	let x=(arrayY[1]+arrayX[0])/2;
	let y=(arrayY[0]+arrayX[1])/2;
	let rX=arrayY[1]-x;
	let rY=arrayY[0]-y;
	console.log(x);
	console.log(y);
	var rect=s.ellipse(x,y,rX,rY).click(function () {
	    
	    this.attr('fill', fill);

	});
}


//gradiente
var contadorGradient=0;

$("#gradient").click(()=> {
	$("#gradientContainer").css("display","flex");
	$("#cancellGradient").click(()=> {
		$("#gradientContainer").css("display","none");
	});
	$("#crearGradient").click(()=> {
		let c1=$("#c1").val();
		let c2=$("#c2").val();
		
		let type=$("#gradientType").val();
		let verti=$("#verticalidad").val();
		crearGradiente(c1,c2,type,verti);
		contadorGradient++;
	});
});

function crearGradiente(c1,c2,type,verti) {
	let result="";
	if(verti=="AB") {
		var myLinearGradient = document.createElementNS("http://www.w3.org/2000/svg", "linearGradient");
        myLinearGradient.setAttribute("id", `MyGradient${contadorGradient}`);
        myLinearGradient.setAttribute("x1", "0%");
        myLinearGradient.setAttribute("x2", "0%");
        myLinearGradient.setAttribute("y1", "0%");
        myLinearGradient.setAttribute("y2", "100%");

        $("#lienzo").append(myLinearGradient);
        var stop1 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
        stop1.setAttribute("id", "myStop1");
        stop1.setAttribute("offset", "0%");
        stop1.setAttribute("stop-color", `${c1}`);
        $(`#MyGradient${contadorGradient}`).append(stop1);

        var stop2 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
        stop2.setAttribute("id", "myStop2");
        stop2.setAttribute("offset", "100%");
        stop2.setAttribute("stop-color", `${c2}`);
        $(`#MyGradient${contadorGradient}`).append(stop2);
	} else {
		var myLinearGradient = document.createElementNS("http://www.w3.org/2000/svg", "linearGradient");
        myLinearGradient.setAttribute("id", `MyGradient${contadorGradient}`);
        myLinearGradient.setAttribute("x1", "0%");
        myLinearGradient.setAttribute("x2", "0%");
        myLinearGradient.setAttribute("y1", "0%");
        myLinearGradient.setAttribute("y2", "0%");

        $("#lienzo").append(myLinearGradient);
        var stop1 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
        stop1.setAttribute("id", "myStop1");
        stop1.setAttribute("offset", "0%");
        stop1.setAttribute("stop-color", `${c1}`);
        $(`#MyGradient${contadorGradient}`).append(stop1);

        var stop2 = document.createElementNS("http://www.w3.org/2000/svg", "stop");
        stop2.setAttribute("id", "myStop2");
        stop2.setAttribute("offset", "100%");
        stop2.setAttribute("stop-color", `${c2}`);
        $(`#MyGradient${contadorGradient}`).append(stop2);
	}
	
	gradientColor=`url(#MyGradient${contadorGradient})`;
}

//use
$("#use").click(()=> {
	$("#lienzo").css("z-index","99");
	$("#doneFill").css("z-index","100");
	$("#doneFill").css("display","flex");
});

$("#doneFill").click(()=> {
	$("#lienzo").css("z-index","-1");
	$("#doneFill").css("display","none");
});


