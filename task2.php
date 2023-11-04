// Create a class hierarchy to model a university system with students, teachers, and courses. Implement the following features:

// Create a Person class with properties for a person's name, age, and ID. The class should have a static variable to keep track of the total number of persons created.

// Create a Student class that extends the Person class. The Student class should have properties for the student's student ID and an array to store the courses they are enrolled in. Implement a method to enroll a student in a course.

// Create a Teacher class that also extends the Person class. The Teacher class should have properties for the teacher's employee ID and an array to store the courses they are teaching. Implement a method to assign a teacher to a course.

// Create a Course class with properties for the course code, course name, and maximum capacity. Implement a method to add a student to the course and a method to assign a teacher to the course.

// Implement a static function in the Person class to get the total number of persons created.

// Create instances of students, teachers, and courses to demonstrate the functionality. Enroll students in courses, assign teachers to courses, and display information about students, teachers, and courses.

// Remember to use the parent keyword to access properties and methods from the parent class where necessary.

// Your code should demonstrate the class hierarchy and the interaction between students, teachers, and courses.

<?php
class Person {
    public $name;
    public $age;
    public $id;
    public static $totalPersons = 0;

    public function __construct($name, $age, $id) {
        $this->name = $name;
        $this->age = $age;
        $this->id = $id;
        self::$totalPersons++;
    }
}

class Student extends Person {
    public $studentId;
    public $enrolledCourses = [];

    public function enrollInCourse($course) {
        if (count($this->enrolledCourses) < 3) {
            $this->enrolledCourses[] = $course;
            $course->addStudent($this);
        } else {
            echo "{$this->name} is already enrolled in the maximum number of courses.\n";
        }
    }
}

class Teacher extends Person {
    public $employeeId;
    public $coursesTeaching = [];

    public function assignToCourse($course) {
        $this->coursesTeaching[] = $course;
        $course->assignTeacher($this);
    }
}

class Course {
    public $courseCode;
    public $courseName;
    public $maxCapacity;
    public $students = [];
    public $teacher;

    public function __construct($courseCode, $courseName, $maxCapacity) {
        $this->courseCode = $courseCode;
        $this->courseName = $courseName;
        $this->maxCapacity = $maxCapacity;
    }

    public function addStudent($student) {
        if (count($this->students) < $this->maxCapacity) {
            $this->students[] = $student;
        } else {
            echo "The course is full. {$student->name} cannot be added.\n";
        }
    }

    public function assignTeacher($teacher) {
        $this->teacher = $teacher;
    }

    public function showCourseInfo() {
        echo "Course Code: {$this->courseCode}\n";
        echo "Course Name: {$this->courseName}\n";
        echo "Teacher: {$this->teacher->name}\n";
        echo "Enrolled Students:\n";
        foreach ($this->students as $student) {
            echo "- {$student->name}\n";
        }
    }
}

// Create Persons (Students and Teachers)
$student1 = new Student("John Doe", 20, "S001");
$student2 = new Student("Alice Smith", 22, "S002");
$teacher1 = new Teacher("Dr. Smith", 40, "T001");
$teacher2 = new Teacher("Prof. Johnson", 35, "T002");

// Create Courses
$course1 = new Course("C101", "Mathematics", 10);
$course2 = new Course("C102", "History", 15);

// Enroll Students in Courses
$student1->enrollInCourse($course1);
$student1->enrollInCourse($course2);
$student2->enrollInCourse($course1);

// Assign Teachers to Courses
$teacher1->assignToCourse($course1);
$teacher2->assignToCourse($course2);

// Display Course Information
$course1->showCourseInfo();
$course2->showCourseInfo();


// Display the total number of persons created
echo "Total Persons: " . Person::$totalPersons . "\n";

?>
