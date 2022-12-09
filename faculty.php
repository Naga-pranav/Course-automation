<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HomePage</title>
    <link rel="stylesheet" href="css/adminhome.css">
    <style>
    body {
    margin-top:50px;
    padding-top: 50px;
    background-image: url("img/background.jpg");
}

.btn-layer {
    height: 100%;
    width: 300%;
    position: absolute;
    left: -100%;
    background: -webkit-linear-gradient(right, lightgrey, #c3c6c8, #6a838f, #aedbf7);
    border-radius: 5px;
    transition: all 0.9s ease;
    padding-bottom: 10pxl
}
</style>
  </head>
  <body>
    <center>
      <div class="cover">
        <form action="fac_pref.php">
        <div class="field btn">
           <div class="btn-layer"></div>
           <input id="loginpress" type="submit" value="Course preferences">
        </div></form>
        
        <br>
        <form action="view_add.php"><div class="field btn">
           <div class="btn-layer"></div>
           <input id="loginpress" type="submit" value="Allocated courses">
        </div></form>
        
    </center>


  </body>
</html>