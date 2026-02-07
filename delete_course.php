<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_index = $_POST["delete_id"] ?? "no index";

    $course_name = $_SESSION['courses_list'][$course_index]['name'];
    $checker = array_column($_SESSION['courses'], 'name');

    if (!in_array($course_name,$checker)){
        array_splice($_SESSION['courses_list'],$course_index,1);
    }else {
        $_SESSION['error'] = "ไม่สามารถลบได้ เนื่องจากวิชานี้ถูกบันทึกเกรดไปแล้ว";
    }
    

    header("Location: manage_courses.php");
    exit();
}

?>