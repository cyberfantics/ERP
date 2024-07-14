<?php require_once 'admin/inc/config.php';?>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>

<head>
    <title>Login Panel</title>
    <link rel="stylesheet" href="assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <link rel="stylesheet" href="assests/css/login.css">
</head>
<!--Coded with love by Mutiullah Samim-->

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="./assests/images/logo.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <!-- Php Start --> <?php

include_once 'signIn.php';
//Php End
?>
            </div>
        </div>
    </div>
    <script src="assests/js/bootstrap.min.js"></script>
    <script src="assests/js/jquery.min.js"></script>
</body>

</html>