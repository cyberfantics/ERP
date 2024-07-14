<div class="row">
    <!--2ND SECTION-->
    <div class="col-4 mb-1  py-2">
        <h3 class="text-center" id="midterm">Mid Term</h3>
        <form method="POST">
            <div class="input-group-append mb-3">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="" required name="student" class="form-control">
                    <!--Options to add usertype, first value is empty-->
                    <option value="">Select Student</option>
                    <!--Php code to get usertype from table--> <?php

$fetchStudent = mysqli_query($db, 'SELECT DISTINCT std_id FROM courseresult WHERE teacherId="' . $_SESSION['faculty_id'] . '"');
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

$fetchSemester = mysqli_query($db, 'SELECT DISTINCT semester FROM courseresult WHERE teacherId="' . $_SESSION['faculty_id'] . '"');
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
$fetchSemester = mysqli_query($db, 'SELECT DISTINCT courseId FROM courseresult WHERE teacherId="' . $_SESSION['faculty_id'] . '"');
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
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                </div><input class="form-control  text-black input_pass" name="totalMark" type="number" required
                    placeholder='Enter Total Marks' />
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                </div><input class="form-control  text-black input_pass" name="obtainedMark" type="number" required
                    placeholder='Enter Obtained Marks' />
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class='row'>
                <div class="ml-2" id="midTermResultDiv"> <button type="submit" name="midTermResult" id="midTermResult"
                        class="btn bg-blue text-white ">Add Result</button>
                </div>
                <div class="ml-2" id="terminalResultDiv"> <button type="submit" name="terminalResult"
                        id="terminalResult" class="btn bg-blue text-white ">Add Result</button>
                </div>
            </div>
        </form>
    </div>
    <!--Add result in database--><?php
//if course is present
if (isset($_POST['midTermResult'])) { //totalMarkobtainedMark
    $fetchCourse = mysqli_query($db, 'SELECT * FROM courseresult WHERE courseId="' . $_POST['course'] . '" AND std_id="' . $_POST['student'] . '" AND
    teacherId="' . $_SESSION['faculty_id'] . '"');
    $coursePresent = mysqli_num_rows($fetchCourse);
    if ($coursePresent > 0) {
        //As we get single data,so no need for any loop
        $registration = mysqli_fetch_assoc($fetchCourse);
        $registrationId = $registration['courseRegister'];

        $obtainMarks = $_POST['obtainedMark'];
        $totalMarks = $_POST['totalMark'];

        $insert = mysqli_query($db, 'INSERT INTO midtermresult(`totalMarks`,`obtainedMarks`,`courseRegister`)
    VALUES("' . $totalMarks . '","' . $obtainMarks . '","' . $registrationId . '")');
        if ($insert) {
            ?> <script>
    location.assign("index.php?addResult&success");
    </script><?php
} else {
            ?><script>
    location.assign("index.php?addResult&unsuccess");
    </script><?php
}} else {
        ?><script>
    location.assign("index.php?courseRegister&unsuccess");
    </script><?php }} else
if (isset($_POST['terminalResult'])) { //totalMarkobtainedMark
    $fetchCourse = mysqli_query($db, 'SELECT * FROM courseresult WHERE courseId="' . $_POST['course'] . '" AND std_id="' . $_POST['student'] . '" AND
    teacherId="' . $_SESSION['faculty_id'] . '"');
    $coursePresent = mysqli_num_rows($fetchCourse);
    if ($coursePresent > 0) {
        //As we get single data,so no need for any loop
        $registration = mysqli_fetch_assoc($fetchCourse);
        $registrationId = $registration['courseRegister'];

        $obtainMarks = $_POST['obtainedMark'];
        $totalMarks = $_POST['totalMark'];

        $insert = mysqli_query($db, 'INSERT INTO terminalresult(`totalMarks`,`obtainedMarks`,`courseRegister`)
    VALUES("' . $totalMarks . '","' . $obtainMarks . '","' . $registrationId . '")');
        if ($insert) {
            ?> <script>
    location.assign("index.php?addResult&success");
    </script><?php
} else {
            ?><script>
    location.assign("index.php?addResult&unsuccess");
    </script><?php
}} else {
        ?><script>
    location.assign("index.php?courseRegister&unsuccess");
    </script><?php }}?>