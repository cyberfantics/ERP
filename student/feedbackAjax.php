<?php     session_start();
if (isset($_POST["userId"]) && isset($_POST["userId"]) && isset($_POST["teacherId"])) {
    $_SESSION['teacher_id'] = $_POST['teacherId'];
    $_SESSION['std_id'] = $_POST['userId'];
    $_SESSION['course_id'] = $_POST['courseId'];
    echo  'set';
}?>