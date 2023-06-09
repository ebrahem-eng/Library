<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {



?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | Issued Books</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- DATATABLE STYLE  -->
        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                        <h4 class="header-line"> Books</h4>
                    </div>



                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Books Listing
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Book Name</th>
                                                <th>Category</th>
                                                <th>Sub Category1</th>
                                                <th>Sub Category2</th>
                                                <th>Author</th>
                                                <th>Book Number</th>
                                                <th>Count</th>
                                                <th>Issued Count</th>
                                                <th>Publishing house</th>
                                                <th>issued</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT tblbooks.count,tblbooks.issued_count,tblbooks.BookName,tblbooks.publishing_house,tblcategory.CategoryName
                                            ,tblauthors.AuthorName,tblbooks.ISBNNumber
                                            ,tblbooks.BookPrice,tblbooks.id as bookid,tblbooks.bookImage,subcategory1.name as subname1
                                            ,subcategory2.name as subname2,tblbooks.isIssued
                                             from  tblbooks 
                                             join tblcategory on tblcategory.id=tblbooks.CatId 
                                             join tblauthors on tblauthors.id=tblbooks.AuthorId
                                             left join subcategory1 on subcategory1.id=tblbooks.cat1 
                                             left join subcategory2 on subcategory2.id=tblbooks.cat2 ";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {               ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center" width="200">
                                                            <img src="admin/bookimg/<?php echo htmlentities($result->bookImage); ?>" width="100">
                                                            <br /><b><?php echo htmlentities($result->BookName); ?></b>
                                                        </td>
                                                        <td class="center"><?php echo htmlentities($result->CategoryName); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->subname1); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->subname2); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->AuthorName); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->ISBNNumber); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->count); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->issued_count); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->publishing_house); ?></td>
                                                        <td class="center" width="200">
                                                            <?php if ($result->issued_count == $result->count) { ?>
                                                                <p style="color:red;">Book Already issued</p>
                                                            <?php } else {
                                                                echo "<p style='color:blue;'>Book is available</p>";
                                                            } ?>
                                                        </td>
                                                    </tr>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
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
        <!-- DATATABLE SCRIPTS  -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>