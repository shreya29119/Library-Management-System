
  <?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Books</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <style type="text/css">
      body{
        background: url('../images/5.jpg');
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
        font-weight: 600;
      }
      #input1{

        width:250px !important;
      }
      #input2{
        width:250px !important;
      }
      #btn{
        margin-right:40px;
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

      .img-circle{
        margin-left: 20px;
      }

      .srch{
           //padding-left: 1000px;
           text-align: center;
           display:inline-block;
           float: right;
      }
      #l:hover{
        background-color:#f3f23d;
        color: #222;
        text-decoration: none;
      }
      </style>
    </head>
    <body >

    <?php include "./navbar/navbar.php"; ?>

    <!---------------------------sidenav----------------------------->

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

      <div style="color: white; margin-left:40px; font-size: 20px;">
            <?php
            if(isset($_SESSION['login_user']))
            {
            echo "<img class='img-circle profile_img' height=120 width=120 src='../admin/images/".$_SESSION['pic']."'>";
            echo "<br/><br/>";
            echo "Welcome ".$_SESSION['login_user'];
            }
            ?>
      </div><br><br>
      <a id="l" href="profile.php">Profile</a>
      <a id="l" href="add.php">Add Books</a>
      <a id="l" href="request.php">Book Request</a>
      <a id="l" href="issue_information.php">Issue Information</a>
      <a id="l" href="expire.php">Expired Dates</a>
  
    </div>

    <div id="main">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "white";
    }
    </script>

    <div class="srch">
      <form class="navbar-form" action="" method="post" name="form1">
                 <input id="input1" class="form-control" type="text" name="search" placeholder="search books.." required="" style="width:500px;">
                 <button id="btn" type="submit" name="submit" class="btn btn-default">
                   <span class="glyphicon glyphicon-search"></span>
                 </button>
      </form>
      <form class="navbar-form" action="" method="post" name="form1">
                 <input id="input2" class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="" style="width:500px;">
                 <button type="submit" name="submit1" class="btn btn-default">
                   Delete
                 </button>
      </form>
    </div>

    <h2>List Of Books</h2>
    <?php

         if(isset($_POST['submit']))
         {
              $q=mysqli_query($db, "SELECT * from books where name like '%$_POST[search]%'");
              if(mysqli_num_rows($q) == 0)
              {
                echo "Sorry! No book found. Try searching again.";
              }
              else {
                      echo "<table class='table table-bordered table-hover'>";
                      // Table haeder
                      echo "<tr style='background-color: white;'>";
                           echo "<th>"; echo "ID"; echo "</th>";
                           echo "<th>"; echo "BOOKS NAME"; echo "</th>";
                           echo "<th>"; echo "AUTHORS NAME"; echo "</th>";
                           echo "<th>"; echo "EDITION"; echo "</th>";
                           echo "<th>"; echo "STATUS"; echo "</th>";
                           echo "<th>"; echo "QUANTITY"; echo "</th>";
                           echo "<th>"; echo "DEPARTMENT"; echo "</th>";
                      echo "</tr>";

                      while($row=mysqli_fetch_assoc($q))
                       {
                         echo "<tr>";
                             echo "<td>";echo $row['bid'];echo "</td>";
                             echo "<td>";echo $row['name'];echo "</td>";
                             echo "<td>";echo $row['authors'];echo "</td>";
                             echo "<td>";echo $row['edition'];echo "</td>";
                             echo "<td>";echo $row['status'];echo "</td>";
                             echo "<td>";echo $row['quantity'];echo "</td>";
                             echo "<td>";echo $row['department'];echo "</td>";
                         echo "</tr>";
                       }
                       echo "</table>";
              }
         }
else{
    $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`bid` ASC;");
    echo "<table class='table table-bordered table-hover'>";
    // Table haeder
          echo "<tr style='background-color: white;'>";
               echo "<th>"; echo "ID"; echo "</th>";
               echo "<th>"; echo "BOOKS NAME"; echo "</th>";
               echo "<th>"; echo "AUTHORS NAME"; echo "</th>";
               echo "<th>"; echo "EDITION"; echo "</th>";
               echo "<th>"; echo "STATUS"; echo "</th>";
               echo "<th>"; echo "QUANTITY"; echo "</th>";
               echo "<th>"; echo "DEPARTMENT"; echo "</th>";
          echo "</tr>";

          while($row=mysqli_fetch_assoc($res))
           {
             echo "<tr>";
                 echo "<td>";echo $row['bid'];echo "</td>";
                 echo "<td>";echo $row['name'];echo "</td>";
                 echo "<td>";echo $row['authors'];echo "</td>";
                 echo "<td>";echo $row['edition'];echo "</td>";
                 echo "<td>";echo $row['status'];echo "</td>";
                 echo "<td>";echo $row['quantity'];echo "</td>";
                 echo "<td>";echo $row['department'];echo "</td>";
             echo "</tr>";
           }
           echo "</table>";
         }
         if(isset($_POST['submit1']))
         {
           if(isset($_SESSION['login_user']))
           {
             mysqli_query($db, "DELETE FROM BOOKS WHERE bid='$_POST[bid]';");
             ?>
                 <script type="text/javascript">
                     alert("Book deleted Successfully!");
                 </script>
             <?php
           }
         else{
           ?>
           <script type="text/javascript">
               alert("Please Login first!");
           </script>
           <?php
         }
       }
    ?></div>
  </body>
</html>
