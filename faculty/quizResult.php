<div class="row">
    <div class="col-4 mb-1  py-2">
        <h3 class="text-center" id="midQuiz">Mid Quiz</h3>
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
$fetchSemester = $db->prepare("SELECT DISTINCT semester FROM courseresult WHERE teacherId = ?");
$fetchSemester->bind_param("s", $_SESSION['faculty_id']);
$fetchSemester->execute();
$getSemesterId = $fetchSemester->get_result();

if ($getSemesterId->num_rows > 0) {
    while ($row = $getSemesterId->fetch_assoc()) {
        $getSemester = $db->prepare("SELECT * FROM semester WHERE semester = ?");
        $getSemester->bind_param("s", $row['semester']);
        $getSemester->execute();
        $semesters = $getSemester->get_result();
        if ($semesters->num_rows > 0) {
            while ($semester = $semesters->fetch_assoc()) {
                echo '<option value="' . $semester['semester'] . '">' . $semester['semester'] . '</option>';
            }
        } else {
            echo '<option value="">First Add Semester</option>';
        }
    }
} else {
    echo '<option value="">First Add Semester</option>';
}
?>
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
                <div class="ml-2" id="midTermQuizDiv"> <button type="submit" name="midTermQuiz" id="midTermQuiz"
                        class="btn bg-blue text-white ">Add Result</button>
                </div>
                <div class="ml-2" id="terminalQuizDiv"> <button type="submit" name="terminalQuiz" id="terminalQuiz"
                        class="btn bg-blue text-white ">Add Result</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-4 mb-1  py-2">
        <h3 class="text-center">Update Result</h3>
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
$fetchSemester = $db->prepare("SELECT DISTINCT semester FROM courseresult WHERE teacherId = ?");
$fetchSemester->bind_param("s", $_SESSION['faculty_id']);
$fetchSemester->execute();
$getSemesterId = $fetchSemester->get_result();

if ($getSemesterId->num_rows > 0) {
    while ($row = $getSemesterId->fetch_assoc()) {
        $getSemester = $db->prepare("SELECT * FROM semester WHERE semester = ?");
        $getSemester->bind_param("s", $row['semester']);
        $getSemester->execute();
        $semesters = $getSemester->get_result();
        if ($semesters->num_rows > 0) {
            while ($semester = $semesters->fetch_assoc()) {
                echo '<option value="' . $semester['semester'] . '">' . $semester['semester'] . '</option>';
            }
        } else {
            echo '<option value="">First Add Semester</option>';
        }
    }
} else {
    echo '<option value="">First Add Semester</option>';
}
?>
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
            <div class="ml-2"> <button type="submit" name="insertResultInDatabase" id="insertResultInDatabase"
                    class="btn bg-blue text-white ">Add Result</button>
            </div>
    </div>
    </form>
