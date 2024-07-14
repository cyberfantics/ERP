<?php
session_start();
include_once './inc/Auth.php';
include_once '../admin/inc/config.php';

include_once '../admin/inc/header.php';

include_once './inc/navigation.php';

//Menu

if (isset($_GET['courseRegister'])) {
    include_once 'Register.php';
} else if (isset($_GET['courseFeedback'])) {
    include_once 'courseFeedBack.php';} else if (isset($_GET['result'])) {
    include_once 'result.php';
} else if (isset($_GET['logout'])) {
    include_once "../logout.php";
}else if (isset($_GET['assignment'])) {
    include_once "assignment.php";
}

//Footer Part
include_once '../admin/inc/footer.php';