<div class="col-4 mb-1  py-2">
    <h3 id="headingStudent" class="text-center">Add Student</h3>
    <form method="POST">
        <div class="input-group mb-3" id="StudentRegistration">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="StudentRegistration" class="form-control input_user" autofocus required
                placeholder="Student Registration">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div id="StudentName" class=" input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="text" name="StudentName" class="form-control input_user" autofocus required
                placeholder="Student Name">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div id="FatherName" class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="text" name="FatherName" class="form-control input_user" autofocus required
                placeholder="Student Father Name">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="dob">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div> <input type="text" onclick="type='date'" name="dob" class="form-control input_user" autofocus
                required placeholder="Date of Birth">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="email">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
            <input type="email" name="email" class="form-control input_user" autofocus required placeholder="Email">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <!--Fetch Address from database-->
        <div class="input-group-append mb-3" id="address">
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            <select id="" required name="address" class="form-control">
                <!--Options to add address, first value is empty-->
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
        <div class="row">
            <div class="mb-2 ml-3 mr-3"> <button type="submit" name="AddStudent" id="AddStudent"
                    class="btn bg-blue text-white ">Add Student</button>
            </div>
            <div class="mb-2 mr-3"> <button type="submit" id="updateStudent" name="updateStudent"
                    class="btn bg-green text-white ">Update Student</button>
            </div>
            <div class="mb-2"> <button id="deleteStudent" type="submit" name="deleteStudent"
                    class="btn bg-red text-white ">Delete Student</button>
            </div>
        </div>
    </form>
</div>
<script src="StudentBtn.js">
</script>