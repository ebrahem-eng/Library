<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['update'])) {
        $bookname = $_POST['bookname'];
        $category = $_POST['category'];
        $category1 = $_POST['category1'];
        $category2 = $_POST['category2'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        $price = $_POST['price'];
        $publish = $_POST['publish'];
        $count = $_POST['count'];

        $bookid = intval($_GET['bookid']);
        $sql = "update  tblbooks set BookName=:bookname,CatId=:category,AuthorId=:author,BookPrice=:price,
        cat1=:category1,cat2=:category2,publishing_house=:publish,count=:count where id=:bookid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':bookname', $bookname, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':author', $author, PDO::PARAM_STR);
        $query->bindParam(':price', $price, PDO::PARAM_STR);
        $query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
        $query->bindParam(':category1', $category1, PDO::PARAM_STR);
        $query->bindParam(':category2', $category2, PDO::PARAM_STR);
        $query->bindParam(':publish', $publish, PDO::PARAM_STR);
        $query->bindParam(':count', $count, PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Book info updated successfully');</script>";
        echo "<script>window.location.href='manage-books.php'</script>";
    }
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Online Library Management System | Edit Book</title>
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
                        <h4 class="header-line">edit Book</h4>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md12 col-sm-12 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Book Info
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <?php
                                    $bookid = intval($_GET['bookid']);
                                    $sql = "SELECT tblbooks.count,tblbooks.BookName,tblbooks.publishing_house,tblcategory.CategoryName,tblcategory.id as cid,
                                    tblauthors.AuthorName,tblauthors.id as athrid,
                                    tblbooks.ISBNNumber,tblbooks.BookPrice,tblbooks.id as bookid,tblbooks.bookImage, 
                                    subcategory1.name as subname1,subcategory1.id as sub1 ,subcategory1.number as subnumber1 
                                    ,subcategory2.id as sub2 ,subcategory2.name as subname2,subcategory2.number as subnumber2 
                                    from  tblbooks join tblcategory on tblcategory.id=tblbooks.CatId 
                                    join tblauthors on tblauthors.id=tblbooks.AuthorId 
                                    left join subcategory1 on subcategory1.id= tblbooks.cat1
                                    left join subcategory2 on subcategory2.id= tblbooks.cat2
                                    where tblbooks.id=:bookid";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':bookid', $bookid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {               ?>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Book Image</label>
                                                    <img src="bookimg/<?php echo htmlentities($result->bookImage); ?>" width="100" height="100">
                                                    <a href="change-bookimg.php?bookid=<?php echo htmlentities($result->bookid); ?>">Change Book Image</a>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Book Name<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="bookname" value="<?php echo htmlentities($result->BookName); ?>" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Category<span style="color:red;">*</span></label>
                                                    <select class="form-control" id="cat" name="category" required="required" onchange="fetchCat1(this.value)">
                                                        <option value="<?php echo htmlentities($result->cid); ?>"> <?php echo htmlentities($catname = $result->CategoryName); ?></option>
                                                        <?php
                                                        $status = 1;
                                                        $sql1 = "SELECT * from  tblcategory where Status=:status";
                                                        $query1 = $dbh->prepare($sql1);
                                                        $query1->bindParam(':status', $status, PDO::PARAM_STR);
                                                        $query1->execute();
                                                        $resultss = $query1->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query1->rowCount() > 0) {
                                                            foreach ($resultss as $row) {
                                                                if ($catname == $row->CategoryName) {
                                                                    continue;
                                                                } else {
                                                        ?>
                                                                    <option value="<?php echo htmlentities($row->id); ?>"><?php echo htmlentities($row->CategoryName); ?></option>
                                                        <?php }
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>BOOK Number<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="isbn" value="<?php echo htmlentities($result->ISBNNumber); ?>" readonly />
                                                    <p class="help-block"> Book Number Must be unique</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Category 1<span style="color:red;">*</span></label>
                                                    <select class="form-control" id="cat1" name="category1" required="required" onchange="fetchCat2(this.value)">
                                                        <option value="<?php echo htmlentities($result->sub1); ?>"> <?php echo  $result->subnumber1 . " . " . $result->subname1; ?></option>

                                                    </select>
                                                </div>
                                            </div>





                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Category 2<span style="color:red;">*</span></label>
                                                    <select class="form-control" id="cat2" name="category2" required="required">
                                                        <option value="<?php echo htmlentities($result->sub2); ?>"> <?php echo $result->subnumber2 . " . " .  $result->subname2; ?></option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6" style="visibility: hidden;">
                                                <div class="form-group">
                                                    <label>Publishing House<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Author<span style="color:red;">*</span></label>
                                                    <select class="form-control" name="author" required="required">
                                                        <option value="<?php echo htmlentities($result->athrid); ?>"> <?php echo htmlentities($athrname = $result->AuthorName); ?></option>
                                                        <?php

                                                        $sql2 = "SELECT * from  tblauthors ";
                                                        $query2 = $dbh->prepare($sql2);
                                                        $query2->execute();
                                                        $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query2->rowCount() > 0) {
                                                            foreach ($result2 as $ret) {
                                                                if ($athrname == $ret->AuthorName) {
                                                                    continue;
                                                                } else {

                                                        ?>
                                                                    <option value="<?php echo htmlentities($ret->id); ?>"><?php echo htmlentities($ret->AuthorName); ?></option>
                                                        <?php }
                                                            }
                                                        } ?>

                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Publishing House<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="publish" value="<?php echo htmlentities($result->publishing_house); ?>" required />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Book count<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="count" value="<?php echo htmlentities($result->count); ?>" required />
                                                </div>
                                            </div>



                                    <?php }
                                    } ?><div class="col-md-12">
                                        <button type="submit" name="update" class="btn btn-info">Update </button>
                                    </div>

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

        <script type="text/javascript">
            function fetchCat1(id) {

                $.ajax({
                    type: 'post',
                    url: 'cat1.php',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#cat1').html(data);
                    }
                })
            }
        </script>

        <script type="text/javascript">
            function fetchCat2(id) {
                $.ajax({
                    type: 'post',
                    url: 'cat2.php',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#cat2').html(data);
                    }
                })
            }
        </script>
    </body>

    </html>
<?php } ?>