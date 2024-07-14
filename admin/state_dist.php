<div class="col-4 mb-1  py-2">
    <h3 class="text-center mb-0" id="headingState">Add State</h3>
    <div class="row">
        <!--First section to add state--> <?php include_once "addState.php";?>
        <!--Second Section to add Dist--> <?php include_once "addDist.php";?>
    </div>
</div> <?php require_once 'districtLogicFile.php';
require_once 'stateLogicFile.php';

//--Script To Delete And Update District-->
?><script src="state_district.js">
</script>