<?php
$semesters_data = mysqli_query($db, 'SELECT semester FROM semester');
while ($semesters = mysqli_fetch_assoc($semesters_data)) { //Now we get registration Id for result, course id for it's detail
    $totalMarks = 0;
    $obtainMarks = 0;
    $totalSubject = 0;
    $previousGpa = 0;
    //For result first we need registered course of student
    $rCourse = mysqli_query($db, 'SELECT * FROM courseresult WHERE std_id="' . $_SESSION['std_id'] . '" AND semester="' . $semesters['semester'] . '"');
    if (mysqli_num_rows($rCourse) > 0) {
        while ($registeredCourse = mysqli_fetch_assoc($rCourse)) { //Now we get registration Id for result, course id for it's detail

            $register_id = $registeredCourse['courseRegister'];
            //Fetch result
            $r_id = mysqli_query($db, 'SELECT * FROM semesterresult WHERE terminal="' . $register_id . '"');
            while ($Result = mysqli_fetch_assoc($r_id)) {
                $totalMarks += $Result['totalMarks'];
                $obtainMarks += $Result['obtainedMarks'];
                $previousGpa += $Result['GPA'];
                $totalSubject++;
            $percentage = $obtainMarks / $totalMarks * 100;
$gpa = $previousGpa / $totalSubject;
if ($percentage >= 90) {
    $grade = "A+";
} elseif ($percentage >= 80) {
    $grade = "A";
} elseif ($percentage >= 72) {
    $grade = "B+";
} elseif ($percentage >= 65) {
    $grade = "B";
} elseif ($percentage >= 50) {
    $grade = "C";
} else {
    $grade = "F";
}
        ?>
<!--Display-->
<tr>
    <td><?php echo $semesters['semester']; ?> </td>
    <td><?php echo $grade; ?> </td>
    <td><?php echo round($percentage).'%'; ?> </td>
    <td><?php echo $gpa; ?> </td>
</tr><?php

    }
}
}


}
?>