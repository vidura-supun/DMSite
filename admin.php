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
<body >
<div style="margin-left: 20px;margin-top:20px">
  <?php
  require("admin-logging/db_connection.php");

  $sql = "SELECT * FROM markers WHERE approval='n'";
  $result = $conn->query($sql);

  echo "<table style='width:100%'>";
  echo "<tr>
  <th>ID</th>
  <th>Uid</th>
  <th>Subject</th>
  <th>Description</th>
  <th>Address</th>
  <th>Type</th>
  <th>Image1</th>
  <th>Image2</th>
  <th>Image3</th>
  <th>approval</th>
        </tr>";

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr>
          <td> " . $row["id"]. " </td>
          <td> " . $row["uid"]. "</td>
          <td> " . $row["subject"] . " </td>
          <td> " . $row["description"] . "</td>
          <td> " . $row["address"]. "</td>
          <td> " . $row["type"]. " </td>
          <td>"?><?php echo '<img  height="100" src="data:imagetmp;base64, '.$row['image1']. ' ">';?><?php echo "</td>
          <td>"?><?php echo '<img  height="100" src="data:imagetmp;base64, '.$row['image2']. ' ">';?><?php echo "</td>
          <td>"?><?php echo '<img  height="100" src="data:imagetmp;base64, '.$row['image3']. ' ">';?><?php echo "</td>
          <td> " . $row["approval"]. " </td></tr>";
      }
  } else {
      echo "0 results";
  }
  $conn->close();
echo "</table>"
  ?>
<br><br>
  <form action="approval.php" method="post"><div align="left">
    Enter the id:<input id="id" name="id" type="textbox" required> <br><br>
    Approval : <select  name="approval">
      <option value="n">Not Approved</option>
      <option value="y">Approved</option>
    </select>

<br>
<br>
<a href="../"><input type="button" name="" value="go to homepage"></a>&nbsp;&nbsp;&nbsp;<input type="submit">
</div></form>
<br><br>
</div>
<?PHP include('footer.php'); ?>
</body>
</html>
