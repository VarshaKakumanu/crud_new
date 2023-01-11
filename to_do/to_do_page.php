<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  
    <title>Document</title>
</head>
<body>
<?php 
include ('navbar.php');
?>
    <div class="container">
<?php
         if(isset($_SESSION['login_user'])){
                             ?> 
    <h1>welcome <?php
   
     echo $_SESSION['login_user'];?></h1>

<?php
        include ('task_box.php');
        include('task_table.php');
            }else{   ?>
            <h1>welcome</h1>
            <?php
            }
            ?>

<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script>$(document).ready( function () {
    $('#myTable').DataTable({
    ordering: true
} );

} );</script>

</body>
</html>