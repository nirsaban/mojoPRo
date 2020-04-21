<?php
 require 'php/backend.php';
$table = new Artikim;
$allAddress = $table->getAlladdress();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/table.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script src="index.js"></script>
</head>
<body>


<div class="container">
<a href="index.php" class="btn btn-dark">back to map</a>
<div class="forms">
<div class="text-center   p-5 col-md-5"  >
<p class="h4 mb-4">ADD SHOP</p>
<input type="text" id="address" class="form-control mb-4" placeholder="הכנס כתובת, לדוגמה:רוטשילד 38, תל אביב">
<input type="text" id="shopName" class="form-control mb-4" placeholder="הכנס את שם החנות">
<button class="btn btn-info btn-block my-4" onclick="AddLocation()" type="submit">Add Address</button>
</div>
<div class="row">
<h2>My Customers</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
<table id="myTable">
  <tr class="header">
     <th>#</th>
    <th style="width:60%;">Name</th>
    <th style="width:40%;">address</th>
    <th style="width:40%;">delete</th>
  </tr>
  <?php $count  = 0;?>
  <?php foreach($allAddress as $address):?>
  <?php $count++ ?>
  <tr>
  <td><?= $count ?></td>
      <td><?= $address['name']?></td>
      <td><?= $address['address']?></td>
    <td><i  data-id = <?= $address['id']?>  class="fa fa-trash" aria-hidden="true" onclick="deleteAddress(this.dataset)"></i></td>
  </tr>
  <?php endforeach;?>
</table>

</div>
</div>

<script >
  
  function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    td2 = tr[i].getElementsByTagName("td")[2];
    if (td || td2) {
      txtValue = td.textContent || td.innerText;
      txtValue2 = td2.textContent || td2.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter)   > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}



</script>

</body>
</html>