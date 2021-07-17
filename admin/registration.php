
<?php include "connection.php";
        session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin registration</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>
  <body style="background-color: grey;">

    <header style="height: 100px;">
      <div class="logo">
        <h1 style="color: white; font-size: 25px; word-spacing: 10px; line-height: 50px; margin-top: 30px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
      </div>
         <nav style="margin-left: 20px;">
           <ul class="nav navbar-nav navbar-right">
             <li><a href="index.php">HOME</a></li>
             <li><a href="books.php">BOOKS</a></li>
             <li><a href="feedback.php">FEEDBACK</a></li>
             <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in">LOGIN</span></a></li>
           </ul>
         </nav>
    </header>

    <section style="background-color: grey;">
        <div class="reg_img" style="height: 653px;">
          <br/>
          <div class="box2" style="height: 590px;">
           <br>
            <h1 style="text-align:center; font-size: 35px; font-family: Lucida Console;">Library Management System</h1>
            <h1 style="text-align:center; font-size: 25px;">User Registration Form</h1>
          <form name="Registration" action="" method="post">

            <div class="login">
              <input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
              <input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
              <input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
              <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
              <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
              <input class="form-control" type="text" name="contact" placeholder="Phone No." required=""><br>
              <input class="btn btn-primary" type="submit" name="submit" value="SIGN UP" style="color: black; width: 80px; height: 30px;">
            </div>
          </form>

          </div>
        </div>
    </section>

     <?php

       if(isset($_POST['submit']))
       {
          $count=0;
          $sql="SELECT username FROM `admin`";
          $res=mysqli_query($db,$sql);

          while($row=mysqli_fetch_assoc($res))
          {
            if($row['username']==$_POST['username'])
            {
              $count=$count+1;
            }
          }
        if($count==0)
          {mysqli_query($db, "INSERT INTO `admin` VALUES('','$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','admin.png');");
      ?>

      <script type="text/javascript">
         alert("Registeration Successful");
      </script>

      <?php
    }
      else {

        ?>
        <script type="text/javascript">
           alert("The username already exist.");
        </script>
       <?php
      }
  }
       ?>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      </body>
    </html>
