<?php

if ($_SESSION['key'] != "Student_458kdfjlg") {
    //Redirect to login page
    ?><script>
location.assign("../index.php");
</script> <?php
//Then die the program
    die();
}
?>