<?php
//Unset session
session_unset();
//Redirect to login page
?><script>
location.assign("../index.php");
</script> <?php   
//Then die the program
die();
?>