<?php session_start();
if (isset($_POST["courseId"]) && isset($_POST["teacherId"])) {
    $_SESSION['teacher_id'] = $_POST['teacherId'];
    $_SESSION['course_id'] = $_POST['courseId'];
    echo 'set';
}
