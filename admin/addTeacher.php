<div class="col-4 mb-1  py-2">
    <h3 class="text-center" id="headingFaculty">Add Faculty</h3>
    <form method="POST">
        <div class=" input-group mb-3" id="teacherIdDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="teacherId" id="teacherId" class="form-control input_user" autofocus required
                placeholder="Teacher Id">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="teacherNameDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="text" name="teacherName" id="teacherName" class="form-control input_user" autofocus
                required placeholder="Teacher Name">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="teacherDesignationDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="text" id="teacherDesignation" name="teacherDesignation" class="form-control input_user"
                autofocus required placeholder="Teacher Disignation">
            <div class="input-group-append"> <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="teacherDobDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div> <input id="date" type="text" onclick="type='date'" name="teacherDob" class="form-control input_user"
                autofocus required placeholder="Date of Birth">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="teacherEmailDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="email" name="teacherEmail" id="email" class=" form-control input_user" autofocus required
                placeholder="Email">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <!--Fetch Address from database-->
        <div class="input-group-append mb-3" id="teacherAddrDiv">
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            <select id="teacherAddr" required name="teacherAddr" class="form-control">
                <!--Options to add Address, first value is empty-->
                <option value="">Select Address</option>
                <!--Php code to get Address from table--> <?php

$fetchAddress = mysqli_query($db, 'SELECT * FROM address');
if (mysqli_num_rows($fetchAddress) > 0) {
    while ($getAddress = mysqli_fetch_assoc($fetchAddress)) {
        $fetch_State = mysqli_query($db, 'SELECT * FROM `state` WHERE id="' . $getAddress['stateid'] . '" ');
        $fetch_Dist = mysqli_query($db, 'SELECT * FROM `district` WHERE zipCode="' . $getAddress['districtId'] . '" ');
//check if any address is present
        $getState = mysqli_fetch_assoc($fetch_State);
        $getDist = mysqli_fetch_assoc($fetch_Dist);
        $dist = $getDist['district'];
        $state = $getState['state'];

        ?><option value="<?php echo $getAddress['id']; ?>"><?php echo $state . " , " . $dist; ?></option> <?php

    }
} else {
    echo '<option value="">First Add Any Address</option>';
}
?>
            </select>
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
        </div>
        <!--Add department-->
        <div class="input-group-append mb-3" id="teacherDeptDiv">
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            <select id="teacherDept" required name="teacherDept" class="form-control">
                <!--Options to add department, first value is empty-->
                <option value="">Select Department</option>
                <!--Php code to get department from table--> <?php

$fetchDept = mysqli_query($db, 'SELECT * FROM department');

if (mysqli_num_rows($fetchDept) > 0) {
    while ($getDept = mysqli_fetch_assoc($fetchDept)) {?><option value="<?php echo $getDept['dept_id']; ?>">
                    <?php echo $getDept['dept_Name']; ?></option> <?php
}
} else {
    echo '<option value="">First Add Department</option>';

}
?>
            </select>
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
        </div>
        <div class="row">
            <div class="mr-2 ml-2 mt-1"> <button type="submit" name="AddTeacher" id="AddTeacher"
                    class="btn bg-blue text-white ">Add Teacher</button>
            </div>
            <div class="mr-2 mt-1"> <button type="submit" name="UpdateTeacher" id="UpdateTeacher"
                    class="btn bg-green text-white ">Update Teacher</button>
            </div>
            <div class="mr-2 mt-1"> <button type="submit" id="DeleteTeacher" name="DeleteTeacher"
                    class="btn bg-red text-white ">Delete Teacher</button>
            </div>
        </div>
    </form>
