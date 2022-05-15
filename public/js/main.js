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
}); //desplazamiento boton landing (1 section)

$("#outliner").click(function () {
  var top = $("#secondSection").position().top;
  desplazar_a(secondSection);
});

function desplazar_a(elemento) {
  $('html,body').animate({
    scrollTop: $(elemento).offset().top
  }, 1000);
} //scrollreveal


var slideUp = {
  distance: '150%',
  origin: 'bottom',
  duration: 1500,
  delay: 375,
  opacity: null,
  reset: true
};
var slideRight = {
  distance: '150%',
  origin: 'left',
  duration: 1500,
  delay: 375,
  opacity: null,
  reset: true,
  afterReveal: trickWhat
};
var opacity = {
  duration: 1500,
  delay: 375,
  opacity: 0,
  reset: true
}; //landing

ScrollReveal().reveal('.title', slideUp);
ScrollReveal().reveal('#image', slideRight);
ScrollReveal().reveal('.texto', opacity); //pictures

ScrollReveal().reveal('#p1', {
  duration: 1500,
  delay: 475,
  opacity: 0,
  reset: true
}); //afterReveal:trickClock

ScrollReveal().reveal('#p4', {
  duration: 1500,
  delay: 675,
  opacity: 0,
  reset: true
}); //afterReveal: trickWallet

ScrollReveal().reveal('#p5', {
  duration: 1500,
  delay: 875,
  opacity: 0,
  reset: true
}); //,afterReveal: trickCal

ScrollReveal().reveal('#p7', {
  duration: 1500,
  delay: 1075,
  opacity: 0,
  reset: true
}); //,afterReveal: trickBull

ScrollReveal().reveal('#p6', {
  duration: 1500,
  delay: 1275,
  opacity: 0,
  reset: true
}); //,afterReveal:trickCub

ScrollReveal().reveal('#p2', {
  duration: 1500,
  delay: 1575,
  opacity: 0,
  reset: true
}); //,afterReveal:trickAlert

ScrollReveal().reveal('#p3', {
  duration: 1500,
  delay: 1775,
  opacity: 0,
  reset: true
}); //,afterReveal:trickBal
//fin picture

ScrollReveal().reveal('#toolLan1', {
  duration: 1500,
  delay: 475,
  opacity: 0,
  reset: true
});
ScrollReveal().reveal('#toolLan2', {
  duration: 1500,
  delay: 675,
  opacity: 0,
  reset: true
});
ScrollReveal().reveal('#toolLan3', {
  duration: 1500,
  delay: 875,
  opacity: 0,
  reset: true
});
ScrollReveal().reveal('.titleLeft', slideRight); //svg landing
//arrow

function trickArrow() {
  $("#arrow").addClass("text-logo");
}

ScrollReveal().reveal("#imageFifth", {
  duration: 0,
  delay: 875,
  opacity: 0,
  reset: true,
  afterReveal: trickArrow
}); //plus

ScrollReveal().reveal("#photo1", {
  duration: 0,
  delay: 875,
  opacity: 0,
  reset: true,
  afterReveal: trickPlus
});

function trickPlus() {
  $("#plus").addClass("plus");
} //share


ScrollReveal().reveal("#photo2", {
  duration: 0,
  delay: 875,
  opacity: 0,
  reset: true,
  afterReveal: trickShare
});

function trickShare() {
  $("#shareSvg").addClass("text-share");
} //background svg


ScrollReveal().reveal("#photo3", {
  duration: 0,
  delay: 875,
  opacity: 0,
  reset: true,
  afterReveal: trickImage
});

function trickImage() {
  $("#imageSvg").addClass("flip");
} //svg showcase en landing


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
  $(".fade").each(function (index) {
    (function (that, i) {
      var t = setTimeout(function () {
        $(that).addClass("colorSvg");
      }, 500 * i);
    })(this, index);
  });
} //fin landing
//aparicion consejos en pantalla tutorial


$(".circle").click(function (e) {
  $(".advice").each(function (index, a) {
    $(a).css("display", "none");
  });
  $("#" + this.id + "Advice").css("display", "flex");
}); //aparacion tutorial

$(".timeline").each(function (index) {
  var that = this;
  var t = setTimeout(function () {
    $(that).addClass("anima");
  }, 1500 * index);
});
$(".at").each(function (index) {
  var that = this;
  var t = setTimeout(function () {
    $(that).addClass("animaboost");
  }, 1500 * index);
}); //inicio showcase
//overlay showcase
//aparicion showcase

var overShow = false;
$(".showcaseChest").each(function (index, a) {
  ScrollReveal().reveal($(a), {
    duration: 1500,
    delay: 475 + 100 * index,
    opacity: 0,
    reset: true,
    afterReveal: tra
  });
});

