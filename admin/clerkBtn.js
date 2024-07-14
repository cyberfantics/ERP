const clerk_IdContainer = document.getElementById('clerkId')
const clerk_NameContainer = document.getElementById('clerkName')
const clerk_designationContainer = document.getElementById('designation')
const clerk_dobContainer = document.getElementById('dob')
const clerk_emailContainer = document.getElementById('email')
const clerk_addressContainer = document.getElementById('address')
const clerk_departmentContainer = document.getElementById('department')
const addClerk = document.getElementById('AddClerk')
const deleteClerk = document.getElementById('deleteClerk')
const updateClerk = document.getElementById('updateClerk')
const headingClerk = document.getElementById('headingClerk')
const idInput = document.querySelector('input[name="clerkId"]')
const NameInput = document.querySelector('input[name="clerkName"]')
const designationInput = document.querySelector('input[name="designation"]')
const dobInput = document.querySelector('input[name="dob"]')
const emailInput = document.querySelector('input[name="email"]')
const addressInput = document.querySelector('select[name="address"]')
const departmentInput = document.querySelector('select[name="department"]')

// Disable all buttons initially
addClerk.disabled = false
deleteClerk.disabled = true
updateClerk.disabled = true
// Add click event listener to heading element
headingClerk.addEventListener('click', function () {
  // Get the current color of the headingClerk element
  var currentColor = window.getComputedStyle(headingClerk).getPropertyValue('color')
  if (currentColor === 'rgb(33, 37, 41)') {
    // Delete mode
    headingClerk.innerText = 'Delete Clerk'
    headingClerk.style.color = 'rgb(202, 55, 55)'
    idInput.placeholder = 'Enter Id To Delete Clerk'
    NameInput.required = false
    idInput.required = true
    dobInput.required = false
    emailInput.required = false
    departmentInput.required = false
    designationInput.required = false
    addressInput.required = false
    // display section
    clerk_NameContainer.style.display = 'none'
    clerk_IdContainer.style.display = ''
    clerk_designationContainer.style.display = 'none'
    clerk_dobContainer.style.display = 'none'
    clerk_emailContainer.style.display = 'none'
    clerk_departmentContainer.style.display = 'none'
    clerk_addressContainer.style.display = 'none'
    // Button section
    addClerk.disabled = true
    deleteClerk.disabled = false
    updateClerk.disabled = true
  } // Check the current color and update elements accordingly
  else if (currentColor === 'rgb(202, 55, 55)') {
    // Update mode
    headingClerk.innerText = 'Update Clerk'
    headingClerk.style.color = 'rgb(0, 128, 0)'
    // Input section
    idInput.placeholder = 'Enter Id To Update Clerk'
    NameInput.required = false
    idInput.required = true
    dobInput.required = false
    emailInput.required = true
    departmentInput.required = true
    designationInput.required = true
    addressInput.required = true
    // display section
    clerk_NameContainer.style.display = 'none'
    clerk_IdContainer.style.display = ''
    clerk_designationContainer.style.display = ''
    clerk_dobContainer.style.display = 'none'
    clerk_emailContainer.style.display = ''
    clerk_departmentContainer.style.display = ''
    clerk_addressContainer.style.display = ''
    // Button Section
    addClerk.disabled = true
    deleteClerk.disabled = true
    updateClerk.disabled = false
  }else {
    // Add mode
    headingClerk.innerText = 'Add Clerk'
    headingClerk.style.color = 'rgb(33, 37, 41)'
    // Input section
    idInput.placeholder = 'Enter Clerk Id'
    NameInput.required = true
    idInput.required = true
    dobInput.required = true
    emailInput.required = true
    departmentInput.required = true
    designationInput.required = true
    addressInput.required = true
    // display section
    clerk_NameContainer.style.display = ''
    clerk_IdContainer.style.display = ''
    clerk_designationContainer.style.display = ''
    clerk_dobContainer.style.display = ''
    clerk_emailContainer.style.display = ''
    clerk_departmentContainer.style.display = ''
    clerk_addressContainer.style.display = ''
    // Button Section
    addClerk.disabled = false
    deleteClerk.disabled = true
    updateClerk.disabled = true
  } })
