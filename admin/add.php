
  <?php
       include "connection.php";
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Books</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
      body{
        background-color: #024629 !important;
        font-weight: 600;
        transition: background-color .5s;
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

      .srch{
           //padding-left: 1000px;
           text-align: center;
           display:inline-block;
           float: right;
      }

      .img-circle{
        margin-left: 20px;
      }

      #l:hover{
        background-color:#024629 !important;
        color: white;
        text-decoration: none;
      }

      .book{
        width: 400px;
        margin: 0px auto;
      }

      form{
        width: 350px;
        margin: 0px auto;
      }
      input.form-control
      {
        background-color: black;
        //background-color: #080707;
        color: white;
        height: 40px !important;
      }
      .container{
        text-align:center;
      }

      .btn{
        width:100px;
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
    
    </div>

    <div id="main">
      <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
      <div class="container">
        <h1 style="color:black; font-family: Lucida Console; text-align:center;"><b>Add New Books</b></h1><br/>
        <form class="" action="" method="post">
            <input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br/>
            <input type="text" name="name" class="form-control" placeholder="Book Name"><br/>
            <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""><br/>
            <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br/>
            <input type="text" name="status" class="form-control" placeholder="Status" required=""><br/>
            <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br/>
            <input type="text" name="department" class="form-control" placeholder="Department" required=""><br/>
            <button class="btn btn-default" type="submit" name="submit">Add</button>
        </form>
      </div>
      <?php
          if(isset($_POST['submit']))
          {
            if(isset($_SESSION['login_user']))
            {
              mysqli_query($db,"INSERT INTO BOOKS VALUES ('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]',
                '$_POST[status]','$_POST[quantity]','$_POST[department]') ;");
                ?>
                <script type="text/javascript">
                  alert("Book Added Successfully.")
                </script>
                <?php
            }
            else{
              ?>
              <script type="text/javascript">
                 alert("You need to Login first!");
              </script>
              <?php
            }
          }
       ?>
   </div>
    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "300px";
      document.getElementById("main").style.marginLeft = "300px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
      document.body.style.backgroundColor = "#024629";
    }
    </script>
  </div>
</body>
</html>
