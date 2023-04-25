<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
}
if (isset($_POST['id'])) {
    $sql = "SELECT * from  subcategory2 where cat_id=" . $_POST['id'];
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
        echo '<option value=""> Select sub Category 2</option>';

        foreach ($results as $result) {               ?>

            <option value="<?php echo ($result->id); ?>"><?php echo $result->number . " . " . $result->name; ?></option>

<?php                                                    }
    } else {
        echo '<option>No Sub Category!!</option>';
    }
} ?>