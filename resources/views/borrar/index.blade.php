<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<style>
  #hola {
    height: 50vh;
    width: 40%;
    border: 3px solid;
  }
</style>
 <div id="hola"></div>
</body>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  var down="";
  var up="";

if(screen.width>900) {
   down="mousedown";
   up="mouseup";
} else {
   down="touchstart";
   up="touchend";
}

$( "#hola" ).bind( `${down}`, function( ) {
 console.log("entro");
});

$( "#hola" ).bind( `${up}`, function( ) {
 console.log("salio");
});
</script>
</html>