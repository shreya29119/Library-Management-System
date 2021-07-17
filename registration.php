<?php
    include "connection.php";
    include "navbar/navbar.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
    <style type="text/css">
      body{
        background-image: url("./img_lib/lib-11.jpg");
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
      }
      .container{
        overflow: auto;
        margin-top: 100px;
        width:400px;
        height: 400px;
        background-color: black;
        opacity: .8;
        color: white;
        padding: 100px;
      }
      label{
        font-weight: 600;
        font-size: 18px;
      }
      .btn{
        color: black;
        font-weight: 700;
        width: 70px;
        height: 30px;
      }
      .p1{
        font-family:sans-serif;
        margin-top: -40px;
        font-size: 30px;
        margin-bottom: 40px;
      }
    </style>
  </head>
  <body>
    <section>
       <div class="container">
         <form name="login" action="" method="post">
               <b><p class="p1">SIGN UP AS:</p></b><br>
               <input id="inp1" type="radio" name="user" id="admin" value="admin">
               <label for="admin">ADMIN</label><br><br>
               <input id="inp2" type="radio" name="user" id="student" value="student" checked="">
               <label for="student">STUDENT</label><br><br>
               <button class="btn btn-default" type="submit" name="submit1">OK</button>
        </form>
       </div>
       <?php
       if(isset($_POST['submit1']))
       {
         if($_POST['user']=='admin')
         {
           ?>
           <script type="text/javascript">
             window.location = "admin/registration.php"
           </script>
           <?php
         }
         else {
           ?>
           <script type="text/javascript">
             window.location = "student/registration.php"
           </script>
           <?php
         }
       }
        ?>
    </section>
  </body>
</html>
