<div class="d-flex justify-content-center form_container">
    <form method="POST">
        <div class=" input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="username" class="form-control input_user" autofocus required
                placeholder="User Name">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" class="form-control input_pass" required placeholder="Password">
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class="input-group-append mb-3">
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            <select id="candidate" required name="userType" class="form-control">
                <!--Options to add usertype, first value is empty-->
                <option value="">Select User Type</option>
                <!--Php code to get usertype from table--> <?php
$get_UserType = mysqli_query($db, 'SELECT * FROM userlogintype  ORDER BY NAME Asc') or die(mysqli_error($db));
//check if any type is present
$isUserFound = mysqli_num_rows($get_UserType);
//If any usertype present
if ($isUserFound > 0) {
    //Run while loop to get values
    while ($UserType = mysqli_fetch_assoc($get_UserType)) {
        $typeName = $UserType['NAME'];
        $UserId = $UserType['id'];
        ?><option value="<?php echo $UserId; ?>"><?php echo $typeName; ?></option> <?php
}
}

?>
            </select>
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class="input-group-append" id="dept">
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            <select required name="department" class="form-control">
                <!--Options to add department, first value is empty-->
                <option value="">Select Department</option>
                <!--Php code to get dept from table--> <?php
$getDepartment = mysqli_query($db, 'SELECT * FROM department ORDER BY dept_Name asc') or die(mysqli_error($db));
//check if any department is present
$isDeptFound = mysqli_num_rows($getDepartment);
//If any department present
if ($isDeptFound > 0) {
    //Run while loop to get values
    while ($DeptType = mysqli_fetch_assoc($getDepartment)) {
        $deptName = $DeptType['dept_Name'];
        $deptId = $DeptType['dept_id'];
        ?><option value="<?php echo $deptId; ?>"><?php echo $deptName; ?></option> <?php
}
}
?>
            </select>
            <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
            <button type="submit" name="login" class="btn login_btn">Login</button>
        </div>
        <div><?php
if (isset($_GET['incorrectPassword'])) {
    ?> <b>
                <p id="incorrect" class="ml-2 text-red">Incorrect username or password</p>
            </b>
            <script>
            window.addEventListener('click', function() {
                document.getElementById('incorrect').innerText = "";
                location.assign('index.php')
            })
            </script> <?php
} ?>
        </div>
    </form>
</div>
</div> <?php include_once 'signInLogic.php';?><script>
document.getElementById("candidate").addEventListener("change", function() {
    if (this.value === '1') {
        document.getElementById("dept").style.display = "none";
        document.querySelector('select[name="department"]').required = false;
    } else {
        document.getElementById("dept").style.display = "";
        document.querySelector('select[name="department"]').required = true;
    }
});
</script>
