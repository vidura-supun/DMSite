<?php
  $user=include('authCheck/adminCheck.php');
  if($user=='other'){
    header('Location: login.php');
  }


?>
<!DOCTYPE HTML>
<html>
<head>    <link href="css/css.css" rel="stylesheet">
<style>

table, th, td {
   border: 1px solid black;
   text-align: center;
}

</style>
  </head>
<body style="margin-left: 20px;margin-top:20px">

  <?php
  require("admin-logging/db_connection.php");

  $sql = "SELECT * FROM markers WHERE approval='y'";
  $result = $conn->query($sql);

  echo "<table style='width:100%'>";
  echo "<tr>
  
  <th>Type</th>
  <th>Description</th>
  <th>Address</th>
  <th>Type</th>
  <th>Image1</th>
  <th>Image2</th>
  <th>Image3</th>
        </tr>";

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr>
          
          <td> " . $row["subject"] . " </td>
          <td> " . $row["description"] . "</td>
          <td> " . $row["address"]. "</td>
          <td> " . $row["type"]. " </td>
          <td>"?><?php echo '<img  height="100" src="data:imagetmp;base64, '.$row['image1']. ' ">';?><?php echo "</td>
          <td>"?><?php echo '<img  height="100" src="data:imagetmp;base64, '.$row['image2']. ' ">';?><?php echo "</td>
          <td>"?><?php echo '<img  height="100" src="data:imagetmp;base64, '.$row['image3']. ' ">';?><?php echo "</td>
		  </tr>";
      }
  } else {
      echo "0 results";
  }
  $conn->close();
echo "</table>"

  ?>
<?php  include('footer.php'); ?>
</body>
</html>
