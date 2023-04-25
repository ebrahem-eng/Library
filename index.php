<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT groupID,UserName,Password FROM admin WHERE UserName=:username and Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $row = $query->fetch();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['alogin'] = $username;
        $_SESSION['groupID'] = $row['groupID'];
        echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
    } else {
        $sql1 = "SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE StudentId=:username and Password=:password";
        $query1 = $dbh->prepare($sql1);
        $query1->bindParam(':username', $username, PDO::PARAM_STR);
        $query1->bindParam(':password', $password, PDO::PARAM_STR);
        $query1->execute();
        $row1 = $query1->fetch();
        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);

        if ($query1->rowCount() > 0) {
            $_SESSION['stdid'] = $row1['StudentId'];
            if ($row1['Status'] == 1) {
                $_SESSION['login'] = $username;
                echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
            } else {
                echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daily UI - Day 1 Sign In</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/animate.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>

    <div class="container" >
        <div class="" >
        <font size="4" face="tahoma">
        <center><p><h1  style="color:rgb(253, 253, 253)"> </h1></p></center>
			 <center> <p><h2  style="color:rgb(253, 253, 253)">  SYRIAN PRIVATE UNIVERSITY LIBRARY</h2></p></center>
        </div>
        <div class="login-box animated fadeInUp">
            <div class="box-header"  style="padding:4px">
                <h2 style="color:white">sign in</h2>
            </div>
            <form role="form" method="post">
                <label for="username">id student or username admin</label>
                <br />
                <input type="text" id="username" name="username">
                <br />
                <label for="password"> passwod</label>
                <br />
                <input type="password" id="password" name="password">
                <br />
                <button type="submit" name="login"> login</button>
                <br />
                <a href="#">
                    <p class="small"></p>
                </a>
            </form>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#logo').addClass('animated fadeInDown');
        $("input:text:visible:first").focus();
    });
    $('#username').focus(function() {
        $('label[for="username"]').addClass('selected');
    });
    $('#username').blur(function() {
        $('label[for="username"]').removeClass('selected');
    });
    $('#password').focus(function() {
        $('label[for="password"]').addClass('selected');
    });
    $('#password').blur(function() {
        $('label[for="password"]').removeClass('selected');
    });
</script>


<!-- FOOTER SECTION END-->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="assets/js/bootstrap.js"></script>
<!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>


</html>