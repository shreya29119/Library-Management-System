<?php
     include "connection.php";
     include "./navbar/navbar.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Approve Request</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <style type="text/css">
      body{
        background: url('./img_lib/lib-14.jpg');
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        font-weight: 600;
        transition: background-color .5s;
      }
      .container{
        overflow: auto;
        margin-top: -30px;
        width:70%;
        height: 600px;
        background-color: black;
        opacity: .8;
        color: white;
        padding: 100px;
      }
      .approve{
         margin-left: 20px;;
         margin-top: 50px;
      }
      .sidenav {
        height: 100%;
        margin-top: 50px;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #222;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
      }

      .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }

      .sidenav a:hover {
        color: #f1f1f1;
      }

      .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
      }
      #main {
        transition: margin-left .5s;
        padding: 16px;
      }

      @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
      }

      .form-control{
        width: 300px;
        height: 40px;
        margin-bottom: 20px;
      }
      .srch{
           margin-top: -40px;
           text-align: center;
           display:inline-block;
           float: right;
      }
      .btn{
        margin-right:230px;
      }
      .b{
        padding: 30px;
        border: 2px solid white;
      }
      </style>

  </head>
  <body>
    <!---------------------------sidenav----------------------------->

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      <div style="color: white; margin-left:40px; font-size: 20px;">
            <?php
            if(isset($_SESSION['login_user']))
            {
            echo "<img class='img-circle profile_img' height=120 width=120 src='../student/img_lib/".$_SESSION['pic']."'>";
            echo "<br/><br/>";
            echo "Welcome ".$_SESSION['login_user'];
            }
            ?>
      </div><br><br>
      <a id="l" href="profile.php">Profile</a>
      <a id="l" href="books.php">Books</a>
      <a id="l" href="request.php">Book Request</a>
      <a id="l" href="issue_information.php">Issue Information</a>
      <a id="l" href="expire.php">Expired Dates</a>
    </div>

    <div id="main">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "300px";
      document.getElementById("main").style.marginLeft = "300px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "white";
    }
    </script>
      <div class="container">
        <div class="b">
        <h3 style="text-align: center;"><b>Approve Request</b></h3>
        <form class="approve" action="" method="post">
          <input type="text" name="approve" placeholder="Yes or No" required="" class="form-control"><br>
          <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>
          <input type="text" name="return" placeholder="return Date yyyy-mm-dd" required="" class="form-control"><br>
          <button class="btn btn-default" type="submit" name="submit">Submit</button>
        </form>
      </div>
  </div>

  <?php
      if(isset($_POST['submit']))
      {
        mysqli_query($db, "UPDATE `issue_book` SET `approve` ='$_POST[approve]', `issue` ='$_POST[issue]', `return` ='$_POST[return]'
          WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");

        mysqli_query($db, "UPDATE books SET quantity= quantity-1 WHERE bid = '$_SESSION[bid]';");

        $res = mysqli_query($db, "SELECT quantity FROM books WHERE bid='$_SESSION[bid]';");

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['quantity']==0)
          {
            mysqli_query($db,"UPDATE books SET status='Not Available' WHERE bid='$_SESSION[bid]';");
          }
        }
        ?>
        <script type="text/javascript">
          alert("Updated Successfully");
        </script>
        <?php
      }
   ?>
</body>
</html>
