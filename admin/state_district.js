// Get references to the buttons and heading element
const addButton = document.getElementById('add')
const deleteButton = document.getElementById('delete')
const updateButton = document.getElementById('update')
const heading = document.getElementById('headingDist')
const zipInput = document.querySelector('input[name="zip"]')
const distNameInput = document.querySelector('input[name="distName"]')
const distIdInput = document.querySelector('input[name="distId"]')
const distIdContainer = document.getElementById('distId')
const distContainer = document.getElementById('dist')
// Disable all buttons initially
addButton.disabled = false
deleteButton.disabled = true
updateButton.disabled = true
// Add click event listener to heading element
heading.addEventListener('click', function () {
  // Get the current color of the heading element
  var currentColor = window.getComputedStyle(heading).getPropertyValue('color')
  // Check the current color and update elements accordingly
  if (currentColor === 'rgb(202, 55, 55)') {
    // Update mode
    heading.innerText = 'Update District'
    heading.style.color = 'rgb(0, 128, 0)'
    zipInput.placeholder = 'Enter Zip Code To Change District'
    distNameInput.required = true
    addButton.disabled = true
    deleteButton.disabled = true
    updateButton.disabled = false
    distContainer.style.display = ''
    distIdContainer.style.display = 'none'
  } else if (currentColor === 'rgb(33, 37, 41)') {
    // Delete mode
    heading.innerText = 'Delete District'
    heading.style.color = 'rgb(202, 55, 55)'
    zipInput.placeholder = 'Enter Zip Code To Delete District'
    distNameInput.required = false
    distIdInput.required = false
    addButton.disabled = true
    updateButton.disabled = true
    deleteButton.disabled = false
    distContainer.style.display = 'none'
    distIdContainer.style.display = 'none'
  } else {
    // Add mode
    heading.innerText = 'Add District'
    heading.style.color = 'rgb(33, 37, 41)'
    distIdInput.required = true
    zipInput.placeholder = 'Enter Zip Code'
    addButton.disabled = false
    deleteButton.disabled = true
    updateButton.disabled = true
    distContainer.style.display = ''
    distIdContainer.style.display = ''
  }
})
// <!--Script To Delete And Update District-->
// Get references to the buttons and heading element
const addState = document.getElementById('addState')
const deleteState = document.getElementById('deleteState')
const updateState = document.getElementById('updateState')
const headingState = document.getElementById('headingState')
const stateNameInput = document.querySelector('input[name="stateName"]')
const stateIdInput = document.querySelector('input[name="stateId"]')
const stateNameContainer = document.getElementById('stateName')
// Disable all buttons initially
addState.disabled = false
deleteState.disabled = true
updateState.disabled = true
// Add click event listener to heading element
headingState.addEventListener('click', function () {
  // Get the current color of the heading element
  var currentColor = window.getComputedStyle(headingState).getPropertyValue('color')
  // Check the current color and update elements accordingly
  if (currentColor === 'rgb(202, 55, 55)') {
    // Update mode
    stateNameContainer.style.display = ''
    headingState.innerText = 'Update State'
    headingState.style.color = 'rgb(0, 128, 0)'
    stateIdInput.placeholder = 'Enter Id To Update State'
    stateNameInput.placeholder = 'Enter Updated State Name'
    stateNameInput.required = true
    stateIdInput.required = true
    addState.disabled = true
    deleteState.disabled = true
    updateState.disabled = false
  } else if (currentColor === 'rgb(33, 37, 41)') {
    // Delete mode
    headingState.innerText = 'Delete State'
    headingState.style.color = 'rgb(202, 55, 55)'
    stateIdInput.placeholder = 'Enter Id To Delete State'
    stateNameInput.required = false
    stateIdInput.required = true
    addState.disabled = true
    updateState.disabled = true
    deleteState.disabled = false
    stateNameContainer.style.display = 'none'
  } else {
    // Add mode
    headingState.innerText = 'Add State'
    headingState.style.color = 'rgb(33, 37, 41)'
    stateIdInput.required = true
    stateIdInput.placeholder = 'State Id'
    stateIdInput.placeholder = 'State/Country Name'
    addState.disabled = false
    deleteState.disabled = true
    updateState.disabled = true
  }
})
