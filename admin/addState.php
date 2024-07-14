<div class="col-12 mb-1  py-2">
    <form method="POST">
        <div class=" input-group mb-3 " id="stateId">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
            <input type="number" name="stateId" class="form-control input_user" autofocus required
                placeholder="State Id">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <div class=" input-group mb-3" id="stateName">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div><input type="text" name="stateName" class="form-control input_user" autofocus required
                placeholder="State/Country Name">
            <div class="input-group-append">
                <span class="input-group-text  bg-blue"><i class="fas fa-user"></i></span>
            </div>
        </div>
        <!--Section For Buttons-->
        <div class="row">
            <div class="mb-2 ml-5 mr-3"> <button type="submit" id="addState" name="addState"
                    class="btn bg-blue text-white ">Add State</button>
            </div>
            <div class="mb-2 mr-3"> <button type="submit" id="updateState" name="updateState"
                    class="btn bg-green text-white ">Update State</button>
            </div>
            <div class="mb-2"> <button id="deleteState" type="submit" name="deleteState"
                    class="btn bg-red text-white ">Delete State</button>
            </div>
        </div>
    </form>
</div>
