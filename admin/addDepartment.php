<!--Logic to Add Department--><?php if (isset($_POST['addDepartment'])) {
    $deptId = $_POST['deptId'];
    $deptName = $_POST['deptName'];
    $insert = mysqli_query($db, 'INSERT INTO department(`dept_id`,`dept_Name`) VALUES ("' . $deptId . '","' . $deptName . '")');
    if ($insert) {
        echo "<script>location.assign('index.php?addFaculty&success');</script>";
    } else {
        echo "<script>location.assign('index.php?addFaculty&unsuccess');</script>";
    }
} else if (isset($_POST['deleteDepartment'])) {
    $deptId = $_POST['deptId'];

    $delete = mysqli_query($db, 'DELETE FROM department WHERE dept_id="' . $deptId . '"');
    if ($delete) {
        echo "<script>location.assign('index.php?addFaculty&success');</script>";
    } else {
        echo "<script>location.assign('index.php?addFaculty&error');</script>";
    }
} else if (isset($_POST['updateDepartment'])) {
    $deptId = $_POST['deptId'];
    $deptName = $_POST['deptName'];

    $checkDepartment = mysqli_query($db, 'SELECT * FROM department WHERE dept_id="' . $deptId . '"');
    if (mysqli_num_rows($checkDepartment) > 0) {
        $update = mysqli_query($db, 'UPDATE department SET dept_Name="' . $deptName . '" WHERE dept_id="' . $deptId . '"');
        if ($update) {
            echo "<script>location.assign('index.php?addFaculty&success');</script>";
        } else {
            echo "<script>location.assign('index.php?addFaculty&unsuccess');</script>";
        }
    } else {
        echo "<script>location.assign('index.php?addFaculty&error');</script>";
    }

}
?><div class="col-12 mb-1  py-2">
    <form method="POST">
        <div class=" input-group mb-3" id="deptDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
            <input type="number" name="deptId" id="deptId" class="form-control input_user" autofocus required
                placeholder="Department Id">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="deptNameDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="text" name="deptName" id="deptName" class="form-control input_user" autofocus required
                placeholder="Department Name">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <!--Section For Buttons-->
        <div class="row">
            <div class="mb-2 ml-5">
                <button type="submit" id="addDepartmentBtn" name="addDepartment" class="btn bg-blue text-white ">Add
                    Dept</button>
            </div>
            <div class="mb-2 ml-3 mr-3">
                <button type="submit" id="updateDepartmentBtn" name="updateDepartment"
                    class="btn bg-green text-white ">Update Dept</button>
            </div>
            <div class="mb-2">
                <button type="submit" id="deleteDepartmentBtn" name="deleteDepartment"
                    class="btn bg-red text-white">Delete Dept</button>
            </div>
        </div>
    </form>
</div>