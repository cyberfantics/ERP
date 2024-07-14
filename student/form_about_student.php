<div class="col-6 mb-3  py-2">
    <h3 class="text-center text-yellow">FeedBack About Course</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="OverallExperience" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">What was your overall experience with this course? </option>
                <option value="Good">Good</option>
                <option value="Very Good">Very Good</option>
                <option value="Bad">Bad</option>
                <option value="Very Bad">Very Bad</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="Relevance" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">Did you find the course content useful and relevant?</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="Teaching_quality" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">How would you rate the teaching quality of the instructor?</option>
                <option value=5>5</option>
                <option value=4>4</option>
                <option value=3>3</option>
                <option value=2>2</option>
                <option value=1>1</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="Course_pace" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">Was the course pace comfortable for you?</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append"><span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="Meeting_expectations" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">Did the course meet your expectations?</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="Struggles" type="text" required
                placeholder='Were there any particular topics you struggled with?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="Support" type="text" required
                placeholder='How was the support provided by the instructor?' />
        </div>
        <div class=" input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="Effectiveness_of_assignments"
                class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">Did you find the assignments helpful in reinforcing the course content? </option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class=" input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="Effectiveness_of_course" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">Were the course materials, such as readings and slides, effective? </option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <textarea class="form-control text-black" name="Recommendation" required
                placeholder='Would you recommend this course to other students?' rows="4"
                style="width: 90%;"></textarea>
        </div>
        <div class="mt-3"> <button type="submit" name="SubmitFeedback" class="btn bg-blue text-white ">Submit
                FeedBack</button> <?php
// Write form is submitted if data is inserted
if (isset($_POST['SubmitFeedback'])) {
    $OverallExperience = $_POST['OverallExperience'];
    $Course_pace = $_POST['Course_pace'];
    $Meeting_expectations = $_POST['Meeting_expectations'];
    $Relevance = $_POST['Relevance'];
    $Teaching_quality = $_POST['Teaching_quality'];
    $Struggles = $_POST['Struggles'];
    $Support = $_POST['Support'];
    $Effectiveness_of_course = $_POST['Effectiveness_of_course'];
    $Effectiveness_of_assignments = $_POST['Effectiveness_of_assignments'];
    $Recommendation = $_POST['Recommendation'];
    $userId = $_SESSION['std_id'];
    $courseId = $_SESSION['course_id'];
    $teacher_id = $_SESSION['teacher_id'];
    //Insert into database
    $inserted = mysqli_query(
        $db,
        'INSERT INTO s_feedback_course
     (`std_id`,`courseId`,`teacherId`,`OverallExperience`,`Course_pace`,`Meeting_expectations`,`Relevance`,`Teaching_quality`,`Struggles`,
     `Support`,`Effectiveness_of_course`,`Effectiveness_of_assignments`,`Recommendation`,`Feedback_date`)
            VALUES("' . $userId . '","' . $courseId . '","' . $teacher_id . '","' . $OverallExperience . '","' . $Course_pace . '","' . $Meeting_expectations . '",
            "' . $Relevance . '", "' . $Teaching_quality . '","' . $Struggles . '","' . $Support . '",
            "' . $Effectiveness_of_course . '","' . $Effectiveness_of_assignments . '","' . $Recommendation . '","' . date('Y-m-d') . '")'
    ) or die(mysqli_error($db));

    if ($inserted) {
        echo "inserted";
    } else {
        echo "Please Come With Valid Refrence";
    }
}
//End
?> </div>
    </form>
</div>