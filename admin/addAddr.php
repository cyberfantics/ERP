<div class="col-12 mb-1 py-2">
    <h3 id="headingAddr" class="text-center mb-3">Add Address</h3>
    <form method="POST">
        <div class="input-group-append mb-3 " id="stateDiv">
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            <select id="stateSelect" required name="state" class="form-control">
                <!--Options to add state, first value is empty-->
                <option value="">Select State</option>
                <!--Php code to get tates from table--> <?php
$fetchState = mysqli_query($db, 'SELECT * FROM state');
//check if any type is present
$isStateFound = mysqli_num_rows($fetchState);
//If any state present
if ($isStateFound > 0) {
    //Run while loop to get values
    while ($state = mysqli_fetch_assoc($fetchState)) {
        $stateName = $state['state'];
        $stateId = $state['id'];
        ?><option value="<?php echo $stateId; ?>"><?php echo $stateName; ?></option> <?php
}
} else {
    echo '<option value="">First Add State</option>';
}
?>
            </select>
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
        </div>
        <div class="input-group-append mb-3" id="distDiv">
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
            <select id="districtSelect" required name="district" class="form-control">
                <!--Options to add district, first value is empty-->
                <option value="">Select District</option>
                <!--Php code to fetch district from table--> <?php
$fetchDist = mysqli_query($db, 'SELECT * FROM district');
//check if any type is present
$isDistFOund = mysqli_num_rows($fetchDist);
//If any dist present
if ($isDistFOund > 0) {
    //Run while loop to get values
    while ($getDist = mysqli_fetch_assoc($fetchDist)) {
        $distName = $getDist['district'];
        $distId = $getDist['zipCode'];
        ?><option value="<?php echo $distId; ?>"><?php echo $distName; ?></option> <?php
}
} else {
    echo '<option value="">First Add District</option>';
}
?>
            </select>
            <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
        </div>
        <div class="input-group mb-3" id="dummyDiv">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="text" id="address" name="address" class="form-control input_user"
                placeholder="Enter Address">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <!--Section For Buttons-->
        <div class="row">
            <div class="mb-2 ml-1 mr-2">
                <button type="submit" id="addAddressBtn" name="addAddress" class="btn bg-blue text-white ">Add
                    Address</button>
            </div>
            <div class="mb-2 mr-2">
                <button type="submit" id="updateAddressBtn" name="updateAddress" class="btn bg-green text-white ">Update
                    Address</button>
            </div>
            <div class="mb-2">
                <button type="submit" id="deleteAddressBtn" name="deleteAddress" class="btn bg-red text-white ">Delete
                    Address</button>
            </div>
        </div>
    </form>
</div>
<script src="addAddr.js">
</script>