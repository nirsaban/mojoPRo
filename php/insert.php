<?php
require 'backend.php';
$newItem = new Artikim;
$newItem->setName($_REQUEST['name']);
$newItem->setAddress($_REQUEST['address']);
$result = $newItem->insertNew();
if($result){
    echo 'כתובת חדשה נוספה';
}else{
    echo 'משהו השתבש';
}


?>
