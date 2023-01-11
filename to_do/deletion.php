<?php
include ('connection.php');
$id =$_GET["id"];

$sql = "DELETE FROM task WHERE id='$id'";

            if($conn->query($sql)=== true){
                header('Location:to_do_page.php');
      
            }
        
		    else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
      
	
?>