<?php
  $user=include('authCheck/adminCheck.php');
  require('admin-logging/connection.php');
  if($user=='other'){
    header('Location: login.php');
  }
  $id = mysqli_escape_string($myConn, trim(stripslashes($_GET['id'])));
  
  $q="SELECT * FROM markers where id = $id";
  $query=@mysqli_query($myConn, $q);
  $arr=mysqli_fetch_array($query, MYSQLI_ASSOC);
  if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $id = mysqli_escape_string($myConn, trim(stripslashes($_POST['id'])));
    $subject= mysqli_escape_string($myConn, trim(stripslashes($_POST['subject'])));
    $dead= mysqli_escape_string($myConn, trim(stripslashes($_POST['dead'])));
    $description= mysqli_escape_string($myConn, trim(stripslashes($_POST['description'])));
    $address= mysqli_escape_string($myConn, trim(stripslashes($_POST['address'])));
    $dtype= mysqli_escape_string($myConn, trim(stripslashes($_POST['dtype'])));
    

    $q1="UPDATE markers SET subject = '$subject', deaths = '$dead', description = '$description', address = '$address', type = '$dtype' WHERE id=$id";
    $query2=@mysqli_query($myConn, $q1);
    header('Location: postOp.php');

  }


?>  
<!DOCTYPE HTML>
<html>
<head>    <link href="css.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcrvlJvHTb1ZgAivZf5nloPgtY9RP34Ok"></script>
    <script>

      var geocoder;
      var map;
      var mapOptions = {
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
      var marker;
      function initialize() {
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        codeAddress();
      }
      function myfunction() {
        document.getElementById('map_canvas').style.display="block"
        codeAddress();
      }
      function codeAddress() {
        var address = document.getElementById('address').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            if(marker)
              marker.setMap(null);
            marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                draggable: true
            });
            google.maps.event.addListener(marker, "dragend", function() {
              document.getElementById('lat').value = marker.getPosition().lat();
              document.getElementById('lng').value = marker.getPosition().lng();
            });
            document.getElementById('lat').value = marker.getPosition().lat();
            document.getElementById('lng').value = marker.getPosition().lng();
          } else {
            alert('Given Location Error');
          }
        });
      }
    </script>

<?php  echo '</head>
<body onload="initialize()" style="margin-top:200px; background-color: Gray">

<div style="margin-left: 20px; margin-top: 150px">
<form action="editPost.php" method="post"><div align="center"> <table align="center" style="margin-top:-30px;margin-bottom:-15px">
  <h1 align="center"> <b> EDIT THE INFORMATION </b></h1>
  <input id="address" name="id" type="hidden" style="" value='.$id.'>
  <tr><td>  SUBJECT: </td> <td> <input id="subject" name="subject" type="textbox" value=' .$arr['subject']. ' required>  <br><br> </td> </tr>
  <tr><td>  CASUALITIES: </td> <td> <input id="subject" name="dead" type="textbox" value=' .$arr['deaths']. ' required>  <br><br> </td> </tr>
  <tr><td>  DESCRIPTION: </td> <td><textarea id="description" name="description" rows="4" cols="50" maxlength="400">' .$arr['description'].'</textarea>   <br><br> </td> </tr>
  <tr><td>ADDRESS: </td> <td><input id="address" name="address" type="textbox" style="" value='.$arr['address'].'>  <br><br> </td> </tr>
  <tr><td>TYPE :</td> <td> <select  name="dtype">
    <option value="flood">Flood</option>
    <option value="drougt">Drougt</option>
    <option value="accident">accident</option>
    <option value="tsunami">tsunami</option>
    <option value="fire">fire</option>
    <option value="elec">elec</option>
    <option value="landslide">landslide</option>
  </select>  <br><br> </td> </tr>

<div>
  <input style="display:none" type="text" id="lat" name="lat"/>
  <input style="display:none" type="text" id="lng" name="lng"/>

</div><br>
<tr> <td>
<input type="submit"> </td> <td><input type="button" value="check the address" name="location" onclick="codeAddress()" required>
</td> </tr>

 </table>
</div></form><br>
</div>
<div id="map_canvas" style="height:50%;top:3px;width: 75%;margin-right: auto;margin-left:auto ; margin-bottom: 100px" ></div>

</body>
</html>'
?>
<?php include('footer.php')?>