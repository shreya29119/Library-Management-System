<?php
    include "connection.php";
    include "navbar/navbar.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <style type="text/css">
    .body{
      background: url('./img_lib/lib-17.jpg');
      background-position: center center;
      background-attachment: fixed;
      background-size: cover;
    }
         .wrapper{
           width: 350px;
           margin: 0 auto;
           color: white;
           //background-color: red;
         }
         .img{
           text-align: center;
         }
         .h2{
           text-align: center;
           font-size: 20px;
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
           background-color: #004528;
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
           width: 200px;
           height: 40px;
           margin-bottom: 10px;
         }
         .srch{
              margin-top: -20px;
              text-align: center;
              display:inline-block;
              float: right;
         }
         .btn{
           margin-right:230px;
         }
         body{
           background-color: #004528 !important;
           transition: background-color .5s;
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
            echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
            echo "<br/><br/>";
            echo "Welcome ".$_SESSION['login_user'];
            }
            ?>
      </div><br><br>
      <a id="l" href="books.php">Books</a>
      <a id="l" href="request.php">Book Request</a>
      <a id="l" href="issue_information.php">Issue Information</a>
      <a id="l" href="expire.php">Expired</a>

    </div>

    <div id="main">
      <span style="font-size:30px;cursor:pointer;color: white;" onclick="openNav()">&#9776; open</span>


    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "300px";
      document.getElementById("main").style.marginLeft = "300px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "#004528;";
    }
    </script>

       <div class="container">
           <form class="" action="" method="post">
               <button class="btn btn-default" style="float: right; width:70px;" type="submit" name="submit1">Edit</button>
           </form>
           <div class="wrapper">
                <?php
                    if(isset($_POST['submit1']))
                    {
                      ?>
                      <script type="text/javascript">
                        window.location= "edit.php"
                      </script>
                      <?php
                    }
                    $q = mysqli_query($db, "SELECT * FROM ADMIN WHERE USERNAME = '$_SESSION[login_user]' ;");
                 ?>
                 <h2 style="text-align:center;">My Profile</h2>
                 <?php
                     $row = mysqli_fetch_assoc($q);

                     echo "<div class='img' ><img height=110 width=120  class='img-circle profile-img' src='images/".$_SESSION['pic']."'></div>";
                  ?>
                  <div class="h2">
                    <h2 class="h2">Welcome</h2>
                    <h4>
                      <?php echo $_SESSION['login_user']; ?>
                    </h4>
                  </div>
                   <?php
                   echo "<b>";
                       echo "<table class='table table-bordered'>";
                             echo "<tr>";
                                   echo "<td>";
                                         echo "<b> First Name: </b>";
                                   echo "</td>";
                                   echo "<td>";
                                         echo $row['first'];
                                   echo "</td>";
                             echo "</tr>";

                             echo "<tr>";
                                   echo "<td>";
                                         echo "<b> Last Name: </b>";
                                   echo "</td>";
                                   echo "<td>";
                                         echo $row['last'];
                                   echo "</td>";
                             echo "</tr>";

                             echo "<tr>";
                                   echo "<td>";
                                         echo "<b> Username:  </b>";
                                   echo "</td>";
                                   echo "<td>";
                                         echo $row['username'];
                                   echo "</td>";
                             echo "</tr>";

                             echo "<tr>";
                                   echo "<td>";
                                         echo "<b> Password: </b>";
                                   echo "</td>";
                                   echo "<td>";
                                         echo $row['password'];
                                   echo "</td>";
                             echo "</tr>";

                             echo "<tr>";
                                   echo "<td>";
                                         echo "<b> Email: </b>";
                                   echo "</td>";
                                   echo "<td>";
                                         echo $row['email'];
                                   echo "</td>";
                             echo "</tr>";

                             echo "<tr>";
                                   echo "<td>";
                                         echo "<b> Contact: </b>";
                                   echo "</td>";
                                   echo "<td>";
                                         echo $row['contact'];
                                   echo "</td>";
                             echo "</tr>";

                       echo "</table>";
                       echo "</b>";
                    ?>
           </div>
       </div>
  </body>
</html>
