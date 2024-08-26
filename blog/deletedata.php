<?php
 require_once "connecting.php";
 $id = $_GET["id"];
 $query = "DELETE FROM posts WHERE id = '$id'";
 if (mysqli_query($conn, $query)) {
     header("location: dashboard.php");
 } else {
      echo "Something went wrong. Please try again later.";
 }
?>