<?php session_start();
include_once '../admin/inc/header.php';
include_once '../admin/inc/config.php';
include_once './inc/navigation.php';

if (isset($_GET['logout'])) {
    include_once '../logout.php';
} else if (isset($_GET['Home'])) {
    include_once 'homepage.php';
} else if (isset($_GET['addStudent'])) {
    include_once 'addStudent.php';
} else if (isset($_GET['manageRecord'])) {
    include_once 'manageRecord.php';
}
include_once '../admin/inc/footer.php';