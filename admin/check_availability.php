<?php
require_once("includes/config.php");
//code check email
if (!empty($_POST["isbn"])) {
    $isbn = $_POST["isbn"];
    $sql = "SELECT id FROM tblbooks WHERE ISBNNumber=:isbn";
    $query = $dbh->prepare($sql);
    $query->bindParam(':isbn', $isbn, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "<span style='color:red'> Book Number already exists with another book. .</span>";
        echo "<script>$('#add').prop('disabled',true);</script>";
    } else {
        echo "<script>$('#add').prop('disabled',false);</script>";
    }
}


//code check student id
if (!empty($_POST["studentid"])) {
    $studentid = $_POST["studentid"];
    $sql = "SELECT StudentId FROM tblstudents WHERE StudentId=:studentid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "<span style='color:red'> Student ID is already exists . .</span>";
        echo "<script>$('#add').prop('disabled',true);</script>";
    } else {
        echo "<script>$('#add').prop('disabled',false);</script>";
    }
}


//code check student email
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $sql = "SELECT EmailId FROM tblstudents WHERE EmailId=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "<span style='color:red'> This email is already exists . .</span>";
        echo "<script>$('#add').prop('disabled',true);</script>";
    } else {
        echo "<script>$('#add').prop('disabled',false);</script>";
    }
}


//code check admin email
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $sql = "SELECT AdminEmail FROM admin WHERE AdminEmail=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "<span style='color:red'> This email is already exists . .</span>";
        echo "<script>$('#add').prop('disabled',true);</script>";
    } else {
        echo "<script>$('#add').prop('disabled',false);</script>";
    }
}



//code check admin username
if (!empty($_POST["username"])) {
    $username = $_POST["username"];
    $sql = "SELECT UserName FROM admin WHERE UserName=:username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "<span style='color:red'> This username is already exists . .</span>";
        echo "<script>$('#add').prop('disabled',true);</script>";
    } else {
        echo "<script>$('#add').prop('disabled',false);</script>";
    }
}
