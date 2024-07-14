<!--Add Course--><?php include_once 'insertResult.php';?>
<!--Add Assignment Result--><?php include_once 'AssignmentResult.php';?>
<!--Notice Board--><?php include_once 'notice_board.php';?> </div>
<!--Second Row-->
<!--Notice Board--><?php include_once 'quizResult.php';?><script>
// Get references to the buttons and midterm element
const midterm = document.getElementById("midterm");
const terminalResult = document.getElementById("terminalResult");
const midTermResult = document.getElementById("midTermResult");
const terminalResultDiv = document.getElementById("terminalResultDiv");
const midTermResultDiv = document.getElementById("midTermResultDiv");
// Disable all buttons initially
terminalResult.disabled = true;
terminalResultDiv.style.display = "none";
midTermResult.disabled = false;
// Add click event listener to midterm element
midterm.addEventListener("click", function() { // Get the current color of the midterm element
    let currentColor = window.getComputedStyle(midterm).getPropertyValue("color");
    // Check the current color and update elements accordingly
    if (currentColor === "rgb(33, 37, 41)") {
        midterm.innerText = "Terminal";
        midterm.style.color = "rgb(0, 128, 0)";
        terminalResult.disabled = false;
        midTermResult.disabled = true;
        terminalResultDiv.style.display = "";
        midTermResultDiv.style.display = "none";
    } else {
        midterm.innerText = "Mid Term";
        midterm.style.color = "rgb(33, 37, 41)";
        terminalResult.disabled = true;
        midTermResult.disabled = false;
        terminalResultDiv.style.display = "none";
        midTermResultDiv.style.display = "";
    }
});
</script>