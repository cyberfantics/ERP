<?php //Get registered Courses of specific student
$getdata = mysqli_query($db, 'SELECT * from courseresult WHERE std_id="' . $_SESSION['std_id'] . '"');
$sno = 1;
while ($data = mysqli_fetch_assoc($getdata)) {
    $getCourse = mysqli_query($db, 'SELECT * FROM courses WHERE courseId="' . $data['courseId'] . '"');
    $isCoursePresent = mysqli_num_rows($getCourse);
    if ($isCoursePresent > 0) {
        $course = mysqli_fetch_assoc($getCourse);
        $techer = mysqli_fetch_assoc(mysqli_query($db, 'SELECT Name From teacher WHERE teacherId="' . $data['teacherId'] . '"'));
        ?> <tr>
    <th class="bg-green"><?php echo $sno;
        //get students feedback about course
        $feedback = mysqli_num_rows(mysqli_query($db, 'SELECT * FROM s_feedback_course WHERE teacherId="' . $data['teacherId'] . '" AND courseId="' . $course['courseId'] . '" AND std_id="' . $_SESSION['std_id'] . '"'));

        ++$sno; ?></th>
    <td class="bg-blue"><?php echo ucwords($course['courseName']); ?></td>
    <td class="bg-blue"><?php echo ucwords($techer['Name']); ?></td>
    <td class="bg-blue text-center"> <?php if ($feedback > 0) {
            ?> <p class="text-red my-0">Submitted</p><?php } else {
            ?> <a
            onclick="feedbackFromStudent('<?php echo $data['teacherId']; ?>','<?php echo $course['courseId']; ?>','<?php echo $_SESSION['std_id']; ?>')"
            class="text-white"> FeedBack</a>
    </td>
</tr> <?php
}
    }
}
?>