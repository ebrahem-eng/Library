<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['update'])) {
        $studentid = ($_GET['studentid']);
        $studentID = $_POST['studentID'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = empty($_POST['newpassword']) ? $_POST['oldpassword'] : md5($_POST['newpassword']);

        $updatedate =  date("Y-m-d H:i:s");
        $sql = "update  tblstudents set StudentId=:studentID,FullName=:fullname,EmailId=:email,MobileNumber=:mobile,Password=:password,updationDate=:updatedate where id=:studentid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':studentID', $studentID, PDO::PARAM_STR);
        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':updatedate', $updatedate, PDO::PARAM_STR);
        $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['updatemsg'] = "Student info updated successfully";
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
        <title>Online Library Management System | Edit Admin</title>
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
        <!------MENU SECTION START-->
        <?php include('includes/header.php'); ?>
        <!-- MENU SECTION END-->
        <div class="content-wra
    <div class=" content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Edit STUDENT</h4>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class=" panel panel-info">
                        <div class="panel-heading">
                            Student Info
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <?php
                                    $studentid = intval($_GET['studentid']);
                                    $sql = "SELECT * from  tblstudents where id=:studentid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {
                                    ?>
                                            <div class="form-group">
                                                <label>Student ID</label>
                                                <input class="form-control" type="text" name="studentID" value="<?php echo htmlentities($result->StudentId); ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input class="form-control" type="text" name="fullname" value="<?php echo htmlentities($result->FullName); ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="email" value="<?php echo htmlentities($result->EmailId); ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input class="form-control" type="text" name="mobile" value="<?php echo htmlentities($result->MobileNumber); ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Enter Password</label>
                                                <input class="form-control" type="hidden" name="oldpassword" value="<?php echo htmlentities($result->Password); ?>" />
                                                <input class="form-control" type="password" name="newpassword" />
                                            </div>

                                            <div class="form-group">
                                                <label>Confirm Password </label>
                                                <input class="form-control" type="password" name="confirmpassword" />
                                            </div>
                                    <?php }
                                    } ?>
                                </div>

                                <button type="submit" name="update" class="btn btn-info">Update </button>

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
<?php } ?>