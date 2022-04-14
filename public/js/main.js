/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
//aparicion opciones en menu mobile
$(".bi-list").click(function () {
  $("#menuMobile").css("display", "flex");
}); //desaparicion opciones en menu mobile

$(".bi-x-lg").click(function () {
  $("#menuMobile").css("display", "none");
}); //aparicion consejos en pantalla tutorial

var c = 0; //contador consejos

$(".titleAdvice").click(function (e) {
  //$(".textAdvice").css("display","flex");
  console.log(this.id);
  console.log(this.id + "TextAd");
  c++;

  if (c % 2 == 1) {
    $("#" + this.id + "TextAd").css("display", "flex");
  } else {
    $("#" + this.id + "TextAd").css("display", "none");
  }
}); //overlay showcase

$(".showcaseChest").hover(function (e) {
  $(".showcaseOverlay").css("display", "none");
  $("#" + this.id + "Overlay").css("display", "flex");
}); //efecto cabecera

$(document).scroll(function (e) {
  if ($(document).scrollTop() != 0) {
    $("#cabecera").attr("class", "desplazado");
  } else {
    $("#cabecera").attr("class", "no-desplazado");
  }
}); //overlay login

var cLogin = 0;
$("#changeLogin").click(function () {
  //mobil
  if (screen.width < 992) {
    if (cLogin % 2 == 0) {
      $("#overlay").css("height", "60%");
      $("#overlay").css("top", "0%");
    } else {
      $("#overlay").css("height", "70%");
      $("#overlay").css("top", "60%");
    }

    cLogin++;
  } else {
    //ordenador
    if (cLogin % 2 == 0) {
      $("#overlay").css("left", "0%");
    } else {
      $("#overlay").css("left", "50%");
    }

    cLogin++;
  }
}); //dashboard carga (asignacion imagenes)

$(".modalLienzo").each(function (index) {
  asignarLienzo(index);
});

function asignarLienzo(param) {
  var s = Snap($("#lienzo" + param).css("width"), $("#lienzo" + param).css("height"));
  s.attr({
    id: 'picture' + param,
    "class": "userPicture"
  });
  var coordenadas = $("#lienzo" + param).position();
  s.attr({
    position: "absolute"
  });
  $("#picture" + param).css("top", coordenadas.top + "px");
  $("#picture" + param).css("left", coordenadas.left + "px");
} //funciones de conversion


function VwToPx(param) {
  return param * window.innerWidth / 100;
}

function VhToPx(param) {
  return param * window.innerHeight / 100;
} //cambio palabras en la landing page (sitio web)


var arrayCh = ["APLICACION", "RED SOCIAL", "DOCUMENTO", "ANUNCIO"];
var contadorCh = 0;
var inter = "";
$("#changeWord").ready(function () {
  if (inter == "") {
    setTimeout(intervalChange, 3000);
  }
});

function intervalChange() {
  inter = setInterval(changeLetter, 2000);
}

function changeLetter() {
  //console.log("cambiando");
  $("#changeWord").css("opacity", 0);
  setTimeout(function () {
    $("#changeWord").text(arrayCh[contadorCh]);
    $("#changeWord").css("opacity", 1);
  }, 1000);
  contadorCh++;

  if (contadorCh >= arrayCh.length) {
    contadorCh = 0;
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
    var svgData = "";
    svgData=`<svg height="${VhToPx(100)}" version="1.1" width="${VwToPx(100)}" xmlns="http://www.w3.org/2000/svg">`;
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

//funciones de conversion
function VwToPx(param) {
  return (param*window.innerWidth)/100;
}

function VhToPx(param) {
  return (param*window.innerHeight)/100;
}

//fin descarga
/******/ })()
;