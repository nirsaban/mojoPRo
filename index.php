<?php 
        require 'php/backend.php';
        //create object from class
        $edu = new Artikim();
        //create varibale contain all address without lng at lat
        $coll = $edu->getAddressNoltlng();
        $coll = json_encode($coll,JSON_UNESCAPED_UNICODE);
        //create vaiable that conain all data from DB
        $all = $edu->getAlladdress();
        $all = json_encode($all,JSON_UNESCAPED_UNICODE);
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script> 
    //create var that contain all addres
    let allData = <?php print_r($all)?>;
    //create var that contain address without lat lng
     let fromDb = <?php print_r($coll)?>; 
      </script> 
  </head>

<body class= "color-change-2x">
<div class="container-all">
<div class="container ">
<h1 class ="tracking-in-expand ">MOJO SHOPS</h1>
<div id="map"></div><br><br>
<a class="btn btn-warning col-md-2" href="table.php">list address</a>

</div>

   <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyB3_8yCT6vuqIzMv9XslBHG--OLtbewBEg&callback=initMap">
    </script>
    <script src="index.js"></script>
  </body>
</html>