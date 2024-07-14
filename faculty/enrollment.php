<div class="row">
    <div class="col-4 mb-1  py-2">
        <h3 class="text-center">Enroll Students</h3>
        <form method="POST">
            <div class="input-group-append mb-3">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="" required name="student" class="form-control">
                    <!--Options to add usertype, first value is empty-->
                    <option value="">Select Student</option>
                    <!--Php code to get usertype from table--> <?php
$get_UserType = mysqli_query($db, 'SELECT * FROM student WHERE studentDept="' . $_SESSION['user_dept'] . '"') or die(mysqli_error($db));
//check if any type is present
$isUserFound = mysqli_num_rows($get_UserType);
//If any usertype present
if ($isUserFound > 0) {
    //Run while loop to get values
    while ($UserType = mysqli_fetch_assoc($get_UserType)) {
        $typeName = $UserType['NAME'];
        $UserId = $UserType['registration'];
        ?><option value="<?php echo $UserId; ?>"><?php echo $typeName; ?></option> <?php
}
} else {
    echo '<option value="">First Add Student</option>';
}

?>
                </select>
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group-append mb-3">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="" required name="semester" class="form-control">
                    <!--Options to add usertype, first value is empty-->
                    <option value="">Select Semester</option>
                    <!--Php code to get usertype from table--> <?php
$getSemester = mysqli_query($db, 'SELECT * FROM semester') or die(mysqli_error($db));
//check if any type is present
$semesterFound = mysqli_num_rows($getSemester);
//If any usertype present
if ($semesterFound > 0) {
    //Run while loop to get values
    while ($semesters = mysqli_fetch_assoc($getSemester)) {
        $semester = $semesters['semester'];
        ?><option value="<?php echo $semester; ?>"><?php echo $semester; ?></option> <?php
}
} else {
    echo '<option value="">First Add Semester</option>';
}

?> <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                </select>
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group-append mb-3">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="" required name="course" class="form-control">
                    <!--Options to add usertype, first value is empty-->
                    <option value="">Select Course</option>
                    <!--Php code to get usertype from table--> <?php
$getCourse = mysqli_query($db, 'SELECT * FROM courses') or die(mysqli_error($db));
//check if any type is present
$courseFound = mysqli_num_rows($getCourse);
//If any usertype present
if ($courseFound > 0) {
    //Run while loop to get values
    while ($courses = mysqli_fetch_assoc($getCourse)) {
        $course = $courses['courseName'];
        $courseId = $courses['courseId'];

        ?><option value="<?php echo $courseId; ?>"><?php echo $course; ?></option> <?php
}
} else {
    echo '<option value="">First Add Course</option>';
}

?>
                </select>
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="mt-2"> <button type="submit" name="enrollStudent" class="btn bg-blue text-white ">Enroll
                    Students</button>
            </div>
        </form>
    </div> <?php if (isset($_POST['enrollStudent'])) {
    $insert = mysqli_query($db, 'INSERT INTO registeredcourse(`std_id`,`teacherId`,`courseId`,`semester`) VALUE ("' . $_POST['student'] . '","' . $_SESSION['faculty_id'] . '"
        ,"' . $_POST['course'] . '","' . $_POST['semester'] . '")');
    if ($insert) {
        ?> <script>
    location.assign("index.php?courseRegister&success");
    </script><?php
} else {
        ?><script>
    location.assign("index.php?courseRegister&unsuccess");
    </script><?php
}
}?>
    <!--2ND SECTION-->
    <div class="col-4 mb-1  py-2">
        <h3 class="text-center">Enroll For Result</h3>
        <form method="POST">
            <div class="input-group-append mb-3">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="" required name="student" class="form-control">
                    <!--Options to add usertype, first value is empty-->
                    <option value="">Select Student</option>
                    <!--Php code to get usertype from table--> <?php

