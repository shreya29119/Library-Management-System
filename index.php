<?php
     session_start();
     include "connection.php";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Library Management System</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <style type="text/css">
    header {
      height: 133px ;
    }
    section {
      height: 544px;
    }
    .p{
      margin-top:-10px;
    }

      .img-circle{
        color: black;
        background-color: aliceblue;
        width:50px;
        height: 50px;
        padding:2px;
      }
    </style>
  </head>

  <body>
      <div class="wrapper">
          <header>
           <div class="logo">
             <img id="logo" src="images/9.png" style="height:90px;">
             <h1 style="color: white; font-size: 15px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
           </div>
           <?php
              if(isset($_SESSION['login_user']))
            {  ?>
              <nav style="color:white; padding-top:40px;">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="index.php">HOME</a></li>
                  <li><a href="books.php">BOOKS</a></li>
                  <li><a href="logout.php">LOGOUT</a></li>
                  <li><a href="feedback.php">FEEDBACK</a></li>
                </ul>
              </nav>
            <?php
           }
           else {
             ?>
                  <nav style="color:white; padding-top:40px;">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="index.php">HOME</a></li>
                      <li><a href="books.php">BOOKS</a></li>
                      <li><a href="login.php">LOGIN</a></li>
                      <li><a href="feedback.php">FEEDBACK</a></li>
                    </ul>
                  </nav>
            <?php
               }
            ?>
          </header>

          <section style="height:544px;">
            <div class="sec_img" style="margin-top:-21px; height: 544px">
               <div class="w3-content w3-section" style="height: 544px; width: 1536px;;margin-left:0px;">
                     <img class="mySlides w3-animate-left" src="img_lib/lib-2.jpg" style="width:157%; height:544px; transition: ease;">
                     <img class="mySlides w3-animate-left" src="img_lib/lib-8.jpg" style="width:157%; height:544px; transition: ease;">
                     <img class="mySlides w3-animate-left" src="img_lib/lib-7.jpg" style="width:157%; height:544px; transition: ease;">
                     <img class="mySlides w3-animate-left" src="img_lib/lib-6.jpg" style="width:157%; height:544px; transition: ease;">
                </div>

                <script type="text/javascript">
                  var a=0;
                  carousel();
                  function carousel(){
                    var i;
                    var x= document.getElementsByClassName("mySlides");

                    for(i=0; i<x.length; i++)
                    {
                      x[i].style.display="none";
                    }

                    a++;
                    if(a>x.length){
                       a=1;
                    }
                    x[a-1].style.display = "block";
                    setTimeout(carousel, 5000);
                  }
                </script>
                <br/><br/><br/>
               <div class="box" style="margin-top:-500px;">
                 <br/><br/><br/>
                 <h1 style="text-align:center; font-size: 35px;">Welcome to Library</h1><br><br/><br/>
                 <h1 style="text-align:center; font-size: 20px;">Opens at: 09:00 AM</h1><br><br/>
                 <h1 style="text-align:center; font-size: 20px;">Closes at: 15:00 PM</h1><br><br/>
               </div>
            </div>
          </section>

          <?php
               include "./footer/footer.php";
           ?>
      </div>
  </body>
</html>
