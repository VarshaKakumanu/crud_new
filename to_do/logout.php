<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: to_do_page.php");
   }
?>