$fetchStudent = mysqli_query($db, 'SELECT DISTINCT std_id FROM registeredcourse WHERE teacherId="' . $_SESSION['faculty_id'] . '"');
while ($getStudentId = mysqli_fetch_assoc($fetchStudent)) {
    $get_UserType = mysqli_query($db, 'SELECT * FROM student WHERE registration="' . $getStudentId['std_id'] . '" AND studentDept="' . $_SESSION['user_dept'] . '"') or die(mysqli_error($db));
    //check if any type is present
    $isUserFound = mysqli_num_rows($get_UserType);
    //If any usertype present
    if ($isUserFound > 0) {
        //Run while loop to get values
        while ($UserType = mysqli_fetch_assoc($get_UserType)) {
            $typeName = $UserType['NAME'];
            $UserId = $UserType['registration'];
            ?><option value="<?php echo $UserId; ?>"><?php echo $typeName; ?></option> <?php
}
    } else {
        echo '<option value="">First Add Student</option>';
    }
}
?>
                </select>
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group-append mb-3">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="" required name="semester" class="form-control">
                    <!--Options to add usertype, first value is empty-->
                    <option value="">Select Semester</option>
                    <!--Php code to get usertype from table--> <?php

$fetchSemester = mysqli_query($db, 'SELECT DISTINCT semester FROM registeredcourse WHERE teacherId="' . $_SESSION['faculty_id'] . '"');
while ($getSemesterId = mysqli_fetch_assoc($fetchSemester)) {
    $getSemester = mysqli_query($db, 'SELECT  * FROM semester where semester="' . $getSemesterId['semester'] . '"') or die(mysqli_error($db));
    //check if any type is present
    $semesterFound = mysqli_num_rows($getSemester);
    //If any usertype present
    if ($semesterFound > 0) {
        //Run while loop to get values
        while ($semesters = mysqli_fetch_assoc($getSemester)) {
            $semester = $semesters['semester'];
            ?><option value="<?php echo $semester; ?>"><?php echo $semester; ?></option> <?php
}
    } else {
        echo '<option value="">First Add Semester</option>';
    }
}
?> <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                </select>
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group-append mb-3">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="" required name="course" class="form-control">
                    <!--Options to add usertype, first value is empty-->
                    <option value="">Select Course</option>
                    <!--Php code to get usertype from table--> <?php
$fetchSemester = mysqli_query($db, 'SELECT DISTINCT courseId FROM registeredcourse WHERE teacherId="' . $_SESSION['faculty_id'] . '"');
while ($getSemesterId = mysqli_fetch_assoc($fetchSemester)) {
    $getCourse = mysqli_query($db, 'SELECT * FROM courses where courseId="' . $getSemesterId['courseId'] . '"') or die(mysqli_error($db));
    //check if any type is present
    $courseFound = mysqli_num_rows($getCourse);
    //If any usertype present
    if ($courseFound > 0) {
        //Run while loop to get values
        while ($courses = mysqli_fetch_assoc($getCourse)) {
            $course = $courses['courseName'];
            $courseId = $courses['courseId'];

            ?><option value="<?php echo $courseId; ?>"><?php echo $course; ?></option> <?php
}
    } else {
        echo '<option value="">First Add Course</option>';
    }
}

?>
                </select>
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="mt-2"> <button type="submit" name="enrollStudentForResult"
                    class="btn bg-blue text-white ">Enroll For Result</button>
            </div>
        </form>
    </div> <?php if (isset($_POST['enrollStudentForResult'])) {
    $fetchCourse = mysqli_num_rows(mysqli_query($db, 'SELECT * FROM courseresult WHERE courseId="' . $_POST['course'] . '" AND std_id="' . $_POST['student'] . '" AND
    teacherId="' . $_SESSION['faculty_id'] . '"'));
    if ($fetchCourse > 0) {
        ?><script>
    location.assign("index.php?courseRegister&unsuccess");
    </script><?php
} else {
        $insert = mysqli_query($db, 'INSERT INTO courseresult (`std_id`,`teacherId`,`courseId`,`semester`) VALUE
    ("' . $_POST['student'] . '","' . $_SESSION['faculty_id'] . '" ,"' . $_POST['course'] . '","' . $_POST['semester'] .
            '")');
        if ($insert) {
            ?> <script>
    location.assign("index.php?courseRegister&success");
    </script><?php
} else {
            ?><script>
    location.assign("index.php?courseRegister&unsuccess");
    </script><?php
}
    }}?>