</div>
<script>
const teacherDeptInput = document.querySelector('select[name = "teacherDept"]')
const teacherAddrInput = document.querySelector('select[name = "teacherAddr"]')
const teacherEmailInput = document.querySelector('input[name = "teacherEmail"]')
const teacherIdInput = document.querySelector('input[name = "teacherId"]')
const teacherDesigInput = document.querySelector('input[name = "teacherDesignation"]')
const teacherDobInput = document.querySelector('input[name = "teacherDob"]')
const teacherNameInput = document.querySelector('input[name = "teacherName"]')
var headingFaculty = document.getElementById("headingFaculty");
var teacherId = document.getElementById("teacherId");
var teacherIdDiv = document.getElementById("teacherIdDiv");
var teacherName = document.getElementById("teacherName");
var teacherNameDiv = document.getElementById("teacherNameDiv");
var teacherDesignation = document.getElementById("teacherDesignation");
var teacherDesignationDiv = document.getElementById("teacherDesignationDiv");
var teacherDob = document.getElementById("date");
var teacherDobDiv = document.getElementById("teacherDobDiv");
var email = document.getElementById("email");
var teacherEmailDiv = document.getElementById("teacherEmailDiv");
var teacherAddrDiv = document.getElementById("teacherAddrDiv");
var teacherAddr = document.getElementById("teacherAddr");
var teacherDeptDiv = document.getElementById("teacherDeptDiv");
var teacherDept = document.getElementById("teacherDept");
var AddTeacher = document.getElementById("AddTeacher");
var UpdateTeacher = document.getElementById("UpdateTeacher");
var DeleteTeacher = document.getElementById("DeleteTeacher");
// Disable all buttons initially
AddTeacher.disabled = false
DeleteTeacher.disabled = true
UpdateTeacher.disabled = true
// Add click event listener to heading element
headingFaculty.addEventListener('click', function() {
    // Get the current color of the headingFaculty element
    var currentColor = window.getComputedStyle(headingFaculty).getPropertyValue('color')
    if (currentColor === 'rgb(33, 37, 41)') {
        // Delete mode
        headingFaculty.innerText = 'Delete Faculty'
        headingFaculty.style.color = 'rgb(202, 55, 55)'
        teacherIdInput.placeholder = 'Enter Id To Delete Teacher'
        teacherNameInput.required = false
        teacherIdInput.required = true
        teacherDobInput.required = false
        teacherEmailInput.required = false
        teacherDeptInput.required = false
        teacherDesigInput.required = false
        teacherAddrInput.required = false
        // display Section
        teacherIdDiv.style.display = ''
        teacherNameDiv.style.display = 'none'
        teacherDobDiv.style.display = 'none'
        teacherEmailDiv.style.display = 'none'
        teacherDeptDiv.style.display = 'none'
        teacherDesignationDiv.style.display = 'none'
        teacherAddrDiv.style.display = 'none'
        // Button section
        AddTeacher.disabled = true
        DeleteTeacher.disabled = false
        UpdateTeacher.disabled = true
    } // Check the current color and update elements accordingly
    else if (currentColor === 'rgb(202, 55, 55)') {
        // Update mode
        headingFaculty.innerText = 'Update Faculty'
        headingFaculty.style.color = 'rgb(0, 128, 0)'
        // Input section
        teacherIdInput.placeholder = 'Enter Id To Update Teacher'
        teacherNameInput.required = false
        teacherIdInput.required = true
        teacherDobInput.required = false
        teacherEmailInput.required = true
        teacherDeptInput.required = true
        teacherDesigInput.required = true
        teacherAddrInput.required = true
        // display Section
        teacherIdDiv.style.display = ''
        teacherNameDiv.style.display = 'none'
        teacherDobDiv.style.display = 'none'
        teacherEmailDiv.style.display = ''
        teacherDeptDiv.style.display = ''
        teacherDesignationDiv.style.display = ''
        teacherAddrDiv.style.display = ''
        // Button Section
        AddTeacher.disabled = true
        DeleteTeacher.disabled = true
        UpdateTeacher.disabled = false
    } else {
        // Add mode
        headingFaculty.innerText = 'Add Faculty'
        headingFaculty.style.color = 'rgb(33, 37, 41)'
        // Input section
        teacherIdInput.placeholder = 'Teacher Id'
        teacherNameInput.required = true
        teacherDobInput.required = true
        // display Section
        teacherNameDiv.style.display = ''
        teacherDobDiv.style.display = ''
        // Button Section
        AddTeacher.disabled = false
        DeleteTeacher.disabled = true
        UpdateTeacher.disabled = true
    }
})
</script>