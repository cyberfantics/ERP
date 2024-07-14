   <!--Add Course--> <?php if (isset($_POST['addCourse'])) {
    $courseCode = $_POST['courseCode'];
    $courseName = $_POST['courseName'];
    $creditHour = $_POST['creditHour'];
    $insert = mysqli_query($db, 'INSERT INTO courses(`courseId`,`courseName`,`creditHours`) VALUES("' . $courseCode . '","' . $courseName . '","' . $creditHour . '")');
    if ($insert) {
        ?> <script>
location.assign("index.php?courseRegister&success");
   </script><?php
} else {
        ?><script>
location.assign("index.php?courseRegister&unsuccess");
   </script><?php
}
}
?>
   <!--Add Semester--> <?php if (isset($_POST['addSemester'])) {
    $semester = $_POST['semester'];
    $semesterDuration = $_POST['semesterDuration'];
    $insert = mysqli_query($db, 'INSERT INTO semester(`semester`,`semester_duration`) VALUES("' . $semester . '","' . $semesterDuration . '")');
    if ($insert) {
        ?> <script>
location.assign("index.php?courseRegister&success");
   </script><?php
} else {
        ?><script>
location.assign("index.php?courseRegister&unsuccess");
   </script><?php
}
}
?>