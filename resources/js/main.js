//aparicion opciones en menu mobile
$( ".bi-list" ).click(function() {
  $("#menuMobile").css("display","flex");
});

//desaparicion opciones en menu mobile
$(".bi-x-lg").click(function() {
	$("#menuMobile").css("display","none")
});

//desplazamiento boton landing (1 section)
$("#outliner").click(()=> {
    let top=$("#secondSection").position().top;
    desplazar_a(secondSection);
});

function desplazar_a(elemento){
    $('html,body').animate({scrollTop: $(elemento).offset().top}, 1000);
}


//scrollreveal
var slideUp = {
    distance: '150%',
    origin: 'bottom',
    duration: 1500,
    delay:375,
    opacity: null,
    reset: true
};
var slideRight = {
    distance: '150%',
    origin: 'left',
    duration: 1500,
    delay:375,
    opacity: null,
    reset: true,
    afterReveal:trickWhat
};
var opacity = {
    duration: 1500,
    delay:375,
    opacity: 0,
    reset: true,
};

    //landing
        ScrollReveal().reveal('.title',slideUp);
        ScrollReveal().reveal('#image',slideRight);
        ScrollReveal().reveal('.texto',opacity);
        //pictures
        ScrollReveal().reveal('#p1',{duration: 1500,delay:475,opacity: 0,reset: true,afterReveal:trickClock});
        ScrollReveal().reveal('#p4',{duration: 1500,delay:675,opacity: 0,reset: true, afterReveal: trickWallet});
        ScrollReveal().reveal('#p5',{duration: 1500,delay:875,opacity: 0,reset: true,afterReveal: trickCal});
        ScrollReveal().reveal('#p7',{duration: 1500,delay:1075,opacity: 0,reset: true,afterReveal: trickBull});
        ScrollReveal().reveal('#p6',{duration: 1500,delay:1275,opacity: 0,reset: true,afterReveal:trickCub});
        ScrollReveal().reveal('#p2',{duration: 1500,delay:1575,opacity: 0,reset: true,afterReveal:trickAlert});
        ScrollReveal().reveal('#p3',{duration: 1500,delay:1775,opacity: 0,reset: true,afterReveal:trickBal});
        //fin picture
        ScrollReveal().reveal('#toolLan1',{duration: 1500,delay:475,opacity: 0,reset: true,});
        ScrollReveal().reveal('#toolLan2',{duration: 1500,delay:675,opacity: 0,reset: true,});
        ScrollReveal().reveal('#toolLan3',{duration: 1500,delay:875,opacity: 0,reset: true,});
        ScrollReveal().reveal('.titleLeft',slideRight);
        //svg landing
        //arrow
        function trickArrow() {
            $("#arrow").addClass("text-logo");
        }

        ScrollReveal().reveal("#imageFifth",{
           duration: 0,
           delay: 875,
           opacity: 0,
           reset: true,
           afterReveal:trickArrow,
        });

      
        //plus
        ScrollReveal().reveal("#photo1",{
          duration: 0,
           delay: 875,
           opacity: 0,
           reset: true,
           afterReveal:trickPlus,
        });

        function trickPlus() {
          $("#plus").addClass("plus");
        }
        //share
        ScrollReveal().reveal("#photo2",{
          duration: 0,
           delay: 875,
           opacity: 0,
           reset: true,
           afterReveal:trickShare,
        });

        function trickShare() {
          $("#shareSvg").addClass("text-logo");
        }
        //background svg
        ScrollReveal().reveal("#photo3",{
          duration: 0,
           delay: 875,
           opacity: 0,
           reset: true,
           afterReveal:trickImage,
        });

        function trickImage() {
          $("#imageSvg").addClass("flip");
        }

        //svg showcase en landing
        function trickWallet() {
            $("#walletSvg").addClass("plus-wallet");
        }
        function trickBull() {
            $("#bull").addClass("text-logo2");
        }
         function trickCal() {
            $(".unactive").addClass("cal-logo");
        }
        function trickCub() {
            $("#cubSvg").addClass("cub-logo");
        }
        function trickBal() {
            $("#bal").addClass("text-logo");
        }
        function trickAlert() {
            $("#alert").addClass("color-logo");
        }
        function trickClock() {
            $("#clock").addClass("text-logo2");
        }

        function trickWhat() {
             $(".fade").each(function(index) {        
                (function(that, i) { 
                    var t = setTimeout(function() { 
                        $(that).addClass("colorSvg"); 
                    }, 500 * i);
                })(this, index);
            });
        }
      
     

    //fin landing

//aparicion consejos en pantalla tutorial
var c=0;//contador consejos
$(".titleAdvice").click(function(e) {
	//$(".textAdvice").css("display","flex");
	console.log(this.id);
	console.log(this.id+"TextAd");
	c++;
	if(c%2==1) {
		$("#"+this.id+"TextAd").css("display","flex");
        $("#icon"+this.id).removeClass("bi bi-caret-down-fill");
        $("#icon"+this.id).addClass("bi bi-caret-up-fill");
	} else {
		$("#"+this.id+"TextAd").css("display","none");
        $("#icon"+this.id).removeClass("bi bi-caret-up-fill");
        $("#icon"+this.id).addClass("bi bi-caret-down-fill");
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
  //console.log("cambiando");
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

//descarga
$(".download").each(function(index) {
    $(this).on("click", function(){
        $("#downloadModal").css("display","flex");
        let id=$(this).attr("id");
        id=id.split("-");
        id=id[1];
        $("#selectDown").change(()=> {
          console.log("id:"+id);
          enviar2(id);
          $("#textDown").css("display","flex");
        })
    });
});

$("#closeDownload").click(()=> {
   $("#downloadModal").css("display","none");
});

function enviar2(param) {
  var datos = {
    "variable1" : param, // Dato #1 a enviar
    //"variable2" : variable2 // Dato #2 a enviar
    // etc...
  };
  var url = "./obtenerDatos"; // URL a la cual enviar los datos

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
                console.log(response); // Imprimir respuesta del archivo
                //window.location.replace(response);
                $("#textDown").text(response[0]);
            },
            error: function (error) {
                console.log(error.responseText); // Imprimir respuesta de error
            }
    });
}
}

$("#download").click(()=> {
  saveSvg($("#textDown").val(),"hola");
});

function saveSvg(svgEl, name) {
    //svgEl.setAttribute("xmlns", "http://www.w3.org/2000/svg");
    //var svgData = svgEl.outerHTML;
    let h=0;
    let w=0;


    if(screen.width>900) {
     h=VhToPx(60);
     w=VwToPx(30);
    } else {
      h=VhToPx(55);
      w=VwToPx(80);
    }

    var svgData = "";
    svgData=`<svg height="${h}" version="1.1" width="${w}" xmlns="http://www.w3.org/2000/svg">`;
    svgData += svgEl;
    svgData +="</svg>";
    console.log(svgData);
    
    var preface = '<?xml version="1.0" standalone="no"?>\r\n';
    var svgBlob = new Blob([preface, svgData], {type:"image/svg+xml;charset=utf-8"});
    var svgUrl = URL.createObjectURL(svgBlob);
    var downloadLink = document.createElement("a");
    downloadLink.href = svgUrl;
    downloadLink.download = name;
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
}


//fin descarga