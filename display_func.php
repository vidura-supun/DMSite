<?php

if(isset($_POST['sumit'])){
$uid=$_POST['uid'];
     displayimage($id);}

  function displayimage($id)
    {
      $con = mysqli_connect("localhost", "root", "", "Vipath");
      $qry="SELECT image1,image2,image3 from markers where id='$id'";
      $result=mysqli_query($con,$qry);
      $row = @mysqli_fetch_array($result)
      
        ?><table width="100%"><tr><td><?php
      echo '<img  height="300" src="data:imagetmp;base64, '.$row['image1']. ' ">';?></td><td><?php
      echo '<img  height="300" src="data:imagetmp;base64, '.$row['image2']. ' ">';?></td><td><?php
      echo '<img  height="300" src="data:imagetmp;base64, '.$row['image3']. ' ">';?></td></tr><?php
      ?>
<tr>
  <td><a href="upload1.php"><input type="button" name="b1" id="b1" value="edit image"></a> 
  </td>
  <td>
   <a href="upload2.php"><input type="button" name="b2" id="b2" value="edit image"></a> 
  </td>
  <td>
   <a href="upload3.php"><input type="button" name="b3" id="b3" value="edit image"></a> 
  </td>
</tr>
</table>
<a href="index.php"><input type="button" name="" value="complete the upload"></a>
    <?php 
  }

?>