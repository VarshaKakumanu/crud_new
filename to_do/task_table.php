

   <div class="container">
<?php

include ('connection.php'); // connection for sql

$sql = "SELECT id,message,username,status,created_date from task where username='".$_SESSION['login_user']."'"; // fetch details of a table =form ,col=email,no,text
$result = $conn->query($sql);// run sql query

echo" <table class='container table' id='myTable'>\n"; //table header " ''-->content "-->end
echo"   <thead>\n"; 
echo"    <tr>\n";
echo"       <th scope='col'> unique id </th>\n";//table header 1
echo"       <th scope='col'>Message</th>\n";//table header 2
echo"       <th scope='col'>User</th>\n";//table header 3
echo"       <th scope='col'>status</th>\n";
echo"       <th scope='col'>Created On</th>\n";
echo"       <th scope='col'>updation</th>\n";
echo"       <th scope='col'> </th>\n";
echo"     </tr>\n";
echo"   </thead>\n";

if($result->num_rows > 0){   //if num of rows > 0 store in result
    while($row = $result->fetch_assoc()){  //fetch details of result of rows in web table

        echo"   <tbody>\n";
        echo"     <tr>\n";
        echo"       <td>".$row["id"]."</td>\n";  //data of this row
        echo"       <td>".$row["message"]."</td>\n";
        echo"       <td>".$row["username"]."</td>\n";
        echo"       <td>".$row["status"]."</td>\n";
        echo"       <td>".$row["created_date"]."</td>\n";
        if($row["status"]==='close'){
            echo "<td>"."<a class='btn btn-info' href='updatestatus.php?id=".$row["id"]."&status=".$row["status"]."'>Open</a>"."</td>\n";
        }else{
            echo "<td>"."<a class='btn btn-danger' href='updatestatus.php?id=".$row["id"]."&status=".$row["status"]."'>Close</a>"."</td>\n";
        }
        echo"       <td>"."<a class='btn btn-info' href='deletion.php?id=".$row["id"]."'>delete</a>"."</td>\n";
        echo"     </tr>\n";
        echo"   </tbody>\n";
       
    }

    echo" </table>\n";
}

?>
</div> 

