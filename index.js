var map;
var geocoder;
//load app on init
function initMap() {
  //create variable map from google.maps class
    var map = new google.maps.Map(
    document.getElementById('map'), {zoom: 13, center: {lat:31.771959, lng: 35.217018}});    
    geocoder = new google.maps.Geocoder();
    infoWindow = new google.maps.InfoWindow;
    //center the map onload by correct position in map
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
    
          infoWindow.setPosition(pos);
          infoWindow.setContent('<img src ="images/person.png" width="20px" height ="30px"/>');
          infoWindow.setContent
          infoWindow.open(map);
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    //pass variable to function that contain all rows without lat & lng and set new values
    codeAddress(fromDb)
    //pass all data  to function and set the lat lng on map
    showAllAddress(allData);

    function showAllAddress(allData){
      var infowind = new google.maps.InfoWindow;
      //foreach on array and set on map
        allData.forEach(data=>{
     var  div = document.createElement('div');
     var strong = document.createElement('strong');
          strong.textContent = data.name;
          div.appendChild(strong);
    
            var marker = new google.maps.Marker({
                map: map,
                icon: 'images/summer.png',
                position: new google.maps.LatLng(data.lat ,data.lng),
            });
            marker.addListener('click',function(){
              console.log(infowind);
              infowind.setContent(div);
              infowind.open(map,marker)
            })
            
         
        })
    }
    //set lat and lng to address
    function codeAddress(fromDb) {
        fromDb.forEach(data => {
            let address =  data.address;
            address.trim()
            geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
             map.getCenter().lat()
             let points = {}
                 points.id = data.id
                 points.lat = map.getCenter().lat();
                 points.lng = map.getCenter().lng();
                 //send the new data to function
                 updateAddressWithLatLng(points)
              
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
    })
      }
      //update the table with new data
    function  updateAddressWithLatLng(points){

        $.ajax({
            url:'php/action.php',
            method:'post',
            data:points,
            success:function(res){
                console.log(res);
            }
        })
         
      }


  }






  
  function AddLocation(){
   
    let address = document.getElementById('address').value;
    let shopName = document.getElementById('shopName').value;
    let newShop = {
        address :address,
        name :shopName
    }
    
    $.ajax({
        url:'php/insert.php',
        method:'post',
        data:newShop,
        success:function(res){
          window.location.reload(false); 
          alert(res)
        }
    })

  }
  function deleteAddress(data){

    // let address_del = document.getElementById('address-del').value;
    // let shopName_del = document.getElementById('shopName-del').value;
    // let delShop = {
    //     address :address_del,
    //     name :shopName_del
    // }
    
    $.ajax({
        url:'php/delete.php',
        method:'post',
        data:data.id,
        success:function(res){
          window.location.reload(); 
          alert(res)
        }
    })
  }
