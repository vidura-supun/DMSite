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
    if(!is_uploaded_file($_FILES['image3']['tmp_name']))

      {
        echo "you didn't select a third image";
      }
      else
      {
        $image3 = addslashes($_FILES['image3']['tmp_name']);

        $image3 = file_get_contents($image3);
        $image3 = base64_encode($image3);
        saveimage3($id,$uid,$image3);
      }

    }
function saveimage3($id,$uid,$image3)
    {
      $con = mysqli_connect("localhost", "root", "", "Vipath");
      $qry="UPDATE markers SET image3 = '$image3' WHERE id = '$id'";
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
