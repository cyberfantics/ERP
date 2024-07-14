<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    //Apply sha1 hash on password because we stored data in hash
    $password = $_POST['password'];
    //Get username , password , usertype and department from database
    $department = $_POST['department'];
    //Get user type
    $UserType = $_POST['userType'];
    $type = mysqli_fetch_assoc(mysqli_query($db, 'SELECT Name FROM userlogintype WHERE id="' . $UserType . '"'));
    $UserType = $type['Name'];
    if ($UserType == 'Student') {
        $getData = mysqli_query($db, 'SELECT * FROM `login` WHERE `UserName`="' . $username . '" AND `department`="' . $department . '" AND `password`="' . $password . '"');
        //get username and password
        $data = mysqli_fetch_assoc($getData);
        if (mysqli_num_rows($getData) > 0) {

            session_start();
            $_SESSION['std_id'] = $data['UserName'];
            //Get name and dept of user
            $userInfo = mysqli_fetch_assoc(mysqli_query($db, 'SELECT * FROM student WHERE registration="' . $_SESSION['std_id'] . '"'));
            $_SESSION['user_name'] = $userInfo['Name'];
            $_SESSION['user_dept'] = $userInfo['studentDept'];
            $_SESSION['key'] = "Student_458kdfjlg";
            //Redirect to student page
            ?> <script>
location.assign("student/index.php");
</script> <?php

        } else {
            ?> <script>
location.assign("index.php?incorrectPassword");
</script> <?php
}
    } else if ($UserType == 'Faculty') {
        $getData = mysqli_query($db, 'SELECT * FROM `login` WHERE `UserName`="' . $username . '" AND `department`="' . $department . '" AND `password`="' . $password . '"');
        //If data exist in database
        //get username and password
        $data = mysqli_fetch_assoc($getData);

        if (mysqli_num_rows($getData) > 0) {
            session_start();
            $_SESSION['faculty_id'] = $data['UserName'];
            //Get name and dept of user
            $userInfo = mysqli_fetch_assoc(mysqli_query($db, 'SELECT * FROM teacher WHERE teacherId="' . $_SESSION['faculty_id'] . '"'));
            $_SESSION['user_name'] = $userInfo['Name'];
            $_SESSION['user_dept'] = $userInfo['department'];
            $_SESSION['key'] = "Faculty_449_458kdfjlg";
            //Redirect to student page
            ?> <script>
location.assign("faculty/index.php");
</script> <?php

        } else {
            ?> <script>
location.assign("index.php?incorrectPassword");
</script> <?php
}
    }

    //admin
    else if ($UserType == 'Admin') {
        $getData = mysqli_query($db, 'SELECT * FROM `login` WHERE `UserName`="' . $username . '" AND `Password`="' . $password . '"');
        //If data exist in database
        //get username and password
        $data = mysqli_fetch_assoc($getData);

        if (mysqli_num_rows($getData) > 0) {
            session_start();
            $_SESSION['faculty_id'] = $data['UserName'];
            //Get name and dept of user
            $userInfo = mysqli_fetch_assoc(mysqli_query($db, 'SELECT * FROM teacher WHERE teacherId="' . $_SESSION['faculty_id'] . '"'));
            $_SESSION['user_name'] = $userInfo['NAME'];
            $_SESSION['user_dept'] = $userInfo['department'];
            $_SESSION['key'] = "Admn54803";
            //Redirect to student page
            ?> <script>
location.assign("admin/index.php?Home");
</script> <?php

        } else {
            ?> <script>
location.assign("index.php?incorrectPassword");
</script> <?php
}
    }
    //Clerk
    else if ($UserType == 'Clerk') {
        $getData = mysqli_query($db, 'SELECT * FROM `login` WHERE `UserName`="' . $username . '" AND `password`="' . $password . '"  AND `department`="' . $department . '" AND `password`="' . $password . '"');
        //If data exist in database
        //get username and password
        $data = mysqli_fetch_assoc($getData);

        if (mysqli_num_rows($getData) > 0) {
            session_start();
            $_SESSION['clerk_id'] = $data['UserName'];
            //Get name and dept of user
            $userInfo = mysqli_fetch_assoc(mysqli_query($db, 'SELECT * FROM clerk WHERE clerkId="' . $_SESSION['clerk_id'] . '"'));
            $_SESSION['user_name'] = $userInfo['Name'];
            $_SESSION['user_dept'] = $userInfo['department'];
            $_SESSION['key'] = "ClerkLogin";
            //Redirect to clerk page
            ?> <script>
location.assign("clerk/index.php");
</script> <?php

        } else {
            ?> <script>
location.assign("index.php?incorrectPassword");
</script> <?php
}
    }
}?>