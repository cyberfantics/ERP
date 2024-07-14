<div class="row bg-black">
    <div class="col-12 text-white">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="6" class="text-center">Assignments</th>
                </tr>
                <tr class="text-red">
                    <th>Subject</th>
                    <th>Teacher</th>
                    <th>Assign Date</th>
                    <th>Deadline</th>
                    <th>Download</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody> <?php
//Get Course and Teacher Who Add Assignment
$fetchData = mysqli_query($db, 'SELECT  distinct * FROM courseresult r INNER JOIN  assignment a  on a.courseId=r.courseId and a.teacherId=r.teacherId and std_id="' . $_SESSION['std_id'] . '"');
$isPresent = mysqli_num_rows($fetchData);
if ($isPresent > 0) {
    while ($getData = mysqli_fetch_assoc($fetchData)) {
//Get Subject
        $course = mysqli_fetch_assoc(mysqli_query($db, 'SELECT courseName FROM courses where courseId="' . $getData['courseId'] . '"'));
        $teacher = mysqli_fetch_assoc(mysqli_query($db, 'SELECT Name FROM teacher where teacherId="' . $getData['teacherId'] . '"'));

//Print Subject
        ?> <tr class="bg-black text-blue">
                    <th><?php echo $course['courseName']; ?></th>
                    <td><?php echo $teacher['Name']; ?></td>
                    <td><?php echo $getData['assignedDate']; ?></td>
                    <td><?php echo $getData['expiredDate']; ?></td>
                    <td><a href="<?php echo $getData['Assignment']; ?>" class="btn btn-success">Download</a> </td> <?php
if (date('Y-m-d') < $getData['expiredDate']) {
            ?> <td> <b><?php echo "Pending";
            ?></b></td><?php } else {?><td class="text-danger"><b> <?php echo "Expired"; ?></b>
                    </td>
                </tr> <?php
}
    }
} else {
    ?> <tr>
                    <th colspan="6" class="text-center">Congradultions!!!! No Assignment is added Yet</th><?php
}
?>
                </tr>
            </tbody>
        </table>
    </div>
</div>