<?php
include('includes/config.php');

if (isset($_POST['data'])) {
    $sql = "SELECT count(status)as notescount from notes where status=0";
    $query = $dbh->prepare($sql);
    $query->execute();
    $result = $query->fetch();

    if ($result > 0) {
        echo $result['notescount'];
    }
}


if (isset($_POST['update'])) {
    $sql = "Update notes set status=1 where status=0";
    $query = $dbh->prepare($sql);
    $query->execute();
}
