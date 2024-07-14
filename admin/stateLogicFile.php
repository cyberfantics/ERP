<!--Logic to Add State--><?php if (isset($_POST['addState'])) {
    $stateId = $_POST['stateId'];
    $stateName = $_POST['stateName'];
    $insert = mysqli_query($db, 'INSERT INTO state(`id`,`state`) VALUES ("' . $stateId . '","' . $stateName . '")');
    if ($insert) {
        echo "<script>location.assign('index.php?addClerk&success');</script>";
    } else {
        echo "<script>location.assign('index.php?addClerk&unsuccess');</script>";
    }
}?>
<!--Logic to Delete State--><?php if (isset($_POST['deleteState'])) {
    $stateId = $_POST['stateId'];
    $check = mysqli_query($db, 'SELECT * FROM state WHERE id="' . $stateId . '"');
    if (mysqli_num_rows($check) > 0) {
        $delete = mysqli_query($db, 'DELETE FROM state WHERE id="' . $stateId . '"');
        if ($delete == true) {
            echo "<script>location.assign('index.php?addClerk&success');</script>";
        } else {
            echo "<script>location.assign('index.php?addClerk&error;</script>";
        }
    } else {
        echo "<script>location.assign('index.php?addClerk&error');</script>";
    }

}?>
<!--Logic to Update State--><?php if (isset($_POST['updateState'])) {
    $stateId = $_POST['stateId'];
    $stateName = $_POST['stateName'];
    $check = mysqli_query($db, 'SELECT * FROM state WHERE id="' . $stateId . '"');
    if (mysqli_num_rows($check) > 0) {
        $update = mysqli_query($db, 'UPDATE state SET state="' . $stateName . '" WHERE id="' . $stateId . '"');
        if ($update == true) {
            echo "<script>location.assign('index.php?addClerk&success');</script>";
        } else {
            echo "<script>location.assign('index.php?addClerk&unsuccess');</script>";
        }
    } else {
        echo "<script>location.assign('index.php?addClerk&error');</script>";
    }
}?>