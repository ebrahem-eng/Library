<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
}
if (isset($_POST['create'])) {

    $fname = $_POST['fullname'];
    $email = $_POST['adminemail'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO  admin(FullName,AdminEmail,UserName,Password) VALUES(:fname,:adminemail,:username,:password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':adminemail', $email, PDO::PARAM_STR);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();

    header('location:reg-students.php');
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | Add Admin</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script type="text/javascript">
        function valid() {
            if (document.signup.password.value != document.signup.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.signup.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>

    <script>
        function checkAvailability1() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#adminemail").val(),
                type: "POST",
                success: function(data) {
                    $("#adminemail-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'username=' + $("#username").val(),
                type: "POST",
                success: function(data) {
                    $("#username-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>
</head>

<body>
    <!------MENU SECTION START-->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class=" content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Add Admin</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class=" panel panel-info">
                    <div class="panel-heading">
                        Admin Info
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" name="fullname" autocomplete="off" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="adminemail" id="adminemail" onBlur="checkAvailability1()" autocomplete="off" required />
                                <span id="adminemail-availability-status" style="font-size:12px;"></span>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" name="username" id="username" onBlur="checkAvailability()" autocomplete="off" required />
                                <span id="username-availability-status" style="font-size:12px;"></span>
                            </div>
                            <div class="form-group">
                                <label>Enter Password</label>
                                <input class="form-control" type="password" name="password" autocomplete="off" required />
                            </div>

                            <div class="form-group">
                                <label>Confirm Password </label>
                                <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
                            </div>
                            <button type="submit" name="create" class="btn btn-info">Create </button>

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

    <script src="https://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $.post("get.php", {
                    data: 'get'
                }, function(data) {
                    if (data > 0) {
                        $(".count").show();
                        $(".count").text(data);
                    }
                });
            }, 1000);

            $(".notes").click(function() {
                $(".count").hide();
                $.post("get.php", {
                    update: 'update'
                }, function(data) {

                });

            });
        });
    </script>

</body>

</html>