<?php
 require 'backend.php';
 //create new object from class
 $edu = new Artikim;
//update adderss 
 $coll = $edu->updateAddressWithLatLng();
$edu->setId($_REQUEST['id']);
$edu->setLat($_REQUEST['lat']);
$edu->setLng($_REQUEST['lng']);

$status = $edu->updateAddressWithLatLng();
if($status == true)
{
    echo "Updated";

}
else{
    echo "Faild";
}


?>