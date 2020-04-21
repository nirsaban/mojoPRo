<?php
require 'backend.php';
$id = file_get_contents("php://input");
$delItem = new Artikim;
$result = $delItem->delShop($id);
if($result){
    echo 'הכתובת נמחקה';
}else{
    echo 'משהו השתבש';
}




?>