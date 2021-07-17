<?php
      session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>
  <body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
         </div>
           <ul class="nav navbar-nav">
             <li><a href="../admin/index.php">HOME</a></li>
             <li><a href="../admin/books.php">BOOKS</a></li>
             <li><a href="../admin/feedback.php">FEEDBACK</a></li>
           </ul>
           <?php
              if(isset($_SESSION['login_user']))
              { ?>
                 <ul class="nav navbar-nav">
                   <li><a href="profile.php">PROFILE</a></li>
                 <li><a href="../admin/student.php">STUDENT-INFORMATION</a></li>
                 </ul>
              <?php
              }
            ?>

           <?php
              if(isset($_SESSION['login_user']))
              {?>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="">
                    <div style="color: white;">
                          <?php
                          echo  "<img class='img-circle profile_img' background:white height=30 width=30 src='images/".$_SESSION['pic']."'>";
                          echo  " ".$_SESSION['login_user'];
                          ?>
                    </div>
                 </a></li>
                 <li><a href="logout.php"><span class="glyphicon glyphicon-log-out">
                 LOGOUT</span></a></li>
                </ul>
              <?php
              }
              else {
                ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../admin/admin_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                        <li><a href="../admin/index.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                        <li><a href="../admin/registration.php"><span class="glyphicon glyphicon-user"> SIGN UP  </span></a></li>
                    </ul>
                <?php
              }
            ?>
         </div>
      </nav>

      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
