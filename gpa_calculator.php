<?php
session_start();

function grade_to_points($grade) {
    $grade = strtoupper($grade);
    // Associative array mapping grades to points
    $grade_points = [
        'A' => 4.0,
        'B+'=> 3.5,
        'B' => 3.0,
        'C+'=> 2.5,
        'C' => 2.0,
        'D+' => 1.5,
        'D' => 1.0,
        'F' => 0.0
    ];
    return $grade_points[$grade]; // return null for invalid grades
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_index = $_POST["delete_id"] ?? "no index";

    array_splice($_SESSION['courses'],$course_index,1);

    header("Location: gpa_calculator.php");
    exit();
}

$all_credit = 0;
$all_point = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบคำนวณ GPA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('asset/bg.png')] inset-0  object-cover size-full">
    <div class="content-stretch flex flex-col gap-[50px] items-center px-[450px] py-[200px] relative size-full">
        <div class="">
            <div class="mb-5 flex flex-col font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center leading-[0] relative shrink-0 text-[64px] text-black tracking-[-1.28px] w-full">
                <h1 class="block leading-[1.1] whitespace-pre-wrap">คะแนน GPA ของฉัน</h1>
            </div>

            <div class="flex" role="navigation">
                <div class="justify-start bg-transparent content-stretch flex items-center px-[8px] py-[8px] relative rounded-[12px] shrink-0">
                    <a href="index.php"><- Back to main page</a>
                </div>

                <div class="justify-start bg-transparent content-stretch flex items-center px-[8px] py-[8px] relative rounded-[12px] shrink-0">
                    <a>|</a>
                </div>

                <div class="justify-start bg-transparent content-stretch flex items-center px-[8px] py-[8px] relative rounded-[12px] shrink-0">
                    <a href="add_grade.php">เพิ่มเกรด -></a>
                </div>
            </div>


            <div class="flex flex-col my-5">
                <?php if (empty($_SESSION['courses'])): ?>
                    <h1 class="text-lg">ยังไม่มีข้อมูลวิชาที่มีคะแนน</h1>
                <?php else: ?>
                    <?php foreach ($_SESSION['courses'] as $index => $course): ?>
                        <h1 class="flex flex-row">
                            รายวิชา:
                            <?php echo htmlspecialchars($course['name']); ?><p>&emsp;</p>
                            เกรต:
                            <?php echo htmlspecialchars($course['grade']);?><p>&emsp;</p>
                            หน่วยกิต:
                            <?php echo htmlspecialchars($course['credits']);?><p>&emsp;</p>
                            คะแนน:
                            <?php echo htmlspecialchars(grade_to_points($course['grade']));?><p>&emsp;</p>
                            <form onclick="return confirm('ลบวิชานี้ใช่ไหม?')"
                                method="post" action="gpa_calculator.php">
                                <input type="int" value="<?php echo $index; ?>" name="delete_id" hidden>
                                <input type="submit" value="[ลบ]">
                            </h1>
                            <?php $all_credit = $all_credit+$course['credits'] ?>
                            <?php $all_point = $all_point+grade_to_points($course['grade']) ?>
                    <?php endforeach; ?>
                    <div class="mb-5 mt-10 flex flex-col font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center leading-[0] relative shrink-0 text-[32px] text-black tracking-[-1.28px] w-full">
                        <h1 class="block leading-[1.1] whitespace-pre-wrap mb-2">หน่วยกิจรวม: <?php echo $all_credit ?></h1>
                        <h1 class="block leading-[1.1] whitespace-pre-wrap mb-2">คะแนนรวม: <?php echo $all_point ?></h1>
                        <h1 class="block leading-[1.1] whitespace-pre-wrap mb-2">GPA ของคุณคือ: <?php echo $all_point ?></h1>
                    </div>
                    

                <?php endif; ?>
            </div>


        </div>
    </div>
</body>

</html>