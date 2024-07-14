<?php
session_start();
if ($_SESSION['key'] != "Admin_Panel34") {
    //Redirect to login page
    ?><script>
location.assign("../index.php");
</script> <?php
//Then die the program
    die();
}
?>