<?php

   $db=mysqli_connect("localhost","root","","library"); //server name, username, password, database

   if(!$db)
   {
     die("Connection failed: " . mysqli_connect_error());
   }

   //echo "Connected successfully.";
 ?>
