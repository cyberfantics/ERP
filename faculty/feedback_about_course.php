<div class="col-6 mb-3  py-2">
    <h3 class="text-center text-yellow">FeedBack About Course</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="offeredCourse" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">How many courses are currently being offered this semester?</option>
                <option value=5>5</option>
                <option value=4>4</option>
                <option value=3>3</option>
                <option value=2>2</option>
                <option value=1>1</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="enroledStudents" type="text" required
                placeholder='How many students are enrolled in each course?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="passRate" type="text" required
                placeholder='What is the pass rate for each course?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="assignmentAssesment" type="text" required
                placeholder='How many assignments and assessments are scheduled for each course this semester?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="coursePostpend" type="text" required
                placeholder='How many courses have been cancelled or postponed this semester?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="attendenceRate" type="text" required
                placeholder='What is the average attendance rate for each course?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="modifiedCourse" type="text" required
                placeholder='How many courses have received feedback from students and/or teachers about their content or delivery?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="onlineCourse" type="text" required
                placeholder='How many courses are offered online, hybrid, or in-person this semester?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="changeCourse" type="text" required
                placeholder='How many courses have had changes to their syllabus or grading policies?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <textarea class="form-control text-black" name="feedbackCourse" required
                placeholder='How many courses have been modified or updated since the last semester?' rows="4"
                style="width: 90%;"></textarea>
        </div>
        <div class="mt-3"> <button type="submit" name="SubmitCourseFeedback" class="btn bg-blue text-white ">Submit
                FeedBack</button>
        </div>
    </form>
</div> <?php
if (isset($_POST['SubmitCourseFeedback'])) {
    $offeredCourse = $_POST["offeredCourse"];
    $enroledStudents = $_POST["enroledStudents"];
    $passRate = $_POST["passRate"];
    $assignmentAssesment = $_POST["assignmentAssesment"];
    $coursePostpend = $_POST["coursePostpend"];
    $attendenceRate = $_POST["attendenceRate"];
    $modifiedCourse = $_POST["modifiedCourse"];
    $changeCourse = $_POST["changeCourse"];
    $onlineCourse = $_POST["onlineCourse"];
    $feedbackCourse = $_POST["feedbackCourse"];
    $teacherId = $_SESSION["teacher_id"];
    $courseId = $_SESSION["course_id"];

    $insert = mysqli_query($db, 'INSERT INTO teacher_feedback_aboutCourse(`offeredCourse`,
`enroledStudents`,`passRate`,`assignmentAssesment`,`coursePostpend`,`attendenceRate`,
`modifiedCourse`,`changeCourse`,`onlineCourse`,`feedbackCourse`,`teacherId`,`courseId`) VALUES("' . $offeredCourse . '",
"' . $enroledStudents . '","' . $passRate . '","' . $assignmentAssesment . '","' . $coursePostpend . '","' . $attendenceRate . '",
"' . $modifiedCourse . '","' . $changeCourse . '","' . $onlineCourse . '","' . $feedbackCourse . '","' . $teacherId . '","' . $courseId . '")');
    if ($insert) {
        echo "inserted";
    } else {
        echo "Please Come With Valid Refrence";
    }
}
?>