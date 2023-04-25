<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else { ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Dash Board</title>
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
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
          <div class="col-md-12">
            <h4 class="header-line">Home</h4>

          </div>

        </div>

        <div class="row">


          <a href="listed-books.php">
            <div class="col-md-4 col-sm-4 col-xs-6">
              <div class="alert alert-success back-widget-set text-center">
                <i class="fa fa-book fa-5x"></i>
                <?php
                $sql = "SELECT id from tblbooks ";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $listdbooks = $query->rowCount();
                ?>
                <h3><?php echo htmlentities($listdbooks); ?></h3>
                Books Listed
              </div>
            </div>
          </a>

        

          <a href="issued-books.php">
            <div class="col-md-4 col-sm-4 col-xs-6">
              <div class="alert alert-danger back-widget-set text-center">
                <i class="fa fa-book fa-5x"></i>
                <?php
                $sid = $_SESSION['stdid'];
                $sql2 = "SELECT count(BookId) as countbook from tblissuedbookdetails where StudentID=:sid";
                $query2 = $dbh->prepare($sql2);
                $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
                $query2->execute();
                $results2 = $query2->fetch();
                ?>
                <h3><?php echo $results2['countbook']; ?></h3>
                Issued Books
                <?php
              $rsts = 0;
              $sid = $_SESSION['stdid'];
              $sql2 = "SELECT id from tblissuedbookdetails where StudentID=:sid and (RetrunStatus=:rsts || RetrunStatus is null || RetrunStatus='')";
              $query2 = $dbh->prepare($sql2);
              $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
              $query2->bindParam(':rsts', $rsts, PDO::PARAM_STR);
              $query2->execute();
              $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
              $returnedbooks = $query2->rowCount();
              ?>

              <h3><?php echo htmlentities($returnedbooks); ?></h3>
              Books Not Returned Yet
              </div>
            </div>
          </a>
          
          <a href="#" class="show-not" data-toggle="modal" data-target="#exampleModal">
            <div class=" col-md-4 col-sm-4 col-xs-6">
              <div class="alert alert-warning back-widget-set text-center">
                <i class="fa fa-bell fa-5x" aria-hidden="true" style="color:blue ;"></i>
                <?php
                $sid = $_SESSION['stdid'];
                $date = date("Y-m-d h:i:sa");
                $sql2 = "SELECT count(BookId) as countbook from tblissuedbookdetails where StudentID=:sid AND (RetrunStatus='' || RetrunStatus is null) AND due_date <:date  ";
                $query2 = $dbh->prepare($sql2);
                $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
                $query2->bindParam(':date', $date, PDO::PARAM_STR);
                $query2->execute();
                $results2 = $query2->fetch();
                // $returnedbooks = $query2->rowCount();
                ?>
                <h3 style="color:blue ;"><?php echo $results2['countbook']; ?></h3>
                <p style="color:blue ;">Notifications </p>
              </div>
            </div>
          </a>



        </div>

      </div>
    </div>
    <?php
    $sid = $_SESSION['stdid'];
    $date = date("Y-m-d h:i:sa");
    $sql2 = "SELECT tblissuedbookdetails.*, tblbooks.BookName
               from tblissuedbookdetails 
               join tblbooks
               on tblbooks.id =tblissuedbookdetails.BookId
               where StudentID=:sid 
               AND (RetrunStatus='' || RetrunStatus is null)
               AND due_date <:date";
    $query2 = $dbh->prepare($sql2);
    $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
    $query2->bindParam(':date', $date, PDO::PARAM_STR);
    $query2->execute();
    $results2 = $query2->fetchAll();
    $returnedbooks = $query2->rowCount();
    ?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php if ($query2->rowCount() > 0) {
              foreach ($results2 as $result) { ?>
                <div class="alert alert-warning" role="alert">
                  Please return <?php echo " ' " . $result['BookName'] . " ' "; ?>quiqly
                </div>
            <?php
              }
            } else {
              echo ' <div class="alert alert-warning" role="alert">
                No Notifiction Yet ....
            </div>';
            } ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
        <div class="row">


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
  </body>

  </html>
<?php } ?>