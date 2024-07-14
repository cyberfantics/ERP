<div class="col-4 mb-1  py-2">
    <h3 class="text-center mb-0" id="deptHeading">Add Department</h3>
    <div class="row">
        <!--First section to add department--> <?php include_once "addDepartment.php";?>
        <!--Second Section to add address--> <?php include_once "addAddr.php";?>
    </div>
</div> <?php

//Section to add address
if (isset($_POST['addAddress'])) {

    $district = $_POST['district'];
    $state = $_POST['state'];
    $fetchAddr = mysqli_num_rows(mysqli_query($db, 'SELECT * FROM address WHERE stateid="' . $state . '" AND districtId="' . $district . '"'));
    if ($fetchAddr > 0) {
        echo "<script>location.assign('index.php?addFaculty&already');</script>";

    } else {
        $insert = mysqli_query($db, 'INSERT INTO address(`stateid`,`districtId`) VALUES ("' . $state . '","' . $district . '")');
        if ($insert) {
            echo "<script>location.assign('index.php?addFaculty&success');</script>";
        } else {
            echo "<script>location.assign('index.php?addFaculty&notInsert');</script>";
        }
    }
} else if (isset($_POST['deleteAddress'])) {
    $address = $_POST["address"];
    $fetchAddr = mysqli_query($db, 'SELECT * FROM address WHERE id="' . $address . '" ');
    if (mysqli_num_rows($fetchAddr) > 0) {
        $delete = mysqli_query($db, 'DELETE FROM address WHEREid="' . $address . '" ');
        if ($delete) {
            echo "<script>location.assign('index.php?deleteAddress&success');</script>";
        } else {
            echo "<script>location.assign('index.php?deleteAddress&unsuccess');</script>";
        }
    } else {
        echo "<script>location.assign('index.php?deleteAddress&error');</script>";
    }
}
?> <script>
var deptHeading = document.getElementById("deptHeading");
var deptDiv = document.getElementById("deptDiv");
var deptNameDiv = document.getElementById("deptNameDiv");
var addDepartmentBtn = document.getElementById("addDepartmentBtn");
var updateDepartmentBtn = document.getElementById("updateDepartmentBtn");
var deleteDepartmentBtn = document.getElementById("deleteDepartmentBtn");
var inputTypeNumber = document.getElementById('deptId');
var inputTypeText = document.getElementById('deptName');
addDepartmentBtn.disabled = false;
updateDepartmentBtn.disabled = true;
deleteDepartmentBtn.disabled = true; // Add click event listener to heading element
deptHeading.addEventListener('click', function() {
    // Get the current color of the deptHeading element
    var currentColor = window.getComputedStyle(deptHeading).getPropertyValue('color')
    if (currentColor === 'rgb(33, 37, 41)') {
        // Delete mode
        inputTypeText.required = false;
        deptHeading.innerText = 'Delete Department'
        deptHeading.style.color = 'rgb(202, 55, 55)'
        inputTypeNumber.placeholder = 'Enter Id To Delete Department'
        // Button section
        deptNameDiv.style.display = 'none';
        addDepartmentBtn.disabled = true
        deleteDepartmentBtn.disabled = false
        updateDepartmentBtn.disabled = true
    } // Check the current color and update elements accordingly
    else if (currentColor === 'rgb(202, 55, 55)') {
        // Update mode
        deptNameDiv.style.display = '';
        inputTypeText.required = true;
        deptHeading.innerText = 'Update Department'
        deptHeading.style.color = 'rgb(0, 128, 0)'
        inputTypeNumber.placeholder = 'Enter Id To Update Department'
        // Input section
        // Button Section
        addDepartmentBtn.disabled = true
        deleteDepartmentBtn.disabled = true
        updateDepartmentBtn.disabled = false
    } else {
        // Add mode
        deptHeading.innerText = 'Add Department'
        deptHeading.style.color = 'rgb(33, 37, 41)'
        inputTypeNumber.placeholder = 'Department Id'
        // Input section
        // Button Section
        addDepartmentBtn.disabled = false
        deleteDepartmentBtn.disabled = true
        updateDepartmentBtn.disabled = true
    }
})
</script>