 <div class="row">
     <div class="col-4 mb-1  py-2">
         <h3 class="text-center">Add Course</h3>
         <form method="POST">
             <div class="input-group mb-2">
                 <div class="input-group-append">
                     <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                 </div><input class="form-control  text-black input_pass" name="courseCode" type="text" required
                     placeholder='Enter Course Code' />
                 <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
             </div>
             <div class="input-group mb-2">
                 <div class="input-group-append">
                     <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                 </div><input class="form-control  text-black input_pass" name="courseName" type="text" required
                     placeholder='Enter Course Name' />
                 <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
             </div>
             <div class="input-group mb-2">
                 <div class="input-group-append">
                     <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
                 </div><input class="form-control  text-black input_pass" name="creditHour" type="number" required
                     placeholder='Enter Credit Hours' />
                 <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
             </div>
             <div class="mt-2"> <button type="submit" name="addCourse" class="btn bg-blue text-white ">Add
                     Course</button>
             </div>
         </form>
     </div>