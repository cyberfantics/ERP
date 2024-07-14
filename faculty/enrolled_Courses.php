    <h3 class=" text-center">FeedBack Form</h3>
    <div class="row">
        <!--Second-->
        <div class="cols-4  ml-4 my-1">
            <table class="table">
                <thead>
                    <tr class="text-blue">
                        <th colspan="4" class="text-center">FeedBack About Course</th>
                    </tr>
                    <tr class="bg-green">
                        <th>S.No</th>
                        <th>Registered Course</th>
                        <th>Instructor Name</th>
                        <th>FeedBack Form</th>
                    </tr>
                </thead>
                <tbody><?php
require_once 's_feedback_course.php';?> </tbody>
            </table>
        </div>
        <div class="cols-4 my-1 ml-4">
            <table class="table">
                <thead>
                    <tr class="text-blue">
                        <th colspan="4" class="text-center">FeedBack About Students </th>
                    </tr>
                    <tr class="bg-green">
                        <th>S.No</th>
                        <th>Registered Course</th>
                        <th>Instructor Name</th>
                        <th>FeedBack Form</th>
                    </tr>
                </thead>
                <tbody><?php
include_once 's_feedback_student.php';
?> </tbody>
            </table>
        </div>
    </div>
    <script>
const feedbackFromStudent = (teacherId, courseId) => {
    $.ajax({
        type: 'POST',
        url: "feedbackAjax.php",
        data: "teacherId=" + teacherId + "&courseId=" + courseId,
        success: function(responce) {
            if (responce == "set") {
                location.assign('index.php?courseFeedback');
            }
        }
    })
}
    </script>