function tra() {
  $(".showcaseChest").hover(function (e) {
    $(".showcaseOverlay").css("display", "none");
    $("#" + this.id + "Overlay").css("display", "flex");
  });
} //fin showcase
//efecto cabecera


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

/*$(".modalLienzo").each((index)=> {
	asignarLienzo(index);

});
	
function asignarLienzo(param) {
	let s=Snap($("#lienzo"+param).css("width"),$("#lienzo"+param).css("height"));
	s.attr({ id: 'picture'+param,class: "userPicture" });
	var coordenadas = $("#lienzo"+param).position();
	s.attr({position: "absolute"});
	$("#picture"+param).css("top",coordenadas.top + "px");
	$("#picture"+param).css("left",coordenadas.left + "px");

}*/
//funciones de conversion

function VwToPx(param) {
  return param * window.innerWidth / 100;
}

function VhToPx(param) {
  return param * window.innerHeight / 100;
} //cambio palabras en la landing page (sitio web)


var arrayCh = ["APLICACION", "RED SOCIAL", "DOCUMENTO", "ANUNCIO"];
var arrayChEn = ["APPLICATION", "SOCIAL MEDIA", "DOCUMENT", "ADS"];
var arrayChFr = ["APPLICATION", "RÉSEAU SOCIAL", "DOCUMENT", "PUBLICITÉ"];
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
    if (sessionStorage.getItem('idiomaCh') == "en") {
      $("#changeWord").text(arrayChEn[contadorCh]);
    } else if (sessionStorage.getItem('idiomaCh') == "fr") {
      $("#changeWord").text(arrayChFr[contadorCh]);
    } else {
      $("#changeWord").text(arrayCh[contadorCh]);
    }

    $("#changeWord").css("opacity", 1);
  }, 1000);
  contadorCh++;

  if (contadorCh >= arrayCh.length) {
    contadorCh = 0;
  }
} //descarga


$(".download").each(function (index) {
  $(this).on("click", function () {
    $("#downloadContainer").css("display", "flex");
    var id = $(this).attr("id");
    id = id.split("-");
    id = id[1];
    $("#selectDown").change(function () {
      console.log("id:" + id);
      enviar2(id);
      $("#textDown").css("display", "flex");
    });
  });
});
$("#closeDownload").click(function () {
  $("#downloadContainer").css("display", "none");
});

function enviar2(param) {
  var datos = {
    "variable1": param // Dato #1 a enviar
    //"variable2" : variable2 // Dato #2 a enviar
    // etc...

  };
  var url = "./obtenerDatos"; // URL a la cual enviar los datos
  //descarga grupos

  if ($("#grupoDownload").val() == "true") {
    url = "../obtenerDatos";
  }

  enviarDatos(datos, url); // Ejecutar cuando se quiera enviar los datos

  function enviarDatos(datos, url) {
    $.ajax({
      data: {
        "_token": $("meta[name='csrf-token']").attr("content"),
        datos: datos
      },
      url: url,
      type: 'post',
      success: function success(response) {
        console.log(response); // Imprimir respuesta del archivo
        //window.location.replace(response);

        $("#textDown").text(response[0]);
      },
      error: function error(_error) {
        console.log(_error.responseText); // Imprimir respuesta de error
      }
    });
  }
}

$("#download").click(function () {
  console.log($("#selectDown").val());

  if ($("#selectDown").val() == "svg") {
    saveSvg($("#textDown").val(), "kubin");
  } else {
    var h = 0;
    var w = 0;

    if (screen.width > 900) {
      h = VhToPx(60);
      w = VwToPx(30);
    } else {
      h = VhToPx(55);
      w = VwToPx(80);
    }

    var svgData = "";
    svgData = "<svg height=\"".concat(h, "\" version=\"1.1\" width=\"").concat(w, "\" xmlns=\"http://www.w3.org/2000/svg\">");
    svgData += $("#textDown").val();
    svgData += "</svg>";
    SVGToImage({
      svg: svgData,
      mimetype: "image/png",
      width: 500,
      quality: 1
    }).then(function (base64image) {
      var downloadLink2 = document.createElement("a");
      downloadLink2.href = base64image;
      downloadLink2.download = "kubin";
      document.body.appendChild(downloadLink2);
      downloadLink2.click();
      document.body.removeChild(downloadLink2);
    })["catch"](function (err) {
      console.log(err);
    });
  }
}); //svg

