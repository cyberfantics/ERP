<?php session_start();
include_once './inc/header.php';
include_once './inc/config.php';

include_once './inc/navigation.php';
if (isset($_GET['addFaculty'])) {

    include_once 'addFaculty.php';

} else if (isset($_GET['addClerk'])) {
    include_once 'addClerk.php';
} else if (isset($_GET['logout'])) {
    include_once '../logout.php';
} else if (isset($_GET['Home'])) {
    include_once 'homePage.php';
}

include_once './inc/footer.php';
