<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['create'])) {
        $note = $_POST['note'];
        $student_id = $_SESSION['stdid'];
        $date = date("Y-m-d h:i:s");
        $sql = "INSERT INTO  notes(notes,student_id,date) VALUES(:note,:student_id,:date)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':note', $note, PDO::PARAM_STR);
        $query->bindParam(':student_id', $student_id, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $_SESSION['msg'] = "Note Listed successfully";
            header('location:add_note.php');
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again";
            header('location:add_note.php');
        }
    }
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | Add Author</title>
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

        <div class=" content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Add Note</h4>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class=" panel panel-info">

                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Your Note</label>
                                    <textarea class="form-control" name="note" autocomplete="off" required>

                                    </textarea>
                                    <!-- <input class="form-control" type="text" name="note" autocomplete="off" required />-->
                                </div>

                                <button type="submit" name="create" class="btn btn-info">Add </button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

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

    </body>

    </html>
<?php } ?>