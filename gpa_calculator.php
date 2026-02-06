<?php
session_start();
// Initialize courses array in session if not already set
if (!isset($_SESSION['courses'])) {
    $_SESSION['courses'] = [];
}

function grade_to_points($grade) {
    $grade = strtoupper($grade);
    // Associative array mapping grades to points
    $grade_points = [
        'A' => 4.0,
        'B' => 3.0,
        'C' => 2.0,
        'D' => 1.0,
        'F' => 0.0
    ];
    return $grade_points[$grade] ?? null; // return null for invalid grades
}
?>