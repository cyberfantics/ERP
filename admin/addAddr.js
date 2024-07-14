var headingAddr = document.getElementById('headingAddr')
var stateDiv = document.getElementById('stateDiv')
var stateSelect = document.getElementById('stateSelect')
var distDiv = document.getElementById('distDiv')
var districtSelect = document.getElementById('districtSelect')
var dummyDiv = document.getElementById('dummyDiv')
var address = document.getElementById('address')
var addAddressBtn = document.getElementById('addAddressBtn')
var updateAddressBtn = document.getElementById('updateAddressBtn')
const stateNameInput = document.querySelector('select[name="state"]')
const districtNameInput = document.querySelector('select[name="dictrict"]')
var deleteAddressBtn = document.getElementById('deleteAddressBtn')
const addressInput = document.querySelector('input[name="address"]')
// Disable all buttons initially
addAddressBtn.disabled = false
deleteAddressBtn.disabled = true
updateAddressBtn.disabled = true
// Add click event listener to heading element
headingAddr.addEventListener('click', function () {
  // Get the current color of the heading element
  var currentColor = window.getComputedStyle(headingAddr).getPropertyValue('color')
  // Check the current color and update elements accordingly
  if (currentColor === 'rgb(33, 37, 41)') {
    // Delete mode
    headingAddr.innerText = 'Delete Address'
    headingAddr.style.color = 'rgb(202, 55, 55)'
    addressInput.placeholder = 'Enter Id To Delete Address'
    stateNameInput.required = false
    addressInput.required = true
    addressInput.type = 'number'
    addAddressBtn.disabled = true
    updateAddressBtn.disabled = true
    deleteAddressBtn.disabled = false
    stateDiv.style.display = 'none'
    distDiv.style.display = 'none'
    districtNameInput.required = false
    dummyDiv.style.display = ''
  } // Check the current color and update elements accordingly
  else if (currentColor === 'rgb(0, 128, 0)') {
    // Add mode
    headingAddr.style.color = 'rgb(33, 37, 41)'
    headingAddr.innerText = 'Add Address'
    addressInput.placeholder = 'Address'
    addressInput.required = false
    stateDiv.style.display = ''
    distDiv.style.display = ''
    addAddressBtn.disabled = false
    updateAddressBtn.disabled = true
  }else {
    // Update mode
    headingAddr.innerText = 'Update Address'
    headingAddr.style.color = 'rgb(0, 128, 0)'
    addressInput.placeholder = 'Please go and change state and district'
    deleteAddressBtn.disabled = true
    stateDiv.style.display = 'none'
    distDiv.style.display = 'none'
    dummyDiv.style.display = ''
    addressInput.type = 'text'
    stateNameInput.required = true
  }
})
