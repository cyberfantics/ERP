<?php

//For result first we need registered course of student
$rCourse = mysqli_query($db, 'SELECT * FROM courseresult WHERE std_id="' . $_SESSION['std_id'] . '"');

while ($registeredCourse = mysqli_fetch_assoc($rCourse)) {
    //Now we get registration Id for result, course id for it's detail
    $Rcourseid = $registeredCourse['courseRegister'];

    //Now get course
    $Course = mysqli_fetch_assoc(mysqli_query($db, 'SELECT * FROM courses   WHERE courseId="' . $registeredCourse['courseId'] . '"'));
    //Fetch result
    $r_id = mysqli_query($db, 'SELECT * FROM semesterresult WHERE terminal ="' . $Rcourseid . '"');
    while ($Result = mysqli_fetch_assoc($r_id)) {
        //Get course name and credit hour and other
        $cName = ucwords($Course['courseName']);
        $creditHour = $Course['creditHours'];
        $cSemester = $registeredCourse['semester'];
        $GPA = $Result['GPA'];
        $grade = strtoupper($Result['GRADE']);
        $percentage = $Result['Percentage'];
        $totalMark = $Result['totalMarks'];
        $obtainMark = $Result['obtainedMarks'];

        ?>
<!--Display-->
<tr>
    <td><?php echo $cName; ?> </td>
    <td><?php echo $cSemester; ?> </td>
    <td><?php echo $creditHour; ?> </td>
    <td><?php echo $obtainMark; ?> </td>
    <td><?php echo round($percentage) . "%"; ?> </td>
    <td><?php echo $GPA; ?> </td>
    <td><?php echo $grade; ?> </td>
</tr><?php

    }}

?>