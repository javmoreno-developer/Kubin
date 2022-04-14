//aparicion opciones en menu mobile
$( ".bi-list" ).click(function() {
  $("#menuMobile").css("display","flex");
});

//desaparicion opciones en menu mobile
$(".bi-x-lg").click(function() {
	$("#menuMobile").css("display","none")
});

//aparicion consejos en pantalla tutorial
var c=0;//contador consejos
$(".titleAdvice").click(function(e) {
	//$(".textAdvice").css("display","flex");
	console.log(this.id);
	console.log(this.id+"TextAd");
	c++;
	if(c%2==1) {
		$("#"+this.id+"TextAd").css("display","flex");
	} else {
		$("#"+this.id+"TextAd").css("display","none");
	}
});

//overlay showcase
$(".showcaseChest").hover(function(e) {
	$(".showcaseOverlay").css("display","none");
	$("#"+this.id+"Overlay").css("display","flex");
});

//efecto cabecera
$(document).scroll(function(e) {
 if($(document).scrollTop()!=0) {
 	$("#cabecera").attr("class","desplazado");	
 } else {
 	$("#cabecera").attr("class","no-desplazado");
 }

});

//overlay login
var cLogin=0;
$("#changeLogin").click(()=> {
	//mobil
	if(screen.width<992) {
		if(cLogin%2==0) {
			$("#overlay").css("height","60%");
			$("#overlay").css("top","0%");
		} else {
			$("#overlay").css("height","70%");
			$("#overlay").css("top","60%");
		}
	cLogin++;
	} else {
			//ordenador
		if(cLogin%2==0) {
				$("#overlay").css("left","0%");
			} else {
				$("#overlay").css("left","50%");
			}
		cLogin++;
	}
});


//dashboard carga (asignacion imagenes)
$(".modalLienzo").each((index)=> {
	asignarLienzo(index);

});
	
function asignarLienzo(param) {
	let s=Snap($("#lienzo"+param).css("width"),$("#lienzo"+param).css("height"));
	s.attr({ id: 'picture'+param,class: "userPicture" });
	var coordenadas = $("#lienzo"+param).position();
	s.attr({position: "absolute"});
	$("#picture"+param).css("top",coordenadas.top + "px");
	$("#picture"+param).css("left",coordenadas.left + "px");

}
//funciones de conversion
function VwToPx(param) {
	return (param*window.innerWidth)/100;
}

function VhToPx(param) {
	return (param*window.innerHeight)/100;
}

//cambio palabras en la landing page (sitio web)
var arrayCh=["APLICACION","RED SOCIAL","DOCUMENTO","ANUNCIO"];
var contadorCh=0;
let inter="";

$("#changeWord").ready(()=> {
	if(inter=="") {
		setTimeout(intervalChange,3000);
	}
	
});
function intervalChange() {
	inter=setInterval(changeLetter,2000);
}
function changeLetter() {
  console.log("cambiando");
  $("#changeWord").css("opacity",0);
  setTimeout(()=> {
  	$("#changeWord").text(arrayCh[contadorCh]);
  	$("#changeWord").css("opacity",1);
  },1000)
  
  contadorCh++;
  if(contadorCh>=arrayCh.length) {
  	contadorCh=0;
  }
}
