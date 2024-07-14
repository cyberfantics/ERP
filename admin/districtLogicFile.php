<!--Logic to Add District--><?php if (isset($_POST['AddDistrict'])) {
    $distId = $_POST['distId'];
    $distName = ucwords($_POST['distName']);
    $zip = $_POST['zip'];
    $insert = mysqli_query($db, 'INSERT INTO district(`id`,`district`,`zipCode`) VALUES ("' . $distId . '","' . $distName . '","' . $zip . '")');
    if ($insert) {
        echo "<script>location.assign('index.php?addClerk&success');</script>";
    } else {
        echo "<script>location.assign('index.php?addClerk&unsuccess');</script>";
    }

}
?>
<!--Logic to Delete District--> <?php
if (isset($_POST['deleteDistrict'])) {
    $zip = $_POST['zip'];

    $check = mysqli_query($db, 'SELECT * FROM district WHERE zipCode="' . $zip . '"') or die(mysqli_error($db));
    if (mysqli_num_rows($check) > 0) {
        $delete = mysqli_query($db, "DELETE FROM district WHERE zipCode='$zip'");
        if ($delete) {
            echo "<script>location.assign('index.php?addClerk&success');</script>";
        } else {
            echo "<script>location.assign('index.php?addClerk&unsuccess');</script>";
        }
    } else {
        echo "<script>location.assign('index.php?addClerk&error=error');</script>";
    }
}

?>
<!--Logic to update District--> <?php
if (isset($_POST['UpdateDistrict'])) {
    $distName = ucwords($_POST['distName']);
    $zip = $_POST['zip'];

    $check = mysqli_query($db, 'SELECT * FROM district WHERE zipCode="' . $zip . '"') or die(mysqli_error($db));
    if (mysqli_num_rows($check) > 0) {
        $update = mysqli_query($db, 'UPDATE district SET district="' . $distName . '" WHERE zipCode="' . $zip . '"') or die(mysqli_error($db));
        if ($update == true) {
            echo "<script>location.assign('index.php?addClerk&success');</script>";
        } else {
            echo "<script>location.assign('index.php?addClerk&unsuccess');</script>";
        }
    } else {
        echo "<script>location.assign('index.php?addClerk&error=error');</script>";
    }
}

?>