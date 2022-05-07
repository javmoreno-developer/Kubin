<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <title>Testing</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
  }
  
  #total {
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #select_scheme_container {
    height: 10vh;
    width: 10vw;
    border: 3px solid red;
    display: flex;
  }
  .bi-moon-stars-fill {
    opacity: 0;
  }
  i {
    font-size: 50px;
  }
 
  @keyframes change {
    from {
      opacity: 1;
    }
    to {
      opacity: 0;
    }
  }

  .anotherclass {
    animation: change 1s ease-in-out forwards;
  }
  .fade {
    animation: unchange 1s ease-in-out forwards;
    animation-delay: 1s;
  }
  @keyframes unchange {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
</style>
<body>

 <div id="total">
   <div id="select_scheme_container">
    <i id="p" class="bi bi-brightness-high-fill"></i>
    <i id="s" class="bi bi-moon-stars-fill"></i>
  </div>
 </div>
  
</body>
<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  $("#p").click(()=> {
    console.log($("#p"));
    $("#p").addClass("anotherclass");
    $("#s").addClass("fade");
  });
</script>
</html>