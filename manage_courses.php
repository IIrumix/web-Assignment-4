<?php
session_start();
//$_SESSION = array();

// Initialize courses array in session if not already set
if (!isset($_SESSION['courses_list'])) {
    $_SESSION['courses_list'] = [];
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
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[url('asset/bg.png')] inset-0  object-cover size-full">
    <div class="content-stretch flex flex-col gap-4 items-center px-[480px] py-[150px] relative ">
        <!--<img alt="" className="h-48 w-full bg-cover bg-center" src{i=mgHero1} />-->
        <div class="">
            <div class="mb-5 flex flex-col font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center leading-[0] relative shrink-0 text-[64px] text-black tracking-[-1.28px] w-full">
                <h1 class="block leading-[1.1] whitespace-pre-wrap">จัดการรายวิชา</h1>
            </div>

            <div class="justify-start bg-transparent content-stretch flex items-center px-[8px] py-[8px] relative rounded-[12px] shrink-0">
                <a href="index.php"><- Back to main page</a>
            </div>
        </div>

        <br><br>
        <div class="flex flex-col mb-4">
            <div class="mb-3 flex flex-row font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center relative shrink-0 text-[32px] text-black tracking-[-1.28px] w-full">
                <h1 class="block leading-[1.1] whitespace-pre-wrap">เพิ่มรายวิชาใหม่ </h1>
            </div>
            <form method="post" action="add_course.php">
                Course: <input type="text" name="course_name" required><br><br>
                Credit: <input type="text" name="course_credit" required><br><br>
                <button class="bg-black hover:bg-gray-800 transition-colors content-stretch flex items-center justify-center px-[6px] py-[8px] relative rounded-[12px] shrink-0" type="submit">
                    <div class="flex flex-col font-['IBM Plex Sans Thai',sans-serif,] font-medium justify-center leading-[0] not-italic relative shrink-0 text-[14px] text-center text-white tracking-[-0.09px] w-[112px]">
                        <p class="leading-[1.45] whitespace-pre-wrap">Add Course</p>
                    </div>
                </button>
            </form>
        </div>

        <div class="flex flex-col">
            <div class="mb-3 flex flex-row font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center relative shrink-0 text-[32px] text-black tracking-[-1.28px] w-full">
                <h1 class="block leading-[1.1] whitespace-pre-wrap">รายชื่อวิชาปัจจุบัน </h1>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ชื่อรายวิชา</th>
                        <th>หน่วยกิต</th>
                        <th>การดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($_SESSION['courses_list'])): ?>
                        <tr>
                            <td colspan="3">ยังไม่มีข้อมูลวิชา</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($_SESSION['courses_list'] as $index => $course): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($course['name']); ?></td>
                                <td><?php echo htmlspecialchars($course['credits']); ?></td>
                                <td>
                                    <form onclick="return confirm('ลบวิชานี้ใช่ไหม?')" 
                                        method="post" action="delete_course.php">
                                        <input type="int" value="<?php echo $index; ?>" name="delete_id">
                                        <input type="submit" value="[ลบ]">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>

        <!--<img alt="" className="absolute inset-0 max-w-none object-cover pointer-events-none size-full" src={imgHero1} />-->
    </div>
    </div>
</body>

</html>