function saveSvg(svgEl, name) {
  //svgEl.setAttribute("xmlns", "http://www.w3.org/2000/svg");
  //var svgData = svgEl.outerHTML;
  var h = 0;
  var w = 0;

  if (screen.width > 900) {
    h = VhToPx(60);
    w = VwToPx(30);
  } else {
    h = VhToPx(55);
    w = VwToPx(80);
  }

  var svgData = "";
  svgData = "<svg height=\"".concat(h, "\" version=\"1.1\" width=\"").concat(w, "\" xmlns=\"http://www.w3.org/2000/svg\">");
  svgData += svgEl;
  svgData += "</svg>";
  console.log(svgData);
  var preface = '<?xml version="1.0" standalone="no"?>\r\n';
  var svgBlob = new Blob([preface, svgData], {
    type: "image/svg+xml;charset=utf-8"
  });
  var svgUrl = URL.createObjectURL(svgBlob);
  var downloadLink = document.createElement("a");
  downloadLink.href = svgUrl;
  downloadLink.download = name;
  document.body.appendChild(downloadLink);
  downloadLink.click();
  document.body.removeChild(downloadLink);
} //png


function SVGToImage(settings) {
  var _settings = {
    svg: null,
    // Usually all SVG have transparency, so PNG is the way to go by default
    mimetype: "image/png",
    quality: 0.92,
    width: "auto",
    height: "auto",
    outputFormat: "base64"
  }; // Override default settings

  for (var key in settings) {
    _settings[key] = settings[key];
  }

  return new Promise(function (resolve, reject) {
    var svgNode; // Create SVG Node if a plain string has been provided

    if (typeof _settings.svg == "string") {
      // Create a non-visible node to render the SVG string
      var SVGContainer = document.createElement("div");
      SVGContainer.style.display = "none";
      SVGContainer.innerHTML = _settings.svg;
      svgNode = SVGContainer.firstElementChild;
    } else {
      svgNode = _settings.svg;
    }

    var canvas = document.createElement('canvas');
    var context = canvas.getContext('2d');
    var svgXml = new XMLSerializer().serializeToString(svgNode);
    var svgBase64 = "data:image/svg+xml;base64," + btoa(svgXml);
    var image = new Image();

    image.onload = function () {
      var finalWidth, finalHeight; // Calculate width if set to auto and the height is specified (to preserve aspect ratio)

      if (_settings.width === "auto" && _settings.height !== "auto") {
        finalWidth = this.width / this.height * _settings.height; // Use image original width
      } else if (_settings.width === "auto") {
        finalWidth = this.naturalWidth; // Use custom width
      } else {
        finalWidth = _settings.width;
      } // Calculate height if set to auto and the width is specified (to preserve aspect ratio)


      if (_settings.height === "auto" && _settings.width !== "auto") {
        finalHeight = this.height / this.width * _settings.width; // Use image original height
      } else if (_settings.height === "auto") {
        finalHeight = this.naturalHeight; // Use custom height
      } else {
        finalHeight = _settings.height;
      } // Define the canvas intrinsic size


      canvas.width = finalWidth;
      canvas.height = finalHeight; // Render image in the canvas

      context.drawImage(this, 0, 0, finalWidth, finalHeight);

      if (_settings.outputFormat == "blob") {
        // Fullfil and Return the Blob image
        canvas.toBlob(function (blob) {
          resolve(blob);
        }, _settings.mimetype, _settings.quality);
      } else {
        // Fullfil and Return the Base64 image
        resolve(canvas.toDataURL(_settings.mimetype, _settings.quality));
      }
    }; // Load the SVG in Base64 to the image


    image.src = svgBase64;
  });
} //fin descarga
//aparicion formulario cambiar foto


$("#cambiarFoto").click(function () {
  $("#changeFotoModal").css("display", "flex");
}); //cerrar formulario cambiar foto

$("#closeFoto").click(function () {
  $("#changeFotoModal").css("display", "none");
}); //idiomaSelect

$("#idiomaSelect").change(function () {
  enviar3($("#idiomaSelect").val());
  cambioArrayCh($("#idiomaSelect").val());
});

function enviar3(param) {
  var datos = {
    "variable1": param // Dato #1 a enviar
    //"variable2" : variable2 // Dato #2 a enviar
    // etc...

  };
  var url = "./idioma"; // URL a la cual enviar los datos

  enviarDatos2(datos, url); // Ejecutar cuando se quiera enviar los datos

  function enviarDatos2(datos, url) {
    $.ajax({
      data: {
        "_token": $("meta[name='csrf-token']").attr("content"),
        datos: datos
      },
      url: url,
      type: 'post',
      success: function success(response) {
        console.log(response); // Imprimir respuesta del archivo

        location.reload();
        cambioArrayCh(datos["variable1"]);
      },
      error: function error(_error2) {
        console.log(_error2.responseText); // Imprimir respuesta de error
      }
    });
  }
}

function cambioArrayCh(param) {
  sessionStorage.setItem('idiomaCh', param);
} //loader


window.onload = function () {
  $(".loader_container").css("display", "none");
}; //color_scheme


var scheme_count = 0;

