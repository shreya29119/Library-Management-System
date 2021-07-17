<?php
    include "./navbar/navbar.php";
    include "connection.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <style type="text/css">
      body{
        background-color: #004528;
      }
      h2{
        text-align: center;
        color: white;
      }
      .profile_info{
        text-align: center;
      }
      span{
        color: white;
      }
      h4{
        color: white;
      }
      .form-control{
        width: 300px;
        height: 38px;
        margin: auto;
      }
      form{
        //padding-left: 550px;
        text-align: center;
      }
      .btn{
         //margin-left: 100px;
      }
    </style>
  </head>
  <body>
    <h2>Edit Information</h2>
    <?php
         $sql = "SELECT `first`,`last`,`username`,`email`,`contact` FROM `admin` where username='$_SESSION[login_user]' ";
         $result = mysqli_query($db, $sql) or die (mysql_error());

         while($row = mysqli_fetch_assoc($result))
         {
           $first = $row['first'];
           $last = $row['last'];
           $email = $row['email'];
           $contact = $row['contact'];
         }
     ?>
    <div class="profile_info">
      <span>Welcome</span>
      <h4><?php echo $_SESSION['login_user']; ?></h4>
    </div><br>
    <form class="" action="" method="post" enctype="multipart/form-data">
          <input class="form-control" type="file" name="file"><br>
          <label><h4><b>First Name</b></h4></label>
          <input class="form-control" type="text" name="first" value=<?php echo $first ?>><br>
          <label><h4><b>Last Name</b></h4></label>
          <input class="form-control" type="text" name="last" value=<?php echo $last ?>><br>
          <label><h4><b>Email</b></h4></label>
          <input class="form-control" type="text" name="email" value=<?php echo $email ?>><br>
          <label><h4><b>Contact</b></h4></label>
          <input class="form-control" type="text" name="contact" value=<?php echo $contact ?>><br>
          <button class="btn btn-default" type="submit" name="submit">Save</button>
    </form>
    <?php
        if(isset($_POST['submit']))
        {
          move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

          $first=$_POST['first'];
          $last = $_POST['last'];
          $email = $_POST['email'];
          $contact = $_POST['contact'];
          $pic = $_FILES['file']['name'];

          $sql1 = "UPDATE `admin` SET pic='$pic', first='$first', last='$last', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

          if(mysqli_query($db, $sql1))
          {
            ?>
                <script type="text/javascript">
                  alert("Saved Successfully!");
                </script>
            <?php
          }
        }
     ?>
  </body>
</html>
