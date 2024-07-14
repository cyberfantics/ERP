CREATE TABLE Department(
    dept_id INT  PRIMARY KEY,
    dept_Name VARCHAR(45) NOT NULL
); CREATE TABLE UserLoginType(
    id INT  PRIMARY KEY,
    NAME VARCHAR(20) NOT NULL
); CREATE TABLE state(
    id INT PRIMARY KEY ,
    state VARCHAR(24) NOT NULL
); CREATE TABLE district(
    id INT UNIQUE,
    district VARCHAR(40) NOT NULL,
    zipCode INT PRIMARY KEY
); CREATE TABLE Address(
    id INT ,
    stateid INT,
    districtId INT,
    PRIMARY KEY(id, stateid, districtId),
    FOREIGN KEY(stateid) REFERENCES state(id),
    FOREIGN KEY(districtId) REFERENCES district(zipCode)
); CREATE TABLE teacher(
    teacherId VARCHAR(20) PRIMARY KEY,
    NAME VARCHAR(50) NOT NULL,
    Designation VARCHAR(40) NOT NULL,
    DOB DATE NOT NULL,
    email VARCHAR(55) NOT NULL,
    Address INT,
    department INT,
    FOREIGN KEY(Address) REFERENCES Address(id),
    FOREIGN KEY(department) REFERENCES Department(dept_id)
); CREATE TABLE student(
    NAME VARCHAR(50) NOT NULL,
    FatherName VARCHAR(50) NOT NULL,
    DOB DATE NOT NULL,
    email VARCHAR(55) NOT NULL,
    Address INT,
    studentDept INT,
    registration VARCHAR(20) NOT NULL PRIMARY KEY,
    FOREIGN KEY(Address) REFERENCES Address(id),
    FOREIGN KEY(studentDept) REFERENCES Department(dept_id)
); CREATE TABLE courses(
    courseId VARCHAR(10) PRIMARY KEY,
    courseName VARCHAR(50) NOT NULL,
    creditHours INT
); CREATE TABLE semester(
    semester INT PRIMARY KEY,
    semester_duration INT
); CREATE TABLE registeredCourse(
    std_id VARCHAR(20),
    teacherId VARCHAR(20),
    courseId VARCHAR(10),
    semester INT,
    PRIMARY KEY(
        std_id,
        teacherId,
        courseId,
        semester
    ),
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId),
    FOREIGN KEY(std_id) REFERENCES student(registration),
    FOREIGN KEY(semester) REFERENCES semester(semester)
); CREATE TABLE s_feedback_course(
    teacherId VARCHAR(20),
    std_id VARCHAR(20),
    courseId VARCHAR(10),
    OverallExperience VARCHAR(23),
    Course_pace VARCHAR(5),
    Meeting_expectations VARCHAR(5),
    Relevance VARCHAR(20),
    Struggles VARCHAR(70),
    Teaching_quality INT,
    Support TEXT,
    Effectiveness_of_course VARCHAR(5),
    Effectiveness_of_assignments VARCHAR(5),
    Recommendation TEXT,
    PRIMARY KEY(std_id, courseId, teacherId),
    FOREIGN KEY(std_id) REFERENCES student(registration),
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId),
    Feedback_date DATE
); CREATE TABLE s_feedback_teacher(
    Teaching_Effectiveness INT,
    Communication_with_Students INT,
    Understanding_of_Material VARCHAR(13),
    Availability_for_Help VARCHAR(70),
    Promotion_of_Critical_Thinking INT,
    Accommodation INT,
    Management_of_Time VARCHAR(150),
    Use_of_Technology VARCHAR(150),
    Fostering_of_Positive_Environment VARCHAR(15),
    Recommendation_to_Other_Students TEXT,
    Feedback_date DATE,
    teacherId VARCHAR(20),
    std_id VARCHAR(20),
    courseId VARCHAR(10),
    PRIMARY KEY(std_id, courseId, teacherId),
    FOREIGN KEY(std_id) REFERENCES student(registration),
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId)
); CREATE TABLE courseResult(
    std_id VARCHAR(20),
    teacherId VARCHAR(20),
    courseId VARCHAR(10),
    semester INT,
    courseRegister INT  PRIMARY KEY,
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId),
    FOREIGN KEY(std_id) REFERENCES student(registration),
    FOREIGN KEY(semester) REFERENCES semester(semester)
); CREATE TABLE clerk(
    clerkId VARCHAR(20) PRIMARY KEY,
    NAME VARCHAR(50) NOT NULL,
    Designation VARCHAR(40) NOT NULL,
    DOB DATE NOT NULL,
    email VARCHAR(55) NOT NULL,
    Address INT,
    department INT,
    FOREIGN KEY(Address) REFERENCES Address(id),
    FOREIGN KEY(department) REFERENCES Department(dept_id)
); CREATE TABLE midTermResult(
    totalMarks INT,
    obtainedMarks INT,
    tAssignmentMarks INT,
    oAssignmentMarks INT,
    tQuizMarks INT,
    oQuizMarks INT,
    courseRegister INT PRIMARY KEY,
    FOREIGN KEY(courseRegister) REFERENCES courseResult(courseRegister)
); CREATE TABLE terminalResult(
    totalMarks INT,
    obtainedMarks INT,
    tAssignmentMarks INT,
    oAssignmentMarks INT,
    tQuizMarks INT,
    oQuizMarks INT,
    courseRegister INT PRIMARY KEY,
    FOREIGN KEY(courseRegister) REFERENCES courseResult(courseRegister)
); CREATE TABLE semesterResult(
    midTerm INT,
    terminal INT,
    Percentage INT,
    totalMarks INT,
    obtainedMarks INT,
    GPA REAL,
    GRADE CHAR(2),
    PRIMARY KEY(midTerm, terminal),
    FOREIGN KEY(midTerm) REFERENCES terminalResult(courseRegister),
    FOREIGN KEY(midTerm) REFERENCES midTermResult(courseRegister)
); CREATE TABLE login(
    UserName VARCHAR(20) NOT NULL,
    PASSWORD TEXT,
    department INT,
    usertype INT,
    FOREIGN KEY(department) REFERENCES Department(dept_id),
    FOREIGN KEY(usertype) REFERENCES UserLoginType(id),
    PRIMARY KEY(UserName, department, usertype)
); CREATE TABLE Assignment(
    assignmentNumber INT,
    totalMarks INT,
    semester INT,
    courseId VARCHAR(10),
    assignedDate DATE,
    expiredDate DATE,
    teacherId VARCHAR(20),
    Assignment TEXT,
    PRIMARY KEY(semester, courseId, teacherId),
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId),
    FOREIGN KEY(semester) REFERENCES semester(semester)
); CREATE TABLE teacher_feedback_aboutStudent(
    enrolledStudents INT,
    attendence_rate INT,
    displinary_action INT,
    assignment_time INT,
    struggling INT,
    dropStudent INT,
    absentStudent INT,
    extraActivity INT,
    achivedOutStanding INT,
    aditionalAcademicSupport INT,
    teacherId VARCHAR(20),
    courseId VARCHAR(10),
    PRIMARY KEY(courseId, teacherId),
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId)
); CREATE TABLE teacher_feedback_aboutCourse(
    offeredCourse INT,
    enroledStudents INT,
    passRate INT,
    assignmentAssesment INT,
    coursePostpend INT,
    attendenceRate INT,
    modifiedCourse INT,
    changeCourse INT,
    onlineCourse INT,
    feedbackCourse INT,
    teacherId VARCHAR(20),
    courseId VARCHAR(10),
    PRIMARY KEY(courseId, teacherId),
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId)
); CREATE TABLE studentFeedbackReport(
    teacherId VARCHAR(20),
    courseId VARCHAR(20),
    feedbackRate INT,
    PRIMARY KEY(teacherId, courseId),
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId)
);CREATE TABLE teachersFeedbackReport(
    teacherId VARCHAR(20),
    courseId VARCHAR(20),
    feedbackRate INT,
    PRIMARY KEY(teacherId, courseId),
    FOREIGN KEY(courseId) REFERENCES courses(courseId),
    FOREIGN KEY(teacherId) REFERENCES teacher(teacherId)
); CREATE VIEW feedbackRecord AS SELECT
    s.teacherId,
    s.courseId,
    OverallExperience,
    Course_pace,
    Meeting_expectations,
    Relevance,
    Struggles,
    Teaching_quality,
    Support,
    Effectiveness_of_course,
    Effectiveness_of_assignments,
    Recommendation,
    Teaching_Effectiveness,
    Communication_with_Students,
    Understanding_of_Material,
    Availability_for_Help,
    Promotion_of_Critical_Thinking,
    Accommodation,
    Management_of_Time,
    Use_of_Technology,
    Fostering_of_Positive_Environment,
    Recommendation_to_Other_Students
