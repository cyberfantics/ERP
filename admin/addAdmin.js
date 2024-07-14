var headingAdmin = document.getElementById('headingAdmin')
var AdminIdDiv = document.getElementById('AdminIdDivDiv')
var addAdmin = document.getElementById('addAdmin')
var updateAdmin = document.getElementById('updateAdmin')
var deleteAdmin = document.getElementById('deleteAdmin')
const adminInput = document.querySelector('input[name="adminId"]')
// Disable all buttons initially
addAdmin.disabled = false
deleteAdmin.disabled = true
updateAdmin.disabled = true
// Add click event listener to heading element
headingAdmin.addEventListener('click', function () {
  // Get the current color of the heading element
  var currentColor = window.getComputedStyle(headingAdmin).getPropertyValue('color')
  // Check the current color and update elements accordingly
  if (currentColor === 'rgb(33, 37, 41)') {
    // Delete mode
    headingAdmin.innerText = 'Delete Admin'
    headingAdmin.style.color = 'rgb(202, 55, 55)'
    adminInput.placeholder = 'Enter Id To Delete Admin'
    addAdmin.disabled = true
    updateAdmin.disabled = true
    deleteAdmin.disabled = false
  } // Check the current color and update elements accordingly
  else if (currentColor === 'rgb(0, 128, 0)') {
    // Add mode
    headingAdmin.style.color = 'rgb(33, 37, 41)'
    headingAdmin.innerText = 'Promote Admin'
    adminInput.required = false
    adminInput.placeholder = 'Enter Id Of Teacher To Promote Admin'
    addAdmin.disabled = false
    updateAdmin.disabled = true
  }else {
    // Update mode
    headingAdmin.innerText = 'Update Admin'
    headingAdmin.style.color = 'rgb(0, 128, 0)'
    adminInput.placeholder = 'Please go and change Teacher '
    deleteAdmin.disabled = true
  }
})
