  <?php
  require("admin-logging/db_connection.php");

  $sql = "SELECT id FROM markers WHERE uid='$uid' ORDER BY id desc";
  $result = $conn->query($sql);

  

  if ($result->num_rows > 0) {

$row = $result->fetch_assoc();
          $_SESSION["id"]=$row["id"];
  } else {
      echo "0 results";
  }

  include('footer.php');

  $conn->close();

  ?>
