<?php
     include "connection.php";
     include "./navbar/navbar.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Request</title>
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
        width: 1150px;
        height: 500px;
        background-color: black;
        opacity: .8;
        margin-top: 90px;
        overflow:auto;
        color: white;
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
    <div class="srch">
      <form class="" action="" name="form1" method="post">
          <input type="text" name="username" class="form-control" placeholder="Username" required="">
          <input type="text" name="bid" class="form-control" placeholder="bid" require="">
          <button class="btn btn-default" type="submit" name="submit">Submit</button>
      </form>
    </div>

    <div class="container">
    <h3 style="text-align:center;"><b>List of Books Requested</b></h3>
    <?php
    if(isset($_SESSION['login_user']))
    {
      $sql="SELECT student.username, roll, books.bid, name,authors,edition,status FROM student INNER JOIN issue_book
      ON student.username = issue_book.username INNER JOIN books ON issue_book.bid = books.bid WHERE issue_book.approve = '';";
      $res=mysqli_query($db, $sql);

      if(mysqli_num_rows($res) == 0)
      {
        echo "There is no pending Request";
      }
      else {
        echo "<table class='table table-bordered'>";
        // Table header
        echo "<tr style='background-color: white; color: black;'>";

             echo "<th>"; echo "USERNAME"; echo "</th>";
             echo "<th>"; echo "ROLL NO"; echo "</th>";
             echo "<th>"; echo "BID"; echo "</th>";
             echo "<th>"; echo "BOOK NAME"; echo "</th>";
             echo "<th>"; echo "AUTHORS NAME"; echo "</th>";
             echo "<th>"; echo "EDITION"; echo "</th>";
             echo "<th>"; echo "STATUS"; echo "</th>";

        echo "</tr>";

        while($row=mysqli_fetch_assoc($res))
         {
           echo "<tr>";

               echo "<td>";echo $row['username'];echo "</td>";
               echo "<td>";echo $row['roll'];echo "</td>";
               echo "<td>";echo $row['bid'];echo "</td>";
               echo "<td>";echo $row['name'];echo "</td>";
               echo "<td>";echo $row['authors'];echo "</td>";
               echo "<td>";echo $row['edition'];echo "</td>";
               echo "<td>";echo $row['status'];echo "</td>";
           echo "</tr>";
         }
         echo "</table>";
      }
    }
    else {
      ?>
      <h3 style="text-align: center;">You need to login to see the request.</h3>
      <?php
    }

     if(isset($_POST['submit']))
     {
       $_SESSION['name'] = $_POST['username'];
       $_SESSION['bid'] = $_POST['bid'];
     ?>
            <script type="text/javascript">
              window.location= "approve.php";
            </script>
       <?php
     }
    ?>
    </div>
  </body>
</html>
