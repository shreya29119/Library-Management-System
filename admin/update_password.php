<?php
    include "connection.php";
    include "navbar/navbar.php";
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Update Password</title>
     <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
     <style type="text/css">
     body{
       background-image: url("img_lib/pass.jpg");
       background-position: center center;
       background-attachment: fixed;
       background-size: cover;
     }
     .wrapper{
       padding: 20px 50px;
       width: 450px;
       height: 500px;
       margin: 100px auto;
       background-color: black;
       opacity: .8;
     }
     .h{
       color: white;
       margin-top:40px;
       text-align: center;
       font-size: 35px;
       font-family: Lucida Console;
     }
     .form{
       padding-left: 30px;
     }

   </style>
   </head>
   <body>
     <div class="wrapper">
       <div class="h">
        <h1>Change Your Password</h1>
      </div><br/><br/><br/>
        <div class="form">
        <form class="" action="" method="post">
           <input type="text" name="username" class="form-control"
           placeholder="Username" required=""><br>
           <input type="text" name="email" class="form-control"
           placeholder="Email" required=""><br>
           <input type="text" name="password" class="form-control"
           placeholder="New Password" required=""><br>
           <button type="submit" class="btn btn-default" name="submit">Update</button>
        </form>
      </div>
     </div>

   <?php
       if(isset($_POST['submit']))
       {
         if(mysqli_query($db, "UPDATE ADMIN SET PASSWORD='$_POST[password]'
           WHERE username='$_POST[username]' && email='$_POST[email]';"))
           {
             ?>
             <script type="text/javascript">
                alert("The password updated successfully!");
             </script>
             <?php
           }
       }
    ?>
   </body>
 </html>
