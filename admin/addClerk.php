<div class="row">
    <!--Add Clerk--> <?php
include_once 'insertClerk.php';
?>
    <!--Add State And District--> <?php include_once 'state_dist.php';?>
    <!--Add Notice Board--> <?php include_once '../faculty/notice_board.php';?>
    <!--Code Logic--><?php
//Add Clerk
if (isset($_POST['AddClerk'])) {
    $clerkId = $_POST['clerkId'];
    $clerkName = ucwords($_POST['clerkName']);
    $designation = $_POST['designation'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $insert = mysqli_query($db,
        'INSERT INTO `clerk` (`clerkId`, `Name`, `Designation`, `DOB`, `email`, `address`, `department`) VALUES ("' .
        $clerkId . '", "' . $clerkName . '", "' . $designation . '", "' . $dob . '", "' . $email . '", "' . $address .
        '", "' . $department . '")'
    );
    if ($insert) {
        $fetchType = mysqli_fetch_assoc(mysqli_query($db, 'SELECT id FROM userlogintype WHERE NAME="Clerk"'));
        $usertype = $fetchType['id'];
        $insert = mysqli_query($db,
            'INSERT INTO `login` (`UserName`, `PASSWORD`, `department`, `usertype`) VALUES ("' .
            $clerkId . '", "' . $clerkName . '", "' . $department . '","' . $usertype . '")'
        );
        echo "<script>location.assign('index.php?addClerk&success');</script>";
    } else {
        echo '<script>location.assign("index.php?addClerk&unsuccess");</script>';
    }

}
//Delete Clerk
else if (isset($_POST['deleteClerk'])) {
    $clerkId = $_POST['clerkId'];
    $check = mysqli_query($db, 'SELECT * FROM clerk WHERE clerkId="' . $clerkId . '"') or die(mysqli_error($db));
    if (mysqli_num_rows($check) > 0) {
        $deleteLogin = mysqli_query($db, 'DELETE FROM login WHERE UserName="' . $clerkId . '"') or die(mysqli_error($db));
        $delete = mysqli_query($db, 'DELETE FROM clerk WHERE clerkId="' . $clerkId . '"');
        if ($delete && $deleteLogin) {
            echo "<script>location.assign('index.php?addClerk&success');</script>";
        } else {
            echo '<script>location.assign("index.php?addClerk&error");</script>';
        }
    } else {echo '<script>location.assign("index.php?addClerk&unsuccess");</script>';
    }
} //Update Clerk
else if (isset($_POST['updateClerk'])) {
    $clerkId = $_POST['clerkId'];
    $designation = $_POST['designation'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $department = $_POST['department'];
    $check = mysqli_query($db, 'SELECT * FROM clerk WHERE clerkId="' . $clerkId . '"') or die(mysqli_error($db));
    if (mysqli_num_rows($check) > 0) {
        $update = mysqli_query($db,
            "UPDATE clerk SET Designation='$designation', email='$email', address='$address', department='$department' WHERE clerkId='$clerkId'"
        );
        if ($update) {
            $update = mysqli_query($db,
                "UPDATE login SET department='$department' WHERE UserName='$clerkId'"
            );
            echo "<script>location.assign('index.php?addClerk&success');</script>";
        } else {
            echo '<script>location.assign("index.php?addClerk&error");</script>';
        }}
}

?>
</div>