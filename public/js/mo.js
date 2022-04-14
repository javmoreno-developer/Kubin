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
    	$("#board").click((e)=> {
			  burst
	    		.tune({ x: e.pageX, y: e.pageY,opacity: 1 })
	    		.play();
		});
		$("#board").mousedown((e)=> {
			  burst2
	    		.tune({ x: e.pageX, y: e.pageY,opacity: 1 })
	    		.play();
		});
    });
});



