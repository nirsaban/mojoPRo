<?php

class Artikim{
//declare all properties
private $id;
private $name;
private $address;

private $lat;
private $lng;
private $conn;
private $tableName ='icecream';

//set and get all propertis
function setId($id) { $this->id = $id; }
function getId() { return $this->id; }
function setName($name) { $this->name = $name; }
function getName() { return $this->name; }
function setAddress($address) { $this->address = $address; }
function getAddress() { return $this->address; }
function setLat($lat) { $this->lat = $lat; }
function getLat() { return $this->lat; }
function setLng($lng) { $this->lng = $lng; }
function getLng() { return $this->lng; }

//connect to DB
   public  function __construct(){
    require_once('DbConnect.php');
    $conn = new DbConnect();
    $this->conn = $conn->connect();
    }
    //get all Address without lng lat
    public function getAddressNoltlng(){
        $sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL ";
        $stmt = $this->conn->prepare($sql);
         $stmt->execute();
       return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    //get all addres from db
    public function getAlladdress(){
      $sql = "SELECT * FROM $this->tableName";
      $stmt = $this->conn->prepare($sql);
       $stmt->execute();
     return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }
  //insert new address and name to Db
  public function insertNew(){
    $sql = $this->conn->prepare("INSERT INTO $this->tableName (name, address) VALUES (:name, :address)");
    $result = $sql->execute(array('name' => $this->name, 'address' => $this->address));
    if($result){
      return true;
    }
    else{
      return false;
    }
  }
  //delete row according name and address
  public function delShop($id){
     $count= $this->conn->prepare("DELETE FROM $this->tableName WHERE id =:id");
     $count->bindParam(":id",$id,PDO::PARAM_INT);
     $result = $count->execute();
     if($result){
       return true;
     }else{
       return false;
     }
  }
  //update new lat and lng
    public function updateAddressWithLatLng(){
      $sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':lat',$this->lat);
      $stmt->bindParam(':lng',$this->lng);
      $stmt->bindParam(':id',$this->id);
      if($stmt->execute()){
        return true;
      }
      else{
        return false;
      }

    }

}
?>