if (localStorage.getItem("scheme_count") != null) {
  scheme_count = localStorage.getItem("scheme_count");
}

if (localStorage.getItem("scheme") != null) {
  if (scheme_count % 2 == 1) {
    $("#color_scheme").removeClass("bi bi-brightness-high-fill");
    $("#color_scheme").removeClass("sun");
    $("#color_scheme").addClass("moon");
    $("#color_scheme").addClass("bi bi-moon-stars-fill");
  } else {
    $("#color_scheme").removeClass("bi bi-moon-stars-fill");
    $("#color_scheme").removeClass("moon");
    $("#color_scheme").addClass("sun");
    $("#color_scheme").addClass("bi bi-brightness-high-fill");
  }
}

$("#color_scheme").click(function () {
  dark("#color_scheme");
});
$("#color_scheme2").click(function () {
  dark("#color_scheme2");
});

function dark(param) {
  console.log(scheme_count);
  scheme_count++;

  if (scheme_count % 2 == 1) {
    $(param).removeClass("bi bi-brightness-high-fill");
    $(param).removeClass("sun");
    $(param).addClass("moon");
    setTimeout(function () {
      $(param).addClass("bi bi-moon-stars-fill");
    }, 500);
    toggleDarkMode();
  } else {
    $(param).removeClass("bi bi-moon-stars-fill");
    $(param).removeClass("moon");
    $(param).addClass("sun");
    setTimeout(function () {
      $(param).addClass("bi bi-brightness-high-fill");
    }, 500);
    toggleDarkMode();
  }
}

function toggleDarkMode() {
  if (scheme_count % 2 == 1) {
    document.documentElement.setAttribute('data-theme', 'dark');

    if (localStorage.getItem("scheme") == null || localStorage.getItem("scheme") == "light") {
      localStorage.setItem("scheme", "dark");
      localStorage.setItem("scheme_count", scheme_count);
    }

    trans();
  } else {
    document.documentElement.setAttribute('data-theme', 'light');

    if (localStorage.getItem("scheme") == null || localStorage.getItem("scheme") == "dark") {
      localStorage.setItem("scheme", "light");
      localStorage.setItem("scheme_count", scheme_count);
    }

    trans();
  }
}

var trans = function trans() {
  document.documentElement.classList.add('transition');
  window.setTimeout(function () {
    document.documentElement.classList.remove('transition');
  }, 1000);
};

window.onload = function () {
  if (localStorage.getItem("scheme") != null) {
    document.documentElement.setAttribute('data-theme', localStorage.getItem("scheme"));
  }
}; //aparecer modal crear grupo


$("#create_group").click(function () {
  $("#createGroupModal").css("display", "flex");
}); //desaparecer modal crear grupo

$("#closeGroup").click(function () {
  $("#createGroupModal").css("display", "none");
}); //aparecer modal ver grupo

$("#see_group").click(function () {
  $("#seeGroupModal").css("display", "flex");
}); //desaparecer modal ver grupo

$("#closeGroup2").click(function () {
  $("#seeGroupModal").css("display", "none");
}); //mostrar lista de miembros en un grupo

$("#member_open").click(function () {
  console.log("ha");
  $("#modalMembersContainer").css("display", "flex");
}); //desaparecer lista de miembros en un grupo

$("#closeGroup3").click(function () {
  $("#modalMembersContainer").css("display", "none");
}); //mostrar lista de categorias en un grupo

$("#category_open").click(function () {
  console.log("ha2");
  $("#modalCategoryContainer").css("display", "flex");
}); //desaparecer lista de categorias en un grupo

$("#closeGroup4").click(function () {
  $("#modalCategoryContainer").css("display", "none");
}); //cambiar de nombre el grupo

$("#changeName").click(function () {
  $("#modalNameContainer").css("display", "flex");
}); //cerrar el modal de cambiar nombre

$("#closeGroup5").click(function () {
  $("#modalNameContainer").css("display", "none");
}); //cambiar nombre

$("#nameBtn").click(function () {
  var datos = {
    "variable1": $("#changeNameInput").val() // Dato #1 a enviar
    //"variable2" : variable2 // Dato #2 a enviar
    // etc...

  };
  var url = "../cambiarNombreGrupo"; // URL a la cual enviar los datos

  enviarDatos2(datos, url); // Ejecutar cuando se quiera enviar los datos

  function enviarDatos2(datos, url) {
    $.ajax({
      data: {
        "_token": $("meta[name='csrf-token']").attr("content"),
        datos: datos
      },
      url: url,
      type: 'post',
      success: function success(response) {
        console.log(response); // Imprimir respuesta del archivo
      },
      error: function error(_error3) {
        console.log(_error3.responseText); // Imprimir respuesta de error
      }
    });
  }
});
/******/ })()
;