<div class="col-12 mb-1 py-2">
    <form method="POST">
        <div>
            <h3 class=" text-center mb-1.5" id="headingDist">Add District</h3>
        </div>
        <div class=" input-group mb-3" id="distId">
            <div class="input-group-append" id="distId">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
            <input type="number" name="distId" class="form-control input_user" autofocus placeholder="District Id">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="dist">
            <div class=" input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="text" name="distName" class="form-control input_user" autofocus required
                placeholder="District Name">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="zip">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="number" name="zip" class="form-control input_user" autofocus placeholder="Zip Code">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <!--Section For Buttons-->
        <div class="row">
            <div class="mb-2 ml-4"> <button type="submit" id="add" name="AddDistrict"
                    class="btn bg-blue text-white ">Add District</button>
            </div>
            <div class="mb-2 ml-3 mr-3"> <button type="submit" id="update" name="UpdateDistrict"
                    class="btn bg-green text-white ">Update District</button>
            </div>
            <div class="mb-2"> <button id="delete" type="submit" name="deleteDistrict"
                    class="btn bg-red text-white ">Delete District</button>
            </div>
        </div>
    </form>
</div>