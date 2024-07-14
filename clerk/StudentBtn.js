const Student_IdContainer = document.getElementById('StudentRegistration')
const Student_NameContainer = document.getElementById('StudentName')
const Student_designationContainer = document.getElementById('FatherName')
const Student_dobContainer = document.getElementById('dob')
const Student_emailContainer = document.getElementById('email')
const Student_addressContainer = document.getElementById('address')
const Student_departmentContainer = document.getElementById('department')
const addStudent = document.getElementById('AddStudent')
const deleteStudent = document.getElementById('deleteStudent')
const updateStudent = document.getElementById('updateStudent')
const headingStudent = document.getElementById('headingStudent')
const StudentRegistration = document.querySelector('input[name="StudentRegistration"]')
const NameInput = document.querySelector('input[name="StudentName"]')
const FatherName = document.querySelector('input[name="FatherName"]')
const dobInput = document.querySelector('input[name="dob"]')
const emailInput = document.querySelector('input[name="email"]')
const addressInput = document.querySelector('select[name="address"]')
const departmentInput = document.querySelector('select[name="department"]')

// Disable all buttons initially
addStudent.disabled = false
deleteStudent.disabled = true
updateStudent.disabled = true
// Add click event listener to heading element
headingStudent.addEventListener('click', function () {
  // Get the current color of the headingStudent element
  var currentColor = window.getComputedStyle(headingStudent).getPropertyValue('color')
  if (currentColor === 'rgb(33, 37, 41)') {
    // Delete mode
    headingStudent.innerText = 'Delete Student'
    headingStudent.style.color = 'rgb(202, 55, 55)'
    StudentRegistration.placeholder = 'Enter Id To Delete Student'
    NameInput.required = false
    StudentRegistration.required = true
    dobInput.required = false
    emailInput.required = false
    departmentInput.required = false
    FatherName.required = false
    addressInput.required = false
    // display section
    Student_NameContainer.style.display = 'none'
    Student_IdContainer.style.display = ''
    Student_designationContainer.style.display = 'none'
    Student_dobContainer.style.display = 'none'
    Student_emailContainer.style.display = 'none'
    Student_departmentContainer.style.display = 'none'
    Student_addressContainer.style.display = 'none'
    // Button section
    addStudent.disabled = true
    deleteStudent.disabled = false
    updateStudent.disabled = true
  } // Check the current color and update elements accordingly
  else if (currentColor === 'rgb(202, 55, 55)') {
    // Update mode
    headingStudent.innerText = 'Update Student'
    headingStudent.style.color = 'rgb(0, 128, 0)'
    // Input section
    StudentRegistration.placeholder = 'Enter Id To Update Student'
    NameInput.required = true
    StudentRegistration.required = true
    dobInput.required = false
    emailInput.required = true
    departmentInput.required = true
    FatherName.required = true
    addressInput.required = true
    // display section
    Student_NameContainer.style.display = ''
    Student_IdContainer.style.display = ''
    Student_designationContainer.style.display = ''
    Student_dobContainer.style.display = 'none'
    Student_emailContainer.style.display = ''
    Student_departmentContainer.style.display = ''
    Student_addressContainer.style.display = ''
    // Button Section
    addStudent.disabled = true
    deleteStudent.disabled = true
    updateStudent.disabled = false
  }else {
    // Add mode
    headingStudent.innerText = 'Add Student'
    headingStudent.style.color = 'rgb(33, 37, 41)'
    // Input section
    StudentRegistration.placeholder = 'Student Regietration'
    NameInput.required = true
    StudentRegistration.required = true
    dobInput.required = true
    emailInput.required = true
    departmentInput.required = true
    FatherName.required = true
    addressInput.required = true
    // display section
    Student_NameContainer.style.display = ''
    Student_IdContainer.style.display = ''
    Student_designationContainer.style.display = ''
    Student_dobContainer.style.display = ''
    Student_emailContainer.style.display = ''
    Student_departmentContainer.style.display = ''
    Student_addressContainer.style.display = ''
    // Button Section
    addStudent.disabled = false
    deleteStudent.disabled = true
    updateStudent.disabled = true
  } })
