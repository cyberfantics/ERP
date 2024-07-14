<div class="row">
    <!--Add Student--> <?php
include_once 'insertStudent.php';
//Add State and Address

include_once '../admin/state_dist.php';

?>
    <!--Add Notice Board--> <?php include_once '../faculty/notice_board.php';?>
    <!--Code Logic--><?php
//Add Student
if (isset($_POST['AddStudent'])) {
    $StudentRegistration = ucwords($_POST['StudentRegistration']);
    $StudentName = ucwords($_POST['StudentName']);
    $FatherName = ucwords($_POST['FatherName']);
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $insert = mysqli_query($db,
        'INSERT INTO `student` (`registration`, `NAME`, `FatherName`, `DOB`, `email`, `address`, `studentDept`) VALUES ("' .
        $StudentRegistration . '", "' . $StudentName . '", "' . $FatherName . '", "' . $dob . '", "' . $email . '", "' . $address .
        '", "' . $_SESSION['user_dept'] . '")'
    );
    if ($insert) {
        $fetchType = mysqli_fetch_assoc(mysqli_query($db, 'SELECT id FROM userlogintype WHERE NAME="Student"'));
        $usertype = $fetchType['id'];
        $insert = mysqli_query($db,
            'INSERT INTO login (`UserName`, `PASSWORD`, `department`, `usertype`) VALUES ("' .
            $StudentRegistration . '", "' . $StudentName . '", "' . $_SESSION['user_dept'] . '","' . $usertype . '")'
        );if ($insert) {
            echo "<script>location.assign('index.php?addStudent&success');</script>";
        } else {
            echo '<script>location.assign("index.php?addStudent&unsuccess");</script>';
        }
    }

}
//Delete Student
else if (isset($_POST['deleteStudent'])) {
    $StudentRegistration = $_POST['StudentRegistration'];
    $check = mysqli_query($db, 'SELECT * FROM student WHERE registration="' . $StudentRegistration . '"') or die(mysqli_error($db));
    if (mysqli_num_rows($check) > 0) {
        $deleteLogin = mysqli_query($db, 'DELETE FROM login WHERE UserName="' . $StudentRegistration . '"') or die(mysqli_error($db));
        $delete = mysqli_query($db, 'DELETE FROM student WHERE registration="' . $StudentRegistration . '"');
        if ($delete && $deleteLogin) {
            echo "<script>location.assign('index.php?addStudent&success');</script>";
        } else {
            echo '<script>location.assign("index.php?addStudent&error");</script>';
        }
    } else {echo '<script>location.assign("index.php?addStudent&unsuccess");</script>';
    }
}
//Update Student
else if (isset($_POST['updateStudent'])) {
    $StudentRegistration = $_POST['StudentRegistration'];
    $FatherName = $_POST['FatherName'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $StudentName = ucwords($_POST['StudentName']);
    $department = $_POST['department'];
    $check = mysqli_query($db, 'SELECT * FROM student WHERE registration="' . $StudentRegistration . '"') or die(mysqli_error($db));
    if (mysqli_num_rows($check) > 0) {
        $update = mysqli_query($db,
            "UPDATE Student SET NAME='" . $StudentName . "', FatherName='$FatherName', email='$email', address='$address', studentDept='$department' WHERE registration='$StudentRegistration'"
        );
        if ($update) {
            $update = mysqli_query($db,
                "UPDATE login SET department='" . $_SESSION['user_dept'] . "' WHERE UserName='" . $StudentRegistration . "'"
            );
            echo "<script>location.assign('index.php?addStudent&success');</script>";
        } else {
            echo '<script>location.assign("index.php?addStudent&error");</script>';
        }}
}

?>
</div>
<script src="../admin/state_district.js">
</script>