FROM
    s_feedback_course s
INNER JOIN s_feedback_teacher t ON
    s.std_id = t.std_id AND s.teacherId = t.teacherId AND s.courseId = t.courseId;
CREATE VIEW teacherFeedback AS 
SELECT ts.teacherId, ts.courseId, 
    enrolledStudents, attendence_rate, displinary_action, assignment_time, struggling, 
    dropStudent, absentStudent, extraActivity, achivedOutStanding, aditionalAcademicSupport, 
    offeredCourse, enroledStudents, passRate, assignmentAssesment, coursePostpend, 
    attendenceRate AS courseAttendenceRate, modifiedCourse, changeCourse, onlineCourse, feedbackCourse 
FROM teacher_feedback_aboutStudent ts 
JOIN teacher_feedback_aboutCourse tc 
    ON ts.teacherId = tc.teacherId AND ts.courseId = tc.courseId;

-->Important Insert Commands To Insert Run Website--
INSERT INTO state(id, state)
VALUES(1, "Kashmir");
INSERT INTO district(id, district, zipCode)
VALUES(1, "Muzafarabad", 432);
INSERT INTO address(id, stateId, districtId)
VALUES(1, 1, 432);
INSERT INTO department(dept_id, dept_Name)
VALUES(1, "CS&IT");
INSERT INTO teacher(
    teacherId,
    NAME,
    Designation,
    DOB,
    email,
    address,
    department
)
VALUES(
    "admin",
    "Admin",
    "Admin",
    "20,23,2023",
    "admin@gmail.com",
    1,
    1
);
INSERT INTO Userlogintype(id, NAME)
VALUES(1, "Admin");
INSERT INTO login(UserName, PASSWORD, usertype,department)
VALUES("admin", "admin", 1,1)
