  <div class="col-6 mb-3  py-2">
      <h3 class="text-center text-yellow">FeedBack About Teacher</h3>
      <form method="POST" enctype="multipart/form-data">
          <div class="input-group mb-2">
              <div class="input-group-append">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><select id="student" required name="Teaching_Effectiveness"
                  class="form-control bg-white text-black">
                  <!--Options to add candidate, first value is empty-->
                  <option value="">How would you rate your teacher's teaching effectiveness? </option>
                  <option value=5>5</option>
                  <option value=4>4</option>
                  <option value=3>3</option>
                  <option value=2>2</option>
                  <option value=1>1</option>
              </select>
          </div>
          <div class="input-group mb-2">
              <div class="input-group-append">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><select id="name" required name="Communication_with_Students"
                  class="form-control bg-white text-black">
                  <!--Options to add candidate, first value is empty-->
                  <option value="">How well does the teacher communicate and engage with students?</option>
                  <option value=5>5</option>
                  <option value=4>4</option>
                  <option value=3>3</option>
                  <option value=2>2</option>
                  <option value=1>1</option>
              </select>
          </div>
          <div class="input-group mb-2">
              <div class="input-group-append">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><select id="name" required name="Understanding_of_Material"
                  class="form-control bg-white text-black">
                  <!--Options to add candidate, first value is empty-->
                  <option value="">How well does the teacher help you understand the material?</option>
                  <option value="Excellent">Excellent</option>
                  <option value="Super">Super</option>
                  <option value="Good">Good</option>
                  <option value="Bad">Bad</option>
                  <option value="Very Bad">Very Bad</option>
              </select>
          </div>
          <div class="input-group mb-2">
              <div class="input-group-append text-red">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><input class="form-control  text-black input_pass" name="Availability_for_Help" type="text" required
                  placeholder='Is the teacher available outside of class for help and support?' />
          </div>
          <div class=" input-group mb-2">
              <div class="input-group-append">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><select id="name" required name="Promotion_of_Critical_Thinking"
                  class="form-control bg-white text-black">
                  <!--Options to add candidate, first value is empty-->
                  <option value=""> How well does the teacher promote critical thinking and problem-solving skills?
                  </option>
                  <option value=5>5</option>
                  <option value=4>4</option>
                  <option value=3>3</option>
                  <option value=2>2</option>
                  <option value=1>1</option>
              </select>
          </div>
          <div class="input-group mb-2">
              <div class="input-group-append"><span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><select id="name" required name="Accommodation" class="form-control bg-white text-black">
                  <!--Options to add candidate, first value is empty-->
                  <option value=""> How well does the teacher accommodate different learning styles in the class?
                  </option>
                  <option value=5>5</option>
                  <option value=4>4</option>
                  <option value=3>3</option>
                  <option value=2>2</option>
                  <option value=1>1</option>
              </select>
          </div>
          <div class="input-group mb-2">
              <div class="input-group-append text-red">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><input class="form-control  text-black input_pass" name="Management_of_Time" type="text" required
                  placeholder='How well does the teacher manage class time and cover all important topics?' />
          </div>
          <div class="input-group mb-2">
              <div class="input-group-append text-red">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><input class="form-control  text-black input_pass" name="Use_of_Technology" type="text" required
                  placeholder='How well does the teacher use technology and other resources to enhance the learning experience?' />
          </div>
          <div class=" input-group mb-2">
              <div class="input-group-append">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div><select id="name" required name="Fostering_of_Positive_Environment"
                  class="form-control bg-white text-black">
                  <!--Options to add candidate, first value is empty-->
                  <option value="">How well does the teacher foster a positive and inclusive learning environment?
                  </option>
                  <option value="Excellent">Excellent</option>
                  <option value="Super">Super</option>
                  <option value="Good">Good</option>
                  <option value="Bad">Bad</option>
                  <option value="Very Bad">Very Bad</option>
              </select>
          </div>
          <div class="input-group mb-2">
              <div class="input-group-append text-red">
                  <span class="input-group-text bg-blue"><i class="fas fa-key"></i></span>
              </div>
              <textarea class="form-control text-black" name="Recommendation_to_Other_Students" required
                  placeholder='Would you recommend this teacher to other students? ' rows="4"
                  style="width: 90%;"></textarea>
          </div>
          <div class=" mt-3"> <button type="submit" name="teacherFeedBack_submit" class="btn bg-blue text-white ">Submit
                  FeedBack</button> <?php
// Write form is submitted if data is inserted
if (isset($_POST['teacherFeedBack_submit'])) {
    $Teaching_Effectiveness = $_POST['Teaching_Effectiveness'];
    $Promotion_of_Critical_Thinking = $_POST['Promotion_of_Critical_Thinking'];
    $Accommodation = $_POST['Accommodation'];
    $Communication_with_Students = $_POST['Communication_with_Students'];
    $Understanding_of_Material = $_POST['Understanding_of_Material'];
    $Management_of_Time = $_POST['Management_of_Time'];
    $Availability_for_Help = $_POST['Availability_for_Help'];
    $Use_of_Technology = $_POST['Use_of_Technology'];
    $Fostering_of_Positive_Environment = $_POST['Fostering_of_Positive_Environment'];
    $Recommendation_to_Other_Students = $_POST['Recommendation_to_Other_Students'];
    $userId = $_SESSION['std_id'];
    $courseId = $_SESSION['course_id'];
    $teacher_id = $_SESSION['teacher_id'];
    //Insert into database
    $inserted = mysqli_query(
        $db,
        'INSERT INTO s_feedback_teacher
             (`std_id`,`courseId`,`Teaching_Effectiveness`,`Promotion_of_Critical_Thinking`,`Accommodation`,`Communication_with_Students`,`Understanding_of_Material`,`Management_of_Time`,
             `Availability_for_Help`,`Use_of_Technology`,`Fostering_of_Positive_Environment`,`Recommendation_to_Other_Students`,`teacherId`,`Feedback_date`)
                    VALUES("' . $userId . '","' . $courseId . '","' . $Teaching_Effectiveness . '","' . $Promotion_of_Critical_Thinking . '","' . $Accommodation . '",
                    "' . $Communication_with_Students . '", "' . $Understanding_of_Material . '","' . $Management_of_Time . '","' . $Availability_for_Help . '",
                    "' . $Use_of_Technology . '","' . $Fostering_of_Positive_Environment . '","' . $Recommendation_to_Other_Students . '","' . $teacher_id . '","' . date('Y-m-d') . '")'
    );

    if ($inserted) {
        echo "inserted";
    } else {
        echo "Please Come With Valid Refrence";
    }
}
//End
?> </div>
      </form>
  </div>