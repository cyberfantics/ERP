    <div class="col-4 mb-1  py-2">
        <h3 id="headingClerk" class="text-center">Add Clerk</h3>
        <form method="POST">
            <div class="input-group mb-3" id="clerkId">
                <div class="input-group-append">
                    <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="clerkId" class="form-control input_user" autofocus required
                    placeholder="Clerk Id">
                <div class="input-group-append">
                    <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
                </div>
            </div>
            <div id="clerkName" class=" input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
                </div><input type="text" name="clerkName" class="form-control input_user" autofocus required
                    placeholder="Clerk Name">
                <div class="input-group-append">
                    <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
                </div>
            </div>
            <div id="designation" class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
                </div><input type="text" name="designation" class="form-control input_user" autofocus required
                    placeholder="Clerk Disignation">
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
            <!--Add department-->
            <div class="input-group-append mb-3" id="department">
                <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                <select id="" required name="department" class="form-control">
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
                <div class="mb-2 ml-3 mr-3"> <button type="submit" name="AddClerk" id="AddClerk"
                        class="btn bg-blue text-white ">Add Clerk</button>
                </div>
                <div class="mb-2 mr-3"> <button type="submit" id="updateClerk" name="updateClerk"
                        class="btn bg-green text-white ">Update Clerk</button>
                </div>
                <div class="mb-2"> <button id="deleteClerk" type="submit" name="deleteClerk"
                        class="btn bg-red text-white ">Delete Clerk</button>
                </div>
            </div>
        </form>
    </div>
    <script src="clerkBtn.js">
    </script>