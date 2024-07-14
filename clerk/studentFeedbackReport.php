<?php
//Is file main hm hr chz ko points da daien ga,
//Or ahr main obtain marks ko total marks sa divide kr daien ga
//Or rating mil jay gi
if (isset($_POST['addStudentFeedback'])) {
    $teacher = $_POST['teacher'];
    $course = $_POST['course'];

    $fetchData = mysqli_query($db, 'SELECT
AVG(
        CASE OverallExperience WHEN "excellent" THEN 5 WHEN "super" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "bad" THEN 2 WHEN "yes" THEN 5 WHEN "very bad" THEN 1 WHEN "no" THEN 1 ELSE 0
    END
) AS AvgOverallExperience,
AVG(
    CASE Course_pace WHEN "super" THEN 5 WHEN "excellent" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "yes" THEN 5 WHEN "bad" THEN 2 WHEN "no" THEN 1 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgCoursePace,
AVG(
    CASE Meeting_expectations WHEN "excellent" THEN 5 WHEN "yes" THEN 5 WHEN "super" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "bad" THEN 2 WHEN "very bad" THEN 1 WHEN "no" THEN 1 ELSE 0
END
) AS AvgMeetingExpectations,
AVG(
    CASE Relevance WHEN "excellent" THEN 5 WHEN "super" THEN 5 WHEN "best" THEN 4 WHEN "yes" THEN 5 WHEN "good" THEN 3 WHEN "bad" THEN 2 WHEN "very bad" THEN 1 WHEN "no" THEN 1 ELSE 0
END
) AS AvgRelevance,
AVG(
    CASE Struggles WHEN "yes" THEN 5 WHEN "excellent" THEN 5 WHEN "super" THEN 5 WHEN "no" THEN 1 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "bad" THEN 2 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgStruggles,
AVG(
    CASE Teaching_quality WHEN 5 THEN 5 WHEN 4 THEN 4 WHEN 3 THEN 3 WHEN 2 THEN 2 WHEN "no" THEN 1 WHEN 1 THEN 1 ELSE 0
END
) AS AvgTeachingQuality,
AVG(
    CASE Support WHEN "yes" THEN 5 WHEN "excellent" THEN 5 WHEN "best" THEN 4 WHEN "no" THEN 1 WHEN "super" THEN 5 WHEN "good" THEN 3 WHEN "bad" THEN 2 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgSupport,
AVG(
    CASE Effectiveness_of_course WHEN "yes" THEN 5 WHEN "excellent" THEN 5 WHEN "super" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "bad" THEN 2 WHEN "very bad" THEN 1 WHEN "no" THEN 1 ELSE 0
END
) AS AvgEffectivenessOfCourse,
AVG(
    CASE Effectiveness_of_assignments WHEN "excellent" THEN 5 WHEN "best" THEN 4 WHEN "super" THEN 5 WHEN "good" THEN 3 WHEN "bad" THEN 2 WHEN "yes" THEN 5 WHEN "very bad" THEN 1 WHEN "no" THEN 1 WHEN "no" THEN 1 ELSE 0
END
) AS AvgEffectivenessOfAssignments,
AVG(
    CASE Recommendation WHEN "super" THEN 5 WHEN "yes" THEN 5 WHEN "no" THEN 1 ELSE 0
END
) AS AvgRecommendation,
AVG(
    CASE Teaching_Effectiveness WHEN 5 THEN 5 WHEN 4 THEN 4 WHEN 3 THEN 3 WHEN 2 THEN 2 WHEN "no" THEN 1 WHEN 1 THEN 1 ELSE 0
END
) AS AvgTeachingEffectiveness,
AVG(
    CASE Communication_with_Students WHEN 5 THEN 5 WHEN 4 THEN 4 WHEN 3 THEN 3 WHEN 2 THEN 2 WHEN "no" THEN 1 WHEN 1 THEN 1 ELSE 0
END
) AS AvgCommunicationWithStudents,
AVG(
    CASE Understanding_of_Material WHEN "excellent" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "yes" THEN 5 WHEN "super" THEN 5 WHEN "no" THEN 1 WHEN "bad" THEN 2 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgUnderstandingOfMaterial,
AVG(
    CASE Availability_for_Help WHEN "excellent" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "yes" THEN 5 WHEN "no" THEN 1 WHEN "super" THEN 5 WHEN "bad" THEN 2 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgAvailabilityForHelp,
AVG(
    CASE Promotion_of_Critical_Thinking WHEN 5 THEN 5 WHEN 4 THEN 4 WHEN 3 THEN 3 WHEN 2 THEN 2 WHEN "no" THEN 1 WHEN 1 THEN 1 ELSE 0
END
) AS AvgPromotionOfCriticalThinking,
AVG(
    CASE Accommodation WHEN 5 THEN 5 WHEN 4 THEN 4 WHEN 3 THEN 3 WHEN 2 THEN 2 WHEN "no" THEN 1 WHEN 1 THEN 1 WHEN "excellent" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "yes" THEN 5 WHEN "bad" THEN 2 WHEN "no" THEN 1 WHEN "super" THEN 5 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgAccommodation,
AVG(
    CASE Management_of_Time WHEN "yes" THEN 5 WHEN "excellent" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "super" THEN 5 WHEN "bad" THEN 2 WHEN "no" THEN 1 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgManagementOfTime,
AVG(
    CASE Use_of_Technology WHEN "yes" THEN 5 WHEN "excellent" THEN 5 WHEN "super" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "no" THEN 1 WHEN "bad" THEN 2 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgUseOfTechnology,
AVG(
    CASE Fostering_of_Positive_Environment WHEN "excellent" THEN 5 WHEN "yes" THEN 5 WHEN "super" THEN 5 WHEN "best" THEN 4 WHEN "good" THEN 3 WHEN "bad" THEN 2 WHEN "no" THEN 1 WHEN "very bad" THEN 1 ELSE 0
END
) AS AvgFosteringOfPositiveEnvironment,
AVG(
    CASE Recommendation_to_Other_Students WHEN "super" THEN 5 WHEN "yes" THEN 5 WHEN "no" THEN 1 ELSE 0
END
) AS AvgRecommendationToOtherStudents
FROM
    feedbackRecord where teacherId="' . $teacher . '" AND courseId="' . $course . '"') or die(mysqli_error($db));
//total column in table
    $columns = mysqli_query($db, 'SELECT COUNT(*) FROM information_schema.columns WHERE TABLE_NAME="feedbackrecord"');
    $totalMarks = mysqli_fetch_array($columns);
    $totalMarks = $totalMarks[0] - 2;
    $obtainMarks = 0;
    $column = 0;
    $row = mysqli_num_rows($fetchData);
    $data = mysqli_fetch_assoc($fetchData);
    $values = array_values(($data));
    $obtainMarks = 0; // Initialize the variable
    while ($column < $totalMarks) {
        $obtainMarks += $values[$column];
        $column++;
    }
    $rating = round($totalMarks / $obtainMarks * 100);
    $insert = mysqli_query($db, 'INSERT INTO studentFeedbackReport(`teacherId`,`courseId`,`feedbackRate`) VALUES ("' . $teacher . '","' . $course . '","' . $rating . '")');
    if ($insert) {
        ?> <script>
location.assign('manageRecord&success');
</script><?php
} else {
        ?> <script>
location.assign('manageRecord&unsuccess');
</script><?php
}
} else {

//here display that no feedback is added for any student yet
}