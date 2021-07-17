  <?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style type="text/css">
      body
      {
         background-image: url("images/6.jpg");
         background-position: center center;
         background-attachment: fixed;
         background-size: cover;
      }
      .wrapper
      {
        padding: 10px;
        margin: -20px auto;
        width: 900px;
        height: 600px;
        background-color: black;
        opacity: .8;
        color:white;
      }
      .form-control{
        height: 70px;
        width: 60%;
      }
      .scroll
      {
        width:100%;
        height: 300px;
        overflow: auto;
      }
    </style>
  </head>
  <body>
    <?php include "./navbar/navbar.php"; ?>
      <div class="wrapper">
           <h4>If you have any suggestions or questions please comment below.</h4>
           <form style="" action="" method="post">
               <input class="form-control" type="text" name="comments" placeholder="Write something..."><br>
               <input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">
           </form>
   <br><br>
       <div class="scroll">
         <?php
              if(isset($_POST['submit']))
              {
                  $sql = "INSERT INTO `comments` VALUES('','$_SESSION[login_user]','$_POST[comments]');";
                  if(mysqli_query($db,$sql))
                  {
                      $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                      $res=mysqli_query($db,$q);

                      echo "<table class='table table-bordered'>";
                      while($row=mysqli_fetch_assoc($res))
                      {
                        echo "<tr>";
                              echo "<td>"; echo $row['username']; echo "</td>";
                              echo "<td>"; echo $row['comments']; echo "</td>";
                        echo "</tr>";
                      }
                  }
              }

              else {
                $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                $res=mysqli_query($db,$q);

                echo "<table class='table table-bordered'>";
                while($row=mysqli_fetch_assoc($res))
                {
                  echo "<tr>";
                        echo "<td>"; echo $row['username']; echo "</td>";
                        echo "<td>"; echo $row['comments']; echo "</td>";
                  echo "</tr>";
                }
              }
          ?>
          </div>
       </div>

  </body>
</html>
