    <div class="row">
        <!--Subject Results-->
        <div class="cols-8 ml-4 my-1">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="9" class="text-center">Result Card</th>
                    </tr>
                    <tr>
                        <th>Subject</th>
                        <th>Semester</th>
                        <th>Credit Hours</th>
                        <th>Obtained Marks</th>
                        <th>Percentage</th>
                        <th>GPA</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody><?php
include_once 'subject_result.php';?> </tbody>
            </table>
        </div>
        <!--Section for overall result-->
        <div class="cols-4 ml-4 my-1">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center">OverAll Report</th>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <th>Grade</th>
                        <th>Percentage </th>
                        <th>GPA</th>
                    </tr>
                </thead>
                <tbody><?php
//First we fetch semesters
include_once 'complete_result.php';
?> </tbody>
            </table>
        </div>
    </div>