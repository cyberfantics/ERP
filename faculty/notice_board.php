<div class=" col-4 mb-1">
    <h3 class="text-center">Notice Board</h3>
    <table width="100%" class="bg-blue" height="55%" border="5px solid blue">
        <tr?>
            <th class="text-center" id="notice_board"> <?php
if (isset($_GET['success'])) {
    ?>Added Successfully<?php } else if (isset($_GET['unsuccess'])) {
    ?>Already Exist In Database<?php
} else if (isset($_GET['error'])) {
    ?>No Data Found<?php }?> </th>
            </tr>
    </table>
    <div class=" mt-2"> <button type="submit" id="submit" name="clearScreen" class="btn bg-blue text-white ">Clear
            Board</button>
    </div>
</div>
<script>
formSubmit = document.getElementById('submit');
formSubmit.addEventListener('click', function() {
    document.getElementById('notice_board').innerText = "";
});
window.addEventListener('click', function() {
    document.getElementById('notice_board').innerText = "";
})
</script>;