<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <title>Testing</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
  }

  
</style>
<body>
<svg id="svg" width="100" height="100"></svg>

<input id="button" type="button" class="zhxx_api_button" value="pulsa">
</body>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--Snap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.5.1/snap.svg-min.js" integrity="sha512-Gk+uNk8NWN235mIkS6B7/424TsDuPDaoAsUekJCKTWLKP6wlaPv+PBGfO7dbvZeibVPGW+mYidz0vL0XaWwz4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
var svg = Snap("#svg");
var c = svg.paper.rect(20, 20, 60, 60, 10).attr({
    fill: "#f00"    // 红色
});

document.getElementById("button").onclick = function() {
    var m = new Snap.Matrix();
    m.translate(10, 10);
    // 旋转
    c.transform(m);
};
</script>
</html>