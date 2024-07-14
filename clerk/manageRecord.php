<?php
//First We Fetch All Record From studentFeedbackCourse Form Database
$fetchTeacherData = mysqli_query($db, 'SELECT std_id, teacherId, courseId FROM s_feedback_teacher');
$fetchCourseData = mysqli_query($db, 'SELECT std_id, teacherId, courseId FROM s_feedback_teacher');
$isDataPresent = mysqli_num_rows($fetchTeacherData);
//Section End ,Now Fetch It Detail
?><h3 class="text-center text-green">Section To Manage Feedback And Generate Reports</h3>
<div class="row">
    <div class="cols-6">
        <h3 class="text-center text-red">Students Feedback Report For Teachers</h3>
        <form method="POST">
            <div class="input-group-append mb-3 " id="teacherDiv">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="teacherSelect" required name="teacher" class="form-control">
                    <!--Options to add Teacher, first value is empty-->
                    <option value="">Select Teacher</option>
                    <!--Add Logic To Fectch Teachers Record--> <?php
if ($isDataPresent > 0) {
    while ($data = mysqli_fetch_assoc($fetchTeacherData)) {
        $fetchTeacher = mysqli_query($db, 'SELECT Name,teacherId FROM teacher WHERE teacherId="' . $data['teacherId'] . '"');
        $teacherData = mysqli_fetch_assoc($fetchTeacher);
        ?><option value='<?php echo $teacherData['teacherId']; ?>'> <?php echo $teacherData['Name']; ?> </option><?php
}
} else {
    echo "<option value=''>Please Add Teacher</option>";
}
?>
                </select>
                <span class=" input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <div class="input-group-append mb-3" id="courseDiv">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="courseSelect" required name="course" class="form-control">
                    <!--Options to add course, first value is empty-->
                    <option value="">Select Course</option>
                    <!--Add Logic To Fectch courses Record--> <?php
if ($isDataPresent > 0) {
    while ($data = mysqli_fetch_assoc($fetchCourseData)) {
        $fetchCourse = mysqli_query($db, 'SELECT * FROM courses WHERE courseId="' . $data['courseId'] . '"');
        $CourseData = mysqli_fetch_assoc($fetchCourse) or die(mysqli_error($db));
        ?><option value='<?php echo $CourseData['courseId']; ?>'> <?php echo $CourseData['courseName']; ?></option><?php
}
} else {
    echo "<option value=''>Please Add Course</option>";
}
?>
                </select>
                <span class=" input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <!--Section For Buttons-->
            <div class="mb-2 ml-1 mr-2">
                <button type="submit" id="addAddressBtn" name="addStudentFeedback" class="btn bg-blue text-white ">Add
                    Address</button>
            </div>
        </form>
    </div>
</div><?php include_once 'studentFeedbackReport.php';?>