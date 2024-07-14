<div class="row">
    <!--2ND SECTION-->
    <div class="col-4 mb-1  py-2">
        <h3 class="text-center">Add Assignments</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                </div><input class="form-control  text-black input_pass" name="assignmentNumber" type="text"
                    onclick='type="number"' required placeholder='Enter Assignment Number' />
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                </div><input class="form-control  text-black input_pass" name="assignmentMarks" type="number" required
                    placeholder='Assignment Marks' /><span class="input-group-text bg-blue"><i
                        class="fas fa-key"></i></span>
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
                </div><input class="form-control  text-black input_pass" name="assignDate" type="text"
                    onclick="type='date'" required placeholder='Enter Assigned Date' />
                <span class=" input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                </div><input class="form-control  text-black input_pass" name="expireDate" type="text"
                    onclick='type="date"' required placeholder='Enter Expired Date' />
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-append">
                    <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                </div><input class="form-control  text-black input_pass" name="fileAttach" type="text"
                    onclick='type="file"' required placeholder='Enter Assignment File' />
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="mt-2"> <button type="submit" name="assignmentAdded" class="btn bg-blue text-white ">Add
                    Assignment</button>
            </div>
        </form>
    </div>
    <!--Add result in database--><?php
//if course is present
if (isset($_POST['assignmentAdded'])) { //totalMarkobtainedMark
    $assignmentNumber = $_POST['assignmentNumber'];
    $assignmentMarks = $_POST['assignmentMarks'];
    $semester = $_POST['semester'];
    $course = $_POST['course'];
    $assignDate = $_POST['assignDate'];
    $expireDate = $_POST['expireDate'];
    //Store photopath
    //Give path where you are storing file
    $targatedPath = "../assests/assignments/";
    //Add file name with path and add some random number from repeating extension

    $fileAttach = $targatedPath . rand(1111111, 99999999) . "_" . $_FILES['fileAttach']['name'];
    //Get temp name of file
    $fileAttachTemp = $_FILES['fileAttach']['tmp_name'];
    //Get file name
    $fileAttachFileType = strtolower(pathinfo($fileAttach, PATHINFO_EXTENSION));
    //Get allowed file extensions
    $allowedFiles = array('jpg', 'jpeg', 'png', 'pdf', 'docx', 'txt', 'doc');
    //Get file size
    $fileAttachSize = $_FILES['fileAttach']['size'];
    //if file size is less then 3mb
    if ($fileAttachSize < 10000000) {
        //If file extension is present in allowed
        if (in_array($fileAttachFileType, $allowedFiles)) {
            //If file move successfully to desired folder
            if (move_uploaded_file($fileAttachTemp, $fileAttach)) {
                //Finally insert into database
                $insert = mysqli_query($db, 'INSERT INTO assignment(`assignmentNumber`,`totalMarks` ,`semester` ,`courseId` ,`assignedDate`,`expiredDate`,`teacherId`,`Assignment`
     ) values ("' . $assignmentNumber . '","' . $assignmentMarks . '","' . $semester . '","' . $course . '","' . $assignDate . '","' . $expireDate . '","' . $_SESSION['faculty_id'] . '","' . $fileAttach . '")') or die(mysqli_error($db));
                if ($insert) {
                    ?> <script>
    location.assign("index.php?assignments&success");
    </script><?php
} else {
                    ?><script>
    location.assign("index.php?assignments&unsuccess");
    </script><?php
}
            }
        }
    }
}?>