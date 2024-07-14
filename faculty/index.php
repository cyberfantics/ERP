<?php
session_start();
include_once '../admin/inc/header.php';

include_once '../admin/inc/config.php';

include_once './inc/navigation.php';

if (isset($_GET['courseRegister'])) {
    include_once 'addCourse.php';
} else if (isset($_GET['addResult'])) {
    include_once 'addResult.php';
} else if (isset($_GET['logout'])) {
    include_once '../logout.php';
} else if (isset($_GET['enrolled_Courses'])) {
    include_once 'enrolled_Courses.php';
} else if (isset($_GET['assignments'])) {
    include_once 'assignments.php';
} else if (isset($_GET['courseFeedback'])) {
    include_once 'courseFeedBack.php';
}
include_once '../admin/inc/footer.php';
