<?php
session_start();

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


            <div class="flex flex-col">
                <?php if (empty($_SESSION['courses_list'])): ?>
                    <h1 class="text-lg">ยังไม่มีข้อมูลวิชาที่มีคะแนน</h1>
                <?php else: ?>
                    <?php foreach ($_SESSION['courses_list'] as $index => $course): ?>
                        <h1 class="flex flex-row">
                            รายวิชา:
                            <?php echo htmlspecialchars($course['name']); ?><p>&emsp;</p>
                            เกรต:

                            หน่วยกิต:
                            <?php echo htmlspecialchars($course['credits']);?><p>&emsp;</p>
                            <form onclick="return confirm('ลบวิชานี้ใช่ไหม?')"
                                method="post" action="delete_course.php">
                                <input type="int" value="<?php echo $index; ?>" name="delete_id" hidden>
                                <input type="submit" value="[ลบ]">
                        </h1>
                    <?php endforeach; ?>
                    

                <?php endif; ?>
            </div>


        </div>
    </div>
</body>

</html>