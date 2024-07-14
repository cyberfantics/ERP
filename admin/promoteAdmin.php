<div class="col-4 mb-1  py-2">
    <h3 id="headingAdmin" class="text-center">Promote Admin</h3>
    <form method="POST">
        <div class="input-group mb-3" id="AdminIdDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
            <input type="number" name="adminId" class="form-control input_user" autofocus required
                placeholder="Enter Id Of Teacher To Promote Admin">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class="row">
            <div class=" mb-2 ml-3 mr-3"> <button type="submit" name="addAdmin" id="addAdmin"
                    class="btn bg-blue text-white ">Add Admin</button>
            </div>
            <div class="mb-2 mr-3"> <button type="submit" id="updateAdmin" name="updateAdmin"
                    class="btn bg-green text-white ">Update Admin</button>
            </div>
            <div class="mb-2"> <button id="deleteAdmin" type="submit" name="deleteAdmin"
                    class="btn bg-red text-white ">Delete Admin</button>
            </div>
        </div>
    </form>
</div>
<script src="addAdmin.js">
</script><?php
if (isset($_POST['addAdmin'])) {
    $id = $_POST['adminId'];
    $teacher_name = mysqli_query($db, 'SELECT * FROM teacher WHERE teacherId="' . $id . '"');
    $teacher_present = mysqli_num_rows($teacher_name);
    $teacher_name = mysqli_fetch_assoc($teacher_name);
    if ($teacher_present > 0) {
        $insert = mysqli_query($db, 'INSERT INTO adminlogin(`UserName`,`Password`,`usertype`) values("' . $id . '","' . $teacher_name['Name'] . '","4")');
        if ($insert) {
            echo '<script>location.assign("index.php?Home&success");</script>';
        } else {
            echo '<script>location.assign("index.php?Home&unsuccess");</script>';
        }
    }
} else if (isset($_POST['deleteAdmin'])) {
    $id = $_POST['adminId'];
    $teacher_name = mysqli_query($db, 'SELECT * FROM adminlogin WHERE UserName="' . $id . '"');
    $teacher_present = mysqli_num_rows($teacher_name);
    $teacher_name = mysqli_fetch_assoc($teacher_name);
    if ($teacher_present > 0) {
        $delete = mysqli_query($db, 'DELETE FROM adminlogin WHERE `UserName`= "' . $id . '"');
        if ($delete) {
            echo '<script>location.assign("index.php?Home&success");</script>';
        } else {
            echo '<script>location.assign("index.php?Home&unsuccess");</script>';
        }
    } else {
        echo '<script>location.assign("index.php?Home&error");</script>';
    }

}

?>