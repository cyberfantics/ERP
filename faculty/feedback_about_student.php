<div class="col-6 mb-3  py-2">
    <h3 class="text-center text-yellow">FeedBack About Students</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="student" required name="enrolledStudents" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">How many students are currently enrolled in the school/department/class? </option>
                <option value=5>>=50</option>
                <option value=4>>=40</option>
                <option value=3>>=30</option>
                <option value=2>>=20</option>
                <option value=1>>=10</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="attendence_rate" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">What is the average attendance rate for each student?</option>
                <option value=100>100</option>
                <option value=95>95</option>
                <option value=90>90</option>
                <option value=85>85</option>
                <option value=80>80</option>
            </select>
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><select id="name" required name="displinary_action" class="form-control bg-white text-black">
                <!--Options to add candidate, first value is empty-->
                <option value="">How many students have received disciplinary action this semester?</option>
                <option value=10>10</option>
                <option value=9>9</option>
                <option value=8>8</option>
                <option value=7>7</option>
                <option value=6>6</option>
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
            </div><input class="form-control  text-black input_pass" name="assignment_time" type="number" required
                placeholder='How many students have completed their assignments on time this semester?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="struggling" type="number" required
                placeholder='How many students are struggling with a particular subject?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="dropStudent" type="number" required
                placeholder='How many students have dropped out of the program?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="absentStudent" type="text" required
                placeholder='How many students have been absent without valid reasons?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="extraActivity" type="text" required
                placeholder='How many students are participating in extracurricular activities?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div><input class="form-control  text-black input_pass" name="aditionalAcademicSupport" type="number"
                required
                placeholder='How many students are in need of additional academic support or counseling services?' />
        </div>
        <div class="input-group mb-2">
            <div class="input-group-append text-red">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            </div>
            <textarea class="form-control text-black" name="achivedOutStanding" required
                placeholder='How many students have achieved outstanding academic performance this semester? ' rows="4"
                style="width: 90%;"></textarea>
        </div>
        <div class=" mt-3"> <button type="submit" name="teacherFeedBack_submit" class="btn bg-blue text-white ">Submit
                FeedBack</button> </div>
    </form>
</div> <?php
if (isset($_POST['teacherFeedBack_submit'])) {

    $enrolledStudents = $_POST["enrolledStudents"];
    $attendence_rate = $_POST["attendence_rate"];
    $displinary_action = $_POST["displinary_action"];
    $dropStudent = $_POST["dropStudent"];
    $assignment_time = $_POST["assignment_time"];
    $struggling = $_POST["struggling"];
    $absentStudent = $_POST["absentStudent"];
    $extraActivity = $_POST["extraActivity "];
    $achivedOutStanding = $_POST["achivedOutStanding"];
    $aditionalAcademicSupport = $_POST["aditionalAcademicSupport"];
    $teacherId = $_POST["teacherId"];
    $courseId = $_POST["courseId"];

    $insert = mysqli_query($db, 'INSERT INTO teacher_feedback_aboutCourse(`attendence_rate`,
`enrolledStudents`,`displinary_action`,`dropStudent`,`assignment_time`,`absentStudent`,
`struggling`,`extraActivity`,`achivedOutStanding`,`aditionalAcademicSupport`,`teacherId`,`courseId`) VALUES("' . $attendence_rate . '",
"' . $enrolledStudents . '","' . $displinary_action . '","' . $dropStudent . '","' . $assignment_time . '","' . $absentStudent . '",
"' . $struggling . '","' . $extraActivity . '","' . $achivedOutStanding . '","' . $aditionalAcademicSupport . '","' . $teacherId . '","' . $courseId . '")');
    if ($insert) {
        echo "inserted";
    } else {
        echo "Please Come With Valid Refrence";
    }
}
?>