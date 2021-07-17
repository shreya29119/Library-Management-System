
<?php
     include "connection.php";
     include "./navbar/navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background: url('./img_lib/lib-14.jpg');
  background-position: center center;
  background-attachment: fixed;
  background-size: cover;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}
.container{
  width: 1150px;
  height: 550px;
  background-color: black;
  opacity: .8;
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
  background-color: #6ab382;
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
     <h2 style="text-align: center;">Information of Borrowed Books</h2>
     <?php
     $c=0;
        if(isset($_SESSION['login_user']))
        {
          $sql = "SELECT student.username, roll, books.bid, name, authors, edition, issue,
          issue_book.return FROM student INNER JOIN issue_book ON student.username=issue_book.username
          INNER JOIN books ON issue_book.bid=books.bid WHERE issue_book.approve = 'Yes' ORDER BY `issue_book`.`return` ASC";

          $res=mysqli_query($db, $sql);

          echo "<table class='table table-bordered'>";
          // Table header

          echo "<tr style='background-color: white; color: black;'>";

               echo "<th>"; echo "USERNAME"; echo "</th>";
               echo "<th>"; echo "ROLL NO"; echo "</th>";
               echo "<th>"; echo "BID"; echo "</th>";
               echo "<th>"; echo "BOOK NAME"; echo "</th>";
               echo "<th>"; echo "AUTHORS NAME"; echo "</th>";
               echo "<th>"; echo "EDITION"; echo "</th>";
               echo "<th>"; echo "ISSUE DATE"; echo "</th>";
               echo "<th>"; echo "RETURN DATE"; echo "</th>";

          echo "</tr>";

          while($row=mysqli_fetch_assoc($res))
           {
             $d=date("Y-m-d");
             if($d > $row['return'])
             {
               $c = $c+1;
               $var = '<p style="color:yellow; background-color:red;">EXPIRED</p>';

               mysqli_query($db, "UPDATE `issue_book` SET `approve`='$var' WHERE
               `return` = '$row[return]' AND `approve`='YES' limit $c " );

               echo $d."</br>";
             }

             echo "<tr>";

                 echo "<td>";echo $row['username'];echo "</td>";
                 echo "<td>";echo $row['roll'];echo "</td>";
                 echo "<td>";echo $row['bid'];echo "</td>";
                 echo "<td>";echo $row['name'];echo "</td>";
                 echo "<td>";echo $row['authors'];echo "</td>";
                 echo "<td>";echo $row['edition'];echo "</td>";
                 echo "<td>";echo $row['issue'];echo "</td>";
                 echo "<td>";echo $row['return'];echo "</td>";
             echo "</tr>";
           }

           echo "</table>";
        }
        else {
          ?>
          <h3 style="text-align: center;">Login to see Information of Borrowed Books</h3>
          <?php
        }
    ?>
  </div>
</div>
</body>
</html>