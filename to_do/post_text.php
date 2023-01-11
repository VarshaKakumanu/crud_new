<?php include ('connection.php');
session_start();
   
$user = $_SESSION['login_user'];

if (isset($_POST['submit'])) 
{
   
   $vcontent = $_POST["content"];
   

   $sql = "INSERT INTO task (message,username,status)
   VALUES ('$vcontent', '$user','open')";
   
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
