
<?php include "connection.php";
      session_start();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Login</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <style type="text/css">
    .box1{
      margin-top: -40px !important;
      height: 500px;
      width: 460px;
      background-color: #030002;
      margin: 60px auto;
      opacity: .8;
      color:white;
    }
    label{
      font-size: 18px;
      font-weight: 600;
    }
    header{
      height:100px;
    }
    .h1{
      color: white;
      font-size: 25px;
      word-spacing: 10px;
      line-height: 50px;
      margin-top: 30px;
    }
    section{
      height: 550px;
    }
    .log_img{
      height: 620px;
    }
    .h11{
      text-align:center;
      font-size: 35px;
      font-family: Lucida Console;
    }
    .box1{
      margin-top: -10px !important;
    }
    .h12{
      text-align:center;
      font-size: 35px;
      font-family: Lucida Console;
    }
    .p1{
      padding-left: 70px;
      font-size: 15px;
      font-weight: 700;
    }
    #inp1{
      margin-left: 70px;
      width: 18px;
    }
    #inp2{
      margin-left: 50px;
      width: 18px;
    }
    </style>
  </head>
  <body>
    <header>
      <div class="logo">
        <h1 class="h1">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
      </div>
         <nav>
           <ul class="nav navbar-nav navbar-right">
             <li><a href="index.php">HOME</a></li>
             <li><a href="books.php">BOOKS</a></li>
             <li><a href="feedback.php">FEEDBACK</a></li>
             <li><a href="registration.php"><span class="glyphicon glyphicon-user ">SIGNUP</span></a></li>
           </ul>
         </nav>
    </header>

    <section>
        <div class="log_img">
          <br/><br/>
            <div class="box1"><br/>
                 <h1 class="h11">Library Management System</h1>
                 <h1 class="h12">User login Form</h1><br>
                 <form name="login" action="" method="post">
                       <b><p class="p1">Login as:</p></b>
                       <input id="inp1" type="radio" name="user" id="admin" value="admin">
                       <label for="admin">Admin</label>
                       <input id="inp2" type="radio" name="user" id="student" value="student" checked="">
                       <label for="student">Student</label>
                       <div class="login">
                            <input class="form-control" type="text" name="username" placeholder="Username" required=""><br><br>
                            <input class="form-control" type="password" name="password" placeholder="Password" required=""><br><br>
                            <input class="btn btn-primary" type="submit" name="submit" value="LOGIN" style="color: black; width: 70px; height: 30px;">
                       </div>
                       <p style="color:white; margin-left:70px;"><br>
                       <a style="color: white;" href="update_password.php">Forgot password?</a> &nbsp
                       New to this website?<a style="color:white;" href="registration.php">Sign Up</a>
                       </p>
                </form>
          </div>
        </div>
    </section>

    <!--<footer style="margin-top:42px; height:73px;"></footer>-->

    <?php
      if(isset($_POST['submit']))
      {
        if($_POST['user']=='admin')
        {
          $count=0;
        $res=mysqli_query($db,"SELECT * FROM ADMIN WHERE username='$_POST[username]' && password='$_POST[password]';");

        $row= mysqli_fetch_assoc($res);

        $count=mysqli_num_rows($res);

        if($count==0)
        {
          ?>
          <div class="alert alert-danger" style="margin-top:20px;">
            <strong style="margin-left:600px;">The username and password doesn't match</strong>
          </div>
          <?php
        }
        else {
          /*------if username and password matches--------*/

          $_SESSION['login_user'] = $_POST['username'];
          $_SESSION['pic'] = $row['pic'];
          ?>
          <script type="text/javascript">
            window.location="admin/profile.php";
          </script>
          <?php
        }
        }
        else
        {
        $count=0;
        $res=mysqli_query($db,"SELECT * FROM STUDENT WHERE username='$_POST[username]' && password='$_POST[password]';");

        $row = mysqli_fetch_assoc($res);
        $count=mysqli_num_rows($res);

        if($count==0)
        {
          ?>
          <!--<script type="text/javascript">
            alert("The username and password doesnot match.")
          </script>-->
          <div class="alert alert-danger" style="margin-top:20px;">
            <strong style="margin-left:600px;">The username and password doesn't match</strong>
          </div>
          <?php
        }
        else {
          $_SESSION['login_user'] = $_POST['username'];
          $_SESSION['pic'] = $row['pic'];
          ?>
          <script type="text/javascript">
            window.location="student/profile.php";
          </script>
          <?php
        }
      }
    }
     ?>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
