<?php
  $user=include('authCheck/adminCheck.php');
  if($user=='other'){
    header('Location: login.php');
  }


?>
<?php
if(isset($_POST['sumit']))
  {
    $uid=$_POST['uid'];
    if(!is_uploaded_file($_FILES['image2']['tmp_name']))

      {
        echo "you didn't select a second image";
      }
      else
      {
        $image2 = addslashes($_FILES['image2']['tmp_name']);

        $image2 = file_get_contents($image2);
        $image2 = base64_encode($image2);
        saveimage2($id,$uid,$image2);
      }

    }
   function saveimage2($id,$uid,$image2)
    {
      $con = mysqli_connect("localhost", "root", "", "Vipath");
      $qry="UPDATE markers SET image2 = '$image2' WHERE id = '$id'";
      $result=@mysqli_query($con,$qry);
      if($result)
        {
           echo "<br/> image uploaded";?><br><?php
          }
          else
          {
           echo "<br/> image not uploaded";?><br><?php
          }
    }

   
?>
