<?php include ('connection.php');
if (isset($_POST['n_submit'])) 
{
   
   $vusername = $_POST["n_username"];
   $vpassword = $_POST["n_password"];
  

   $sql = "INSERT INTO credentials (username,password)
   VALUES ('$vusername', '$vpassword')";
   
   if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }

}


$conn->close();

header("Location:to_do_page.php");
exit();
?>
