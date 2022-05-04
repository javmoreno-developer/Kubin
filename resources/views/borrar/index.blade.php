<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
  }
  #loaderContainer {
    height: 100vh;
    width: 100%;
    background: black;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #loader {
    height: 20%;
    width: 10%;
    border: 3px solid red;
  }
  .loader_son {
    height: 40%;
    width: 40%;
    border-radius: 50%;
    animation: speed 2s infinite ease-in-out;
  }
  
</style>
<body>
 <!---->
<div id="loaderContainer">
  <div id="loader">
    <div class="loader_son" id="first"></div>
  </div>
</div>

</body>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</html>