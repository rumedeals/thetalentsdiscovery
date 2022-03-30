<?php
  session_start();
  require_once 'conn.php';

  if(isset($_POST) & !empty($_POST)){
    $fullname = mysqli_real_escape_string($connection, $_POST['fullname']);
    $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $club = mysqli_real_escape_string($connection, $_POST['club']);
    $wing = mysqli_real_escape_string($connection, $_POST['wing']);
       $num = mysqli_real_escape_string($connection, $_POST['num']);

    if(isset($_FILES) & !empty($_FILES)){
      $name = $_FILES['productimage']['name'];
      $type = $_FILES['productimage']['type'];
      $tmp_name = $_FILES['productimage']['tmp_name'];


      if(isset($name) && !empty($name)){
          $location = "uploads/";
          if(move_uploaded_file($tmp_name, $location.$name)){
            //$smsg = "Uploaded Successfully";
            $sql = "INSERT INTO team (fullname, birthday, gender, club, wing, num, filename) VALUES ('$fullname', '$birthday', '$gender', '$club', '$wing', '$num', '$location$name')";
            $res = mysqli_query($connection, $sql);
          echo "<script>window.location.href='index.php'</script>";  
            }else{
              $fmsg = "Failed to Create Product";
            }
          }else{
            $fmsg = "Failed to Upload File";
          }
        }else{
          $fmsg = "Only JPG files are allowed and should be less than 1MB";
        }
      }else{
        $fmsg = "Please Select a File";
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>discovery</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Talent Discovery Info Registration</h2>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAME" name="fullname">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="club">
                                    <option disabled="disabled" selected="selected">FOOTBALL CLUB</option>
                                    <option>Chelsea</option>
                                    <option>Arsenal</option>
                                    <option>Roma</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="wing">
                                    <option disabled="disabled" selected="selected">Postion/Wing</option>
                                    <option>Midfield</option>
                                    <option>Defence</option>
                                    <option>strike</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input type="file" name="productimage" id="productimage">
          <p class="help-block"><br>Only jpg/png files are allowed.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                           &nbsp &nbsp <a href="index.php"><i class="fa fa-home"></i>Home</a>
                        </div>
                    </form>
                 
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
         <footer id="footer" class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="full">
                     <div class="footer-widget">
                        <div class="footer-logo">
                        
         <div class="footer-bottom">
            <div class="container">
               <p>Copyright © 2022 Talent Discovery.All rights reserved.</p>
            </div>
         </div>
      </footer>
      <!-- ALL JS FILES -->
      <script src="js/all.js"></script>
      <!-- ALL PLUGINS -->
      <script src="js/custom.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
