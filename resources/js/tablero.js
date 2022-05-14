

var pulsacion=[false,false,false,false,false,false,false];

var mousedownEvent="";
var mousemoveEvent="";
var mouseupEvent="";
var coordenaX="";
var coordenaY="";

window.onload=()=> {
	if(screen.width<900) {
		//init();
		mousedownEvent="touchstart";
		mouseupEvent="touchend";
		mousemoveEvent="touchmove";
		coordenaX="clientX";
		coordenaY="clientY";
	} else {
		mousedownEvent="mousedown";
		mouseupEvent="mouseup";
		mousemoveEvent="mousemove";
		coordenaX="originalEvent.targetTouches[0].clientX";
		coordenaY="originalEvent.targetTouches[0].clientY";
			
	}
	initNormal();
	 if (localStorage.getItem("scheme") != null) {
    	document.documentElement.setAttribute('data-theme', localStorage.getItem("scheme"));
  	}
}

//tablero
//coordenadas raton
function initNormal() {

$(document).on(`${mousemoveEvent}`,function(e){
	if(screen.width<900) {
		$("#coorX").text("X: "+e.originalEvent.targetTouches[0].clientX.toFixed(1));
		$("#coorY").text("Y: "+e.originalEvent.targetTouches[0].clientY.toFixed(1));
	} else {
		$("#coorX").text("X: "+e.clientX);
		$("#coorY").text("Y: "+e.clientY);
	}
});

/*$( "#hola" ).bind( `${down}`, function( ) {
 console.log("entro");
});*/

//general
//let h=VhToPx(100)-2;
let h=0;
let w=0;
var altoSvg=20;
var anchoSvg=35;


if(screen.width>900) {
	 h=VhToPx(60);
	 w=VwToPx(30);
} else {
	 h=VhToPx(55);
	 w=VwToPx(80);
	 altoSvg=25;
	 anchoSvg=10;
}

var s="";
if($("#lienzo").length==0) {
	s=Snap(w,h);
	s.attr({ id: 'lienzo' });
	
} else {
	
	s=Snap("#lienzo");
	
}

$("#lienzo").css("top",altoSvg + "%");
$("#lienzo").css("left",anchoSvg + "%");

var arrayX=[];
var arrayY=[];
var colorTrazo="#00000f";
var grosorTrazo=1;
var fill="black";
var colorFondo="black";
var gradientColor="empty";

if(localStorage.getItem("scheme")=="dark") {
	fill="white";
	colorFondo="white";
	colorTrazo="white";
}


//funciones de conversion
function VwToPx(param) {
	return (param*window.innerWidth)/100;
}

function VhToPx(param) {
	return (param*window.innerHeight)/100;
}

//pulsacion
function changeTool(param) {
	pulsacion=[false,false,false,false,false,false,false,false];
	//console.log(pulsacion);
	//console.log(param);
	$("#board").off();
	pulsacion[param]=true;
	
}


//sqr


function traducirSqr(param1,param2) {
	let array=param1.concat(param2);
	console.log("total:"+array);
	console.log("uno:"+param1);
	console.log("dos:"+param2);
	array.forEach((e,index)=> {
		if(index==0 || index==3) {
			array[index]=e-VwToPx(anchoSvg);
		} else {
			array[index]=e-VhToPx(altoSvg);
		}
	});
	console.log("total final:"+array);
	
	arrayX=[];
	arrayY=[];
	return array;
}



$("#sqr").click(()=> {
	changeTool(0);
	
	//console.log(arrayX);

	if(pulsacion[0]==true) {
		$("#board").on(`${mousedownEvent}`,function(e) {
			if(screen.width<900)  {
				if(arrayX.length<2) {
					arrayX.push(parseInt(e.originalEvent.targetTouches[0].pageX.toFixed(1)));
					arrayX.push(parseInt(e.originalEvent.targetTouches[0].pageY.toFixed(1)));
				}
				//console.log(arrayX);
			} else {
				if(arrayX.length<2) {
					arrayX.push(e.clientX);
					arrayX.push(e.clientY);
					console.log("x en local:"+arrayX);
				}
				
			}
		});

		$("#board").on(`${mouseupEvent}`,function(e) {
			if(screen.width<900)  {
				arrayY.push(parseInt(e.originalEvent.changedTouches[0].pageY.toFixed(1)));
				arrayY.push(parseInt(e.originalEvent.changedTouches[0].pageX.toFixed(1)));
				//console.log(e.originalEvent.changedTouches[0].clientX.toFixed(1));

			} else {
				arrayY.push(e.clientY);
				arrayY.push(e.clientX);
			}
			//console.log(arrayY);
			//console.log(arrayX);
			if(pulsacion[0]==true) {
				pintarSqr();
			}
			arrayY=[];
			arrayX=[];
		});
	} else {
		console.log("sqr no");
	}
	
});

function pintarSqr() {
	let res=traducirSqr(arrayX,arrayY);
	//var rect=s.rect(arrayX[0],arrayX[1],(arrayY[1]-arrayX[0]),(arrayY[0]-arrayX[1])).attr({
	if(((res[3]-res[0])>0) && ((res[2]-res[1])>0)) {
		var rect=s.rect(res[0],res[1],(res[3]-res[0]),(res[2]-res[1])).attr({
			fill: fill,
	        stroke: colorTrazo,
	        strokeWidth: grosorTrazo
		}).click(function(){
			
			if(gradientColor!="empty") {
				this.attr('fill', gradientColor);
			}

		});
	} else if((res[2]-res[1])<0) {
		if((res[3]-res[0])<0) {
			var rect=s.rect(res[3],res[2],(res[0]-res[3]),(res[1]-res[2])).attr({
				fill: fill,
		        stroke: colorTrazo,
		        strokeWidth: grosorTrazo
			}).click(function(){
				
				if(gradientColor!="empty") {
					this.attr('fill', gradientColor);
				}

			});
		} else {
			var rect=s.rect(res[0],res[2],(res[3]-res[0]),(res[1]-res[2])).attr({
				fill: fill,
		        stroke: colorTrazo,
		        strokeWidth: grosorTrazo
			}).click(function(){
				
				if(gradientColor!="empty") {
					this.attr('fill', gradientColor);
				}

			});
		}
	} else {
		console.log(res);
		var rect=s.rect((res[0]-(res[0]-res[3])),res[1],(res[0]-res[3]),(res[2]-res[1])).attr({
			fill: fill,
	        stroke: colorTrazo,
	        strokeWidth: grosorTrazo
		}).click(function(){
			
			if(gradientColor!="empty") {
				this.attr('fill', gradientColor);
				//console.log(gradientColor);
			}

		});
	}
	res=[];
}
//fin sqr
//recta
var rectaX=[];
var rectaY=[];
var contadorLineas=0;

function traducirRecta(param1,param2) {
	 let array=param1.concat(param2);

	array.forEach((e,index)=> {
		if(index<=1) {
			array[index]=e-VwToPx(anchoSvg);
		} else {
			array[index]=e-VhToPx(altoSvg);
		}
	});
	//console.log(array);
	return array;
}

$("#recta").click(()=> {
	changeTool(1);
	//console.log("recta es:"+pulsacion[1]);
	if(pulsacion[1]==true) {
		$("#board").click((e)=> {
			if(rectaX.length>0 && contadorLineas==0) {
				rectaX=[];
				rectaY=[];
			}
			if(contadorLineas<2) {

				if(screen.width<900) {
					
					rectaX.push(e.pageX);
					rectaY.push(e.pageY);

				} else {
					
					rectaX.push(e.clientX);
					rectaY.push(e.clientY);
				}
				contadorLineas++;
				if(contadorLineas==2) {
					if(pulsacion[1]==true) {
						console.log(rectaX);
						console.log(rectaY);
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
		//console.log("recta no");
		//console.log(pulsacion.recta);
	}
});

function dibujaLinea() {
	//console.log("h");
	let res=traducirRecta(rectaX,rectaY);
	var t1 = s.line(res[0], res[2], res[1], res[3]).attr({
		fill: fill,
        stroke: colorTrazo,
        strokeWidth: grosorTrazo
	});

	 
}
//fin recta
//circle
function traducirCirculo(param1) {
	
	param1.forEach((e,index)=> {
		if(index%2==1) {
			param1[index]=e-VwToPx(anchoSvg);
		} else {
			param1[index]=e-VhToPx(altoSvg);
		}
	});
	//console.log(param1);
	return param1;
}

var circleCont=0;
var circleArray=[];

$("#circle").click(()=> {
	changeTool(2);

	if(pulsacion[2]==true) {
		$("#board").on(`${mousedownEvent}`,function(e) {
			if(screen.width<900)  {
				circleArray.push(parseInt(e.originalEvent.targetTouches[0].pageY.toFixed(1)));
				circleArray.push(parseInt(e.originalEvent.targetTouches[0].pageX.toFixed(1)));
				//console.log(arrayX);
			} else {
				circleArray.push(e.clientY);
				circleArray.push(e.clientX);
				//console.log(circleArray);
			}
		});

		$("#board").on(`${mouseupEvent}`,function(e) {
			if(screen.width<900)  {
				circleArray.push(parseInt(e.originalEvent.changedTouches[0].pageY.toFixed(1)));
				circleArray.push(parseInt(e.originalEvent.changedTouches[0].pageX.toFixed(1)));
				//console.log(e.originalEvent.changedTouches[0].clientX.toFixed(1));

			} else {
				circleArray.push(e.clientY);
				circleArray.push(e.clientX);
			}
			//console.log(circleArray);
			if(pulsacion[2]==true) {
				pintarCircle();
			}
			circleArray=[];
		});
	}
});

function pintarCircle() {
	//console.log("creando");
	let res=traducirCirculo(circleArray);
	console.log(res);
	if(((res[2]-res[0])/2)>0) {
		var c = s.circle(((res[1]+res[3])/2), ((res[0]+res[2])/2), ((res[2]-res[0])/2)).attr({
			fill: fill,
	        stroke: colorTrazo,
	        strokeWidth: grosorTrazo
		}).click(function(){
			
			if(gradientColor!="empty") {
				this.attr('fill', gradientColor);
				//console.log(gradientColor);
			}

		});
	} else {
		var c = s.circle(((res[1]+res[3])/2), ((res[0]+res[2])/2), ((res[0]-res[2])/2)).attr({
			fill: fill,
	        stroke: colorTrazo,
	        strokeWidth: grosorTrazo
		}).click(function(){
			
			if(gradientColor!="empty") {
				this.attr('fill', gradientColor);
				//console.log(gradientColor);
			}

		});
	}
}
//fin circle

//curve
var curveArray=[];
var contadorCurve=0;
function traducirCurva(param1) {
	
	param1.forEach((e,index)=> {
		let aux=[e[0]-VwToPx(anchoSvg),e[1]-VhToPx(altoSvg)];
		param1[index]=aux;
	});
	//console.log(param1);
	return param1;
}

$("#curve").click(()=> {
	changeTool(3);
	if(pulsacion[3]==true) {
		$("#board").click((e)=> {
			if(contadorCurve<3) {
				if(screen.width<900) {
					let aux=[e.pageX,e.pageY];
					//console.log(aux);
					curveArray.push(aux);
				} else {
					let aux=[e.clientX,e.clientY];
					//console.log(aux);
					curveArray.push(aux);
				}
				
				contadorCurve++;
			} else {
				//console.log(curveArray);
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
   // let a=`M  ${curveArray[0][0]} ${curveArray[0][1]} Q ${curveArray[1][0]} ${curveArray[1][1]} ${curveArray[2][0]} ${curveArray[2][1]}`;
   //console.log(curveArray);
   let res=traducirCurva(curveArray);
    let a=`M  ${res[0][0]} ${res[0][1]} Q ${res[1][0]} ${res[1][1]} ${res[2][0]} ${res[2][1]}`;
    //console.log(res);
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

function traducirFree(param1) {
	param1.forEach((e,index)=> {
		let aux=[e[0]-VwToPx(anchoSvg),e[1]-VhToPx(altoSvg)];
		param1[index]=aux;
	});
	//console.log(param1);
	return param1;
}
$("#freet").click(()=> {
	changeTool(4);
	if(pulsacion[4]==true) {
		$("#board").on(`${mousedownEvent}`,function(e) {
			if(screen.width<900)  {
				let aux=[parseInt(e.originalEvent.targetTouches[0].pageX.toFixed(1)),parseInt(e.originalEvent.targetTouches[0].pageY.toFixed(1))];
				arrayFree.push(aux);
				inicio=true;
				
			} else {
				let aux=[e.clientX,e.clientY];
				arrayFree.push(aux);
				inicio=true;
			}
		});

		$("#board").on(`${mousemoveEvent}`,function(e) {
			if(inicio==true) {
				if(screen.width<900)  {
					let aux=[parseInt(e.originalEvent.targetTouches[0].pageX.toFixed(1)),parseInt(e.originalEvent.targetTouches[0].pageY.toFixed(1))];
					arrayFree.push(aux);
				} else {
					let aux=[e.clientX,e.clientY];
					arrayFree.push(aux);
				}
			}
		});

		$("#board").on(`${mouseupEvent}`,function(e) {
			//console.log("inicio: "+inicio);
			if(screen.width<900)  {
				let aux=[parseInt(e.originalEvent.changedTouches[0].pageX.toFixed(1)),parseInt(e.originalEvent.changedTouches[0].pageY.toFixed(1))];
				arrayFree.push(aux);
			} else {
				let aux=[e.clientX,e.clientY];
				arrayFree.push(aux);
			}
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
	let res=traducirFree(arrayFree);
	console.log(arrayFree);
	arrayFree=res;
	//let a="M "+curveArray[0][0]+" 90 C 200  90 0 0 90  300";
	let a=`M ${arrayFree[0][0]} ${arrayFree[0][1]}`;
	//console.log(a);
	for(let i=0;i<arrayFree.length;i++) {
		a+=` L ${arrayFree[i][0]} ${arrayFree[i][1]}`;
	}
	//console.log(a);
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
var yText=0;
var xText=0;

$("#texto").click((e)=> {
	comText=false;
	changeTool(5);
	if(pulsacion[5]==true) {
		$("#board").click((e)=> {
			if(comText==false) {
				$("#textoInput").css("display","flex");
				if(screen.width<900) {
					$("#textoInput").css("top",e.pageY +"px");
					$("#textoInput").css("left",e.pageX +"px");
					yText=e.pageY;
					xText=e.pageX;
				} else {
					$("#textoInput").css("top",e.clientY +"px");
					$("#textoInput").css("left",e.clientX +"px");
					yText=e.clientY;
					xText=e.clientX;
				}
			}
		});

		$("#area").change((e)=> {
			
			
			if(pulsacion[5]==true) {	
				var t1 = s.text((xText-VwToPx(anchoSvg)), (yText-VhToPx(altoSvg)), $("#area").val()).attr({
					stroke: colorTrazo,
				});
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
	$("body").css("background","black");

});

//cancelar asignar nombre
$("#cancellNaming").click((e)=> {
	$("#namingContainer").css("display","none");
	if(localStorage.getItem("scheme")=="light") {
		$("body").css("background","white");
	} else {
		$("body").css("background","black");
	}
});

//subir
var contenido=[];
var nombre="";
var subirMagico=2;

$("#naming").click((e)=> {
	$("#namingLoader").css("display","flex");
	console.log("recopilando: ");
	//nombre del lienzo
	nombre=$("#nameLienzo").val();

	
	console.log("subir magico"+subirMagico);

	if($("#idAct").length==0) {
		for(let i=subirMagico;i<$("svg")[5].childNodes.length;i++) {
			console.log($("svg")[5].childNodes[i]);
			console.log(typeof($("svg")[5].childNodes[i]));
			contenido.push($("svg")[5].childNodes[i].outerHTML);
		}
	} else {
		for(let i=subirMagico;i<$("svg")[1].childNodes.length;i++) {
			console.log($("svg")[1].childNodes[i]);
			console.log(typeof($("svg")[1].childNodes[i]));
			contenido.push($("svg")[1].childNodes[i].outerHTML);
		}
	}
	
	
	//window.location.href=window.location.href + "?contenido=" + contenido;
	enviar();
	//console.log($("svg")[4]);
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
	subirMagico=0;
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
	//console.log(colorFondo);
	if(screen.width>=900) {
		//obtenemos el punto desde donde pintar el cuadrado (ordenador)
		let x=VwToPx(50)-VwToPx(15);
		let y=VhToPx(50)-VhToPx(30);
		//console.log(x);
		//console.log(y);
		//obtenemos el height y width del cuadrado
		let height=VhToPx(60);
		let width=VwToPx(30);

		var rect=s.rect((x-VwToPx(anchoSvg)),(y-VhToPx(altoSvg)),width,height).attr({
			fill:colorFondo,
		}).click(function () {
	    	this.attr('fill', fill);
		});
	} else {
		//obtenemos el punto desde donde pintar el cuadrado (movil)
		let x=VwToPx(50)-VwToPx(40);
		let y=VhToPx(50)-VhToPx(25);
		//console.log(x);
		//console.log(y);
		//obtenemos el height y width del cuadrado
		let height=VhToPx(55);
		let width=VwToPx(80);
		var rect=s.rect((x-VwToPx(anchoSvg)),(y-VhToPx(altoSvg)),width,height).attr({
			fill:colorFondo,
		}).click(function () {
	    	this.attr('fill', fill);
		});
		
	}

	
});

//ellipse
var ellipseX=[];
var ellipseY=[];

function traducirEllipse(param1,param2) {
	let array=param1.concat(param2);
	//console.log(array);
	array.forEach((e,index)=> {
		if(index==0 || index==3) {
			array[index]=e-VwToPx(anchoSvg);
		} else {
			array[index]=e-VhToPx(altoSvg);
		}
	});
	//console.log(array);
	ellipseX=[];
	ellipsey=[];
	return array;
}


$("#ellipse").click(()=> {
	changeTool(6);

	if(pulsacion[6]==true) {
		$("#board").on(`${mousedownEvent}`,function(e) {
			if(screen.width<900) {
				ellipseX.push(parseInt(e.originalEvent.targetTouches[0].pageX.toFixed(1)));
				ellipseX.push(parseInt(e.originalEvent.targetTouches[0].pageY.toFixed(1)));
			} else {
				ellipseX.push(e.clientX);
				ellipseX.push(e.clientY);
				//console.log(arrayX);
			}
	});

		$("#board").on(`${mouseupEvent}`,function(e) {
			if(screen.width<900) {
				ellipseY.push(parseInt(e.originalEvent.changedTouches[0].pageY.toFixed(1)));
				ellipseY.push(parseInt(e.originalEvent.changedTouches[0].pageX.toFixed(1)));
			} else {
				ellipseY.push(e.clientY);
				ellipseY.push(e.clientX);
			}
			console.log(ellipseY);
			console.log(ellipseX);
			if(pulsacion[6]==true) {
				dibujarEllipse();
			}
			ellipseX=[];
			ellipseY=[];
		});
	} else {
		console.log("sqr no");
	}
});

function dibujarEllipse(param) {
	let res=traducirEllipse(ellipseX,ellipseY);
	console.log(res);
	let x,y,rX,rY=0;

	if(((res[3]-res[0])>0) && ((res[2]-res[1])>0)) {
		x=(res[3]+res[0])/2;
		y=(res[2]+res[1])/2;
		rX=res[3]-x;
		rY=res[2]-y;
	} else if((res[2]-res[1])<0) {
		if((res[3]-res[0])<0) {
			x=(res[0]+res[3])/2;
			y=(res[2]+res[1])/2;
			rX=res[0]-x;
			rY=res[1]-y;
		} else {
			x=(res[0]+res[3])/2;
			y=(res[2]+res[1])/2;
			rX=res[3]-x;
			rY=res[1]-y;
		}
	} else {
		x=(res[3]+res[0])/2;
		y=(res[2]+res[1])/2;
		rX=x-res[3];
		rY=res[2]-y;
	}
	var rect=s.ellipse(x,y,rX,rY).attr({   
	    fill: fill,
	    stroke: colorTrazo,
	    strokeWidth: grosorTrazo
	}).click(function(){
		if(gradientColor!="empty") {
			this.attr('fill', gradientColor);
		}
	});
	res=[];
}


//gradiente
var contadorGradient=0;

$("#gradient").click(()=> {
	$("#gradientContainer").css("display","flex");
	$("body").css("background","black");
	$("#cancellGradient").click(()=> {
		$("#gradientContainer").css("display","none");
		if(localStorage.getItem("scheme")=="light") {
			$("body").css("background","white");
		} else {
			$("body").css("background","black");
		}
	});
	$("#crearGradient").click(()=> {
		let c1=$("#c1").val();
		let c2=$("#c2").val();
		scan();
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
        myLinearGradient.setAttribute("x2", "100%");
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


	$("#lienzo").click((e)=> {
		let figuraSel=Snap.getElementByPoint(e.clientX,e.clientY);
		console.log(figuraSel);
		figuraSel.attr({
			fill: gradientColor,
		    strokeWidth: 5
		});
	});
});

$("#doneFill").click(()=> {
	$("#lienzo").css("z-index","-1");
	$("#doneFill").css("display","none");
});


function scan() {
	contadorGradient=0;
	for(let i=2;i<$("svg")[0].childNodes.length;i++) {
		console.log($("svg")[0].childNodes[i]);
		console.log($("svg")[0].childNodes[i].id);
		if($("svg")[0].childNodes[i].id.includes("MyGradient")) {
			contadorGradient++;
		}
		
		
	}
}

}

//darkmode
/*window.onload = function () {
  if (localStorage.getItem("scheme") != null) {
    document.documentElement.setAttribute('data-theme', localStorage.getItem("scheme"));
  }
};


*/

//atras tablero
$("#atrasTablero").click(()=> {
	history.back();
});