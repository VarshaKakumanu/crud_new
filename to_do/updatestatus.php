<?php
include ('connection.php');
$id =$_GET["id"];
$status = $_GET["status"];
$statuNew;
if($status==='close'){
$statuNew='open';
}else{
$statuNew='close';
}

$sql = "UPDATE task set status = '$statuNew' where id='$id'";

            if($conn->query($sql)=== true){
                header('Location:to_do_page.php');
      
            }
        
		    else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
      
	
?>