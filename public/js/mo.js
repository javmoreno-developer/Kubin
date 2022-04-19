var burst = new mojs.Shape({
  left: 0, top: 0,
  radius:   { 4: 4 },
  angle:    45,
  shape:        'circle',
  radius:       7,
  radiusX:      7, // explicit radiusX
  fill:         'black',
  stroke:        "red",
  strokeWidth:     3,
  opacity:          0,
  isShowStart:  true,
});



var burst2 = new mojs.Shape({
  left: 0, top: 0,
  radius:   { 4: 4 },
  angle:    45,
  shape:        'circle',
  radius:       7,
  radiusX:      7, // explicit radiusX
  fill:         'black',
  stroke:        "red",
  strokeWidth:     3,
  opacity:          0,
  isShowStart:  true,
});

$( ".tool" ).each(function(index) {
    $(this).on("click", function(){
      //console.log("hey putooooooooo");
    	$("#body").on("click",(e)=> {
        burst
          .tune({ x: e.pageX, y: e.pageY,opacity: 1 })
          .play();
      });
      $("#body").on("mousedown",(e)=> {
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
  stroke:        "red",
  strokeWidth:     3,
  opacity:          0,
  isShowStart:  true,
});

var burst4 = new mojs.Shape({
  left: 0, top: 0,
  radius:   { 4: 4 },
  angle:    45,
  shape:        'circle',
  radius:       7,
  radiusX:      7, // explicit radiusX
  fill:         'blue',
  stroke:        "red",
  strokeWidth:     3,
  opacity:          0,
  isShowStart:  true,
});



//seleccionar figuras
$("#seleccionar").click((e)=> {
  console.log($("#lienzo"));
  $("#lienzo").css("z-index",99);

  $("#lienzo").click((e)=> {
    console.log(e.clientX);
    console.log(e.clientY);
    figuraSel=Snap.getElementByPoint(e.clientX,e.clientY);
    console.log(figuraSel);
    var posicion = figuraSel.node.getBoundingClientRect();
 
    console.log(posicion.top, posicion.right, posicion.bottom, posicion.left);
 
     //llamada a figuras de seleccion
    //top
    burst3
          .tune({ x: (posicion.left), y: posicion.top,opacity: 1 })
          .play();

    burst4
          .tune({ x: (posicion.right), y: posicion.bottom,opacity: 1 })
          .play();
  });

});