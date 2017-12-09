<?php
session_start();


if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */

        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'demo';

        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }

        $dataTime = date("Y-m-d H:i:s");
        $name=$_POST['name'];
        //Insert image content into database
        $insert = $db->query("INSERT into images (name,image, created) VALUES ('$name','$imgContent', '$dataTime')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        }
    }else{
        echo "Please select an image file to upload.";
    }
    $_SESSION["name"]=$name;
?>    <form action="view.php" method="post" enctype="multipart/form-data">
        <input type="text" style="display:none" name="name" value="$name">
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>
<?php }
?>
