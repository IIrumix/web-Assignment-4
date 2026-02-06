<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST["course_name"] ?? "no name";
    $course_credit = $_POST["course_credit"] ?? "no credit";

    echo $course_name;
    echo $course_credit;

    array_push($_SESSION['courses_list'],[
        'name' => $course_name,
        'credits' => $course_credit
    ]);


    header("Location: manage_courses.php");
    exit();
}
?>