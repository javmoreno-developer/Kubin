
var dragging = 0;
var handleGroup;
var s="";
let h=0;
let w=0;
var altoSvg=20;
var anchoSvg=35;
var contadorEdi=0;
var drag=true;
var click=false;

//funciones de conversion
function VwToPx(param) {
  return (param*window.innerWidth)/100;
}

function VhToPx(param) {
  return (param*window.innerHeight)/100;
}


//identificamos si se trata de touchmove o de drag


if(screen.width>900) {
   h=VhToPx(60);
   w=VwToPx(30);

} else {
   h=VhToPx(48);
   w=VwToPx(80);
   altoSvg=38;
   anchoSvg=10;
}

if($("#lienzo").length==0) {
  s=Snap(w,h);
  s.attr({ id: 'lienzo' });
  
} else {
  
  s=Snap("#lienzo");
  
}

var burst = new mojs.Shape({
  left: 0, top: 0,
  radius:   { 4: 4 },
  angle:    45,
  shape:        'circle',
  id:           "seleccion1",
  radius:       7,
  radiusX:      7, // explicit radiusX
  fill:         'black',
  stroke:        "red",
  strokeWidth:     3,
  opacity:          0,
  isShowStart:  true,
  className:      "seleccion_creacion",
});



var burst2 = new mojs.Shape({
  left: 0, top: 0,
  radius:   { 4: 4 },
  angle:    45,
  shape:        'circle',
  id:           "seleccion2",
  radius:       7,
  radiusX:      7, // explicit radiusX
  fill:         'black',
  stroke:        "red",
  strokeWidth:     3,
  opacity:          0,
  isShowStart:  true,
  className:      "seleccion_creacion",
});

$( ".tool" ).each(function(index) {

    //escondemos los punteros

    $(this).on("click", function(){

      if($(this).attr("id")=="cancelFill") {
        elimina_punteros_sel();
        elimina_punteros_cre();
      }
    	//$("#board").on("click",(e)=> {
      $("#punteros").click((e)=> {
      
        burst
          .tune({ x: e.pageX, y: e.pageY,opacity: 1 })
          .play();
      });
      $("#punteros").on("mousedown",(e)=> {
        burst2
          .tune({ x: e.pageX, y: e.pageY,opacity: 1 })
          .play();
      });
      //final
    });
});


//figuras de seleccion
var burst3 = new mojs.Shape({
  left: 0, top: 0,
  radius:   { 4: 4 },
  angle:    45,
  shape:        'circle',
  radius:       7,
  radiusX:      7, // explicit radiusX
  fill:         'blue',
  id:           "seleccion3",
  stroke:        "red",
  strokeWidth:     3,
  opacity:          0,
  isShowStart:  true,
  className:      "seleccion_apunte",
});

var burst4 = new mojs.Shape({
  left: 0, top: 0,
  radius:   { 4: 4 },
  angle:    45,
  shape:        'circle',
  id:           "seleccion4",
  radius:       7,
  radiusX:      7, // explicit radiusX
  fill:         'blue',
  stroke:        "red",
  strokeWidth:     3,
  opacity:          0,
  isShowStart:  true,
  className:      "seleccion_apunte",
});



//seleccionar figuras
$("#seleccionar").click((e)=> {
  console.log($("#lienzo"));
  $("#lienzo").css("z-index",99);
  $("#doneFill").css("z-index",90);
  $("#doneFill").css("display","flex");

  $("#lienzo").click((e)=> {
    //console.log(e.clientX);
    //console.log(e.clientY);
    figuraSel=Snap.getElementByPoint(e.clientX,e.clientY);
    console.log(figuraSel.type);
    if(figuraSel.type!="svg") {
    var posicion = figuraSel.node.getBoundingClientRect();

    //mover figuras

    var move = function(dx,dy) {
      this.attr({
        transform: this.data('origTransform') + (this.data('origTransform') ? "T" : "t") + [dx, dy]
      });
    }

    var start = function() {
      this.data('origTransform', this.transform().local );
    }

    var stop = function() {
      console.log('finished dragging');
      click=true;
    }


   



    //move
    elimina_punteros_cre();
      figuraSel.drag(move, start, stop);
    

    

       burst3
          .tune({ x: (posicion.left), y: posicion.top,opacity: 1 })
          .play();

    burst4
          .tune({ x: (posicion.right), y: posicion.bottom,opacity: 1 })
          .play();
        

    } else {
      contadorEdi=0;
    }
    
   



    
    //ultimas figuras de seleccion
   
  });
  posicion=0;
});

function elimina_punteros_sel() {
  let conjunto=document.getElementsByClassName("seleccion_apunte");
 
  for(let i=0;i<conjunto.length;i++) {
    conjunto[i].style.opacity=0;
  }
  
}

function elimina_punteros_cre() {
   let conjunto2=document.getElementsByClassName("seleccion_creacion");
   for(let i=0;i<conjunto2.length;i++) {
     conjunto2[i].style.opacity=0;
   }
}