</div>
</div>
<!--Add result in database--><?php
if (isset($_POST['midTermQuiz'])) {
    $fetchCourse = mysqli_query($db, 'SELECT * FROM courseresult WHERE courseId="' . $_POST['course'] . '" AND std_id="' . $_POST['student'] . '" AND teacherId="' . $_SESSION['faculty_id'] . '"');
    if ($fetchCourse && mysqli_num_rows($fetchCourse) > 0) {
        $registration = mysqli_fetch_assoc($fetchCourse);
        $registrationId = $registration['courseRegister'];
        $totalMark = $_POST['totalMark'];
        $obtainedMarks = $_POST['obtainedMark'];

        $isPresent = mysqli_query($db, 'SELECT * FROM midtermresult WHERE courseRegister="' . $registrationId . '"');
        if ($isPresent && mysqli_num_rows($isPresent) > 0) {
            $update = mysqli_query($db, 'UPDATE midtermresult SET oQuizMarks="' . $obtainedMarks . '", tQuizMarks="' . $totalMark . '" WHERE courseRegister="' . $registrationId . '"');
            if ($update) {
                ?> <script>
location.assign("index.php?addResult&success");
</script><?php
} else {
                ?><script>
location.assign("index.php?addResult&unsuccess");
</script><?php
}
        } else {
            ?><script>
location.assign("index.php?addResult&unsuccess");
</script><?php }
    }
} else if (isset($_POST['terminalQuiz'])) {
    $fetchCourse = mysqli_query($db, 'SELECT * FROM courseresult WHERE courseId="' . $_POST['course'] . '" AND std_id="' . $_POST['student'] . '" AND teacherId="' . $_SESSION['faculty_id'] . '"');
    if ($fetchCourse && mysqli_num_rows($fetchCourse) > 0) {
        $registration = mysqli_fetch_assoc($fetchCourse);
        $registrationId = $registration['courseRegister'];
        $totalMark = $_POST['totalMark'];
        $obtainedMarks = $_POST['obtainedMark'];

        $isPresent = mysqli_query($db, 'SELECT * FROM terminalresult WHERE courseRegister="' . $registrationId . '"');
        if ($isPresent && mysqli_num_rows($isPresent) > 0) {
            $update = mysqli_query($db, 'UPDATE terminalresult SET oQuizMarks="' . $obtainedMarks . '", tQuizMarks="' . $totalMark . '" WHERE courseRegister="' . $registrationId . '"');
            if ($update) {
                ?> <script>
location.assign("index.php?addResult&success");
</script><?php
} else {
                ?><script>
location.assign("index.php?addResult&unsuccess");
</script><?php
}
        } else {
            ?><script>
location.assign("index.php?addResult&unsuccess");
</script><?php }
    }

} else if (isset($_POST['insertResultInDatabase'])) {
    $fetchCourse = mysqli_query($db, 'SELECT * FROM courseresult WHERE courseId="' . $_POST['course'] . '" AND std_id="' . $_POST['student'] . '" AND teacherId="' . $_SESSION['faculty_id'] . '"');
    if ($fetchCourse && mysqli_num_rows($fetchCourse) > 0) {
        $registration = mysqli_fetch_assoc($fetchCourse);
        $registrationId = $registration['courseRegister'];
        //Now fetch marks from terminal
        $fetchTerminalResult = mysqli_query($db, 'select * from terminalresult where courseRegister="' . $registrationId . '"');
        $fetchMidResult = mysqli_query($db, 'select * from midtermresult where courseRegister="' . $registrationId . '"');
        $getTerminalResult = mysqli_fetch_assoc($fetchTerminalResult);
        $getMidResult = mysqli_fetch_assoc($fetchMidResult);
        //Get mid variables
        $midAssignmentObtain = $getMidResult['oAssignmentMarks'];
        $midAssignmentTotal = $getMidResult['tAssignmentMarks'];
        $midObtain = $getMidResult['obtainedMarks'];
        $midTotal = $getMidResult['totalMarks'];
        $midQuizObtain = $getMidResult['oQuizMarks'];
        $midQuizTotal = $getMidResult['tQuizMarks'];

        //Get Terminal marks
        $TerminalAssignmentObtain = $getTerminalResult['oAssignmentMarks'];
        $TerminalAssignmentTotal = $getTerminalResult['tAssignmentMarks'];
        $TerminalObtain = $getTerminalResult['obtainedMarks'];
        $TerminalTotal = $getTerminalResult['totalMarks'];
        $TerminalQuizObtain = $getTerminalResult['oQuizMarks'];
        $TerminalQuizTotal = $getTerminalResult['tQuizMarks'];

        //Sum Of total marks
        $totalMarks = $TerminalAssignmentTotal + $TerminalQuizTotal + $TerminalTotal + $midAssignmentTotal + $midQuizTotal + $midTotal;
        $obtainMarks = $TerminalAssignmentObtain + $TerminalQuizObtain + $TerminalObtain + $midAssignmentObtain + $midQuizObtain + $midObtain;
        //Get credit hours
        $get_course = mysqli_fetch_assoc(mysqli_query($db, 'SELECT creditHours FROM courses where courseId="' . $_POST['course'] . '"'));
        $creditHour = $get_course['creditHours'];

        //Get Percentage
        $percentage = $obtainMarks / $totalMarks * 100;
//find grade
        if ($percentage >= 90) {
            $grade = "A+";
            $gpaValue = 4.0;
        } elseif ($percentage >= 80) {
            $grade = "A";
            $gpaValue = 3.7;
        } elseif ($percentage >= 72) {
            $grade = "B+";
            $gpaValue = 3.3;
        } elseif ($percentage >= 65) {
            $grade = "B";
            $gpaValue = 2.7;
        } elseif ($percentage >= 55) {
            $grade = "C+";
            $gpaValue = 2.3;
        } elseif ($percentage >= 50) {
            $grade = "C";
            $gpaValue = 2.0;
        } else {
            $grade = "F";
        }
        $gpa = ($gpaValue * $creditHour) / $creditHour;
        $insert = mysqli_query($db,
            'INSERT INTO semesterresult
        (`midTerm`,`terminal`,`Percentage`,`totalMarks`
        ,`obtainedMarks`,`GPA`,`GRADE`)
        VALUES("' . $registrationId . '","' . $registrationId . '","' . $percentage . '",
        "' . $totalMarks . '","' . $obtainMarks . '","' . $gpa . '","' . $grade . '")'
        );
        if ($insert) {?> <script>
location.assign("index.php?addResult&success");
</script><?php
} else {
            ?><script>
location.assign("index.php?addResult&unsuccess");
</script><?php
}} else {
        ?><script>
location.assign("index.php?courseRegister&unsuccess");
</script><?php }

}?><script>
// Get references to the buttons and midterm element
const midQuiz = document.getElementById("midQuiz");
const terminalQuiz = document.getElementById("terminalQuiz");
const midTermQuiz = document.getElementById("midTermQuiz");
const terminalQuizDiv = document.getElementById("terminalQuizDiv");
const midTermQuizDiv = document.getElementById("midTermQuizDiv");
// Disable all buttons initially
terminalQuiz.disabled = true;
terminalQuizDiv.style.display = "none";
midTermQuiz.disabled = false;
// Add click event listener to midterm element
midQuiz.addEventListener("click", function() { // Get the current color of the midQuiz element
    let currentColor = window.getComputedStyle(midQuiz).getPropertyValue("color");
    // Check the current color and update elements accordingly
    if (currentColor === "rgb(33, 37, 41)") {
        midQuiz.innerText = "Terminal Quiz";
        midQuiz.style.color = "rgb(0, 128, 0)";
        terminalQuiz.disabled = false;
        midTermQuiz.disabled = true;
        terminalQuizDiv.style.display = "";
        midTermQuizDiv.style.display = "none";
    } else {
        midQuiz.innerText = "Mid Quiz";
        midQuiz.style.color = "rgb(33, 37, 41)";
        terminalQuiz.disabled = true;
        midTermQuiz.disabled = false;
        terminalQuizDiv.style.display = "none";
        midTermQuizDiv.style.display = "";
    }
});
</script>