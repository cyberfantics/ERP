<div class="row">
    <!--Add Teacher--> <?php
include_once 'addTeacher.php';
?>
    <!--Add Department And Address--> <?php include_once 'Department_addr.php';?>
    <!--Add Notice Board State And District--> <?php include_once '../faculty/notice_board.php';?>
    <!--Code Logic--><?php if (isset($_POST['AddTeacher'])) {
    $teacherId = $_POST['teacherId'];
    $teacherName = ucwords($_POST['teacherName']);
    $designation = $_POST['teacherDesignation'];
    $dob = $_POST['teacherDob'];
    $email = $_POST['teacherEmail'];
    $address = $_POST['teacherAddr'];
    $department = $_POST['teacherDept'];
    $insert = mysqli_query($db,
        'INSERT INTO `teacher` (`teacherId`, `Name`, `Designation`, `DOB`, `email`, `address`, `department`) VALUES ("' .
        $teacherId . '", "' . $teacherName . '", "' . $designation . '", "' . $dob . '", "' . $email . '", "' . $address .
        '", "' . $department . '")'
    ) or die(mysqli_error($db));
    if ($insert) {
        $fetchType = mysqli_fetch_assoc(mysqli_query($db, 'SELECT id FROM userlogintype WHERE NAME="Faculty"'));
        $usertype = $fetchType['id'];
        $insert = mysqli_query($db,
            'INSERT INTO `login` (`UserName`, `PASSWORD`, `department`, `usertype`) VALUES ("' .
            $teacherId . '", "' . $teacherName . '", "' . $department . '","' . $usertype . '")'
        );
        echo "<script>location.assign('index.php?addFaculty&success');</script>";
    } else {
        echo '<script>location.assign("index.php?addFaculty&unsuccess");</script>';
    }

} else if (isset($_POST['DeleteTeacher'])) {
    $teacherId = $_POST['teacherId'];

    $check = mysqli_query($db, "SELECT * FROM teacher WHERE teacherId='$teacherId'");
    if (mysqli_num_rows($check) > 0) {
        $delete = mysqli_query($db, "DELETE FROM teacher WHERE teacherId='$teacherId'");
        if ($delete) {
            $delete = mysqli_query($db, "DELETE FROM login WHERE UserName='$teacherId'");
            echo "<script>location.assign('index.php?manageFaculty&deleted');</script>";
        } else {
            echo "<script>location.assign('index.php?manageFaculty&undeleted');</script>";
        }
    } else {
        echo "<script>location.assign('index.php?manageFaculty&error');</script>";
    }
} else if (isset($_POST['UpdateTeacher'])) {
    $teacherId = $_POST['teacherId'];
    $teacherName = ucwords($_POST['teacherName']);
    $designation = $_POST['teacherDesignation'];
    $dob = $_POST['teacherDob'];
    $email = $_POST['teacherEmail'];
    $address = $_POST['teacherAddr'];
    $department = $_POST['teacherDept'];

    $checkTeacher = mysqli_query($db, 'SELECT * FROM teacher WHERE teacherId="' . $teacherId . '"');
    if (mysqli_num_rows($checkTeacher) > 0) {
        $update = mysqli_query($db,
            'UPDATE teacher SET Designation="' . $designation . '", email="' . $email . '", address="' . $address . '", department="' . $department . '" WHERE teacherId="' . $teacherId . '"'
        ) or die(mysqli_error($db));
        if ($update) {
            $update = mysqli_query($db,
                'UPDATE userlogin SET department="' . $department . '" WHERE UserName="' . $teacherId . '"'
            );
            echo "<script>location.assign('index.php?updateFaculty&success');</script>";
        } else {
            echo '<script>location.assign("index.php?updateFaculty&unsuccess");</script>';
        }
    } else {
        echo '<script>location.assign("index.php?updateFaculty&error");</script>';
    }
}

?>
</div>
<!--Promote Teacher As Admin--> <?php include_once 'promoteAdmin.php';?>