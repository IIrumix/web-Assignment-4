<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_index = $_POST["delete_id"] ?? "no index";

    array_splice($_SESSION['courses_list'],$course_index,1);

    header("Location: manage_courses.php");
    exit();
}

?>