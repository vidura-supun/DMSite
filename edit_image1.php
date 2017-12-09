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
    if(!is_uploaded_file($_FILES['image1']['tmp_name'])) 

      {
        echo "please select an image.";
      }
      else
      {
        $image = addslashes($_FILES['image1']['tmp_name']);
        $uid=$_POST['uid'];
        $image = file_get_contents($image);
        $image = base64_encode($image);
        saveimage1($id,$uid,$image);

      }

    }
   

    function saveimage1($id,$uid,$image)
    {
      $con = mysqli_connect("localhost", "root", "", "Vipath");
      $qry="UPDATE markers SET image1 = '$image' WHERE id = '$id'";
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

    //*********** Show
?>
