<?php
session_start();
//$_SESSION = array();

// Initialize courses array in session if not already set
if (!isset($_SESSION['courses_list'])) {
    $_SESSION['courses_list'] = [];
}

if (!isset($_SESSION['courses'])) {
    $_SESSION['courses'] = [];
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
    <link rel="stylesheet" href="blob.css">
</head>

<body class="m-0 p-0 h-full overflow-hidden bg-[#fffaf0]">
  <div class="relative w-screen h-screen">
    <div class="blob yellow blur-[50px]"></div>
    <div class="blob yellow2 blur-[50px]"></div>
    <div class="blob pink blur-[50px]"></div>
    
    <div class="content-stretch flex flex-col gap-4 items-center px-[480px] py-[100px] relative ">
        <!--<img alt="" className="h-48 w-full bg-cover bg-center" src{i=mgHero1} />-->
        <div class="">
            <div class="mb-5 flex flex-col font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center leading-[0] relative shrink-0 text-[64px] text-black tracking-[-1.28px] w-full">
                <h1 class="block leading-[1.1] whitespace-pre-wrap">จัดการรายวิชา</h1>
            </div>

            <div class="justify-start bg-transparent content-stretch flex items-center px-[8px] py-[8px] relative rounded-[12px] shrink-0">
                <a href="index.php"><- หน้าแรก</a>
            </div>
        </div>

        <br><br>
        <div class="flex flex-col mb-4">
            <div class="mb-3 flex flex-row font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center relative shrink-0 text-[32px] text-black tracking-[-1.28px] w-full">
                <h1 class="block leading-[1.1] whitespace-pre-wrap">เพิ่มรายวิชาใหม่ </h1>
            </div>
            <form method="post" action="add_course.php">
                Course: <input type="text" name="course_name" class="bg-transparent backdrop-blur-sm hover:bg-gray-400 transition-all rounded-md border" required><br><br>
                Credit: <input type="numeric" name="course_credit" class="bg-transparent backdrop-blur-sm hover:bg-gray-400 transition-all rounded-md border" required><br><br>
                <button class="bg-tranparent backdrop-blur-3xl hover:bg-gray-800 transition-all content-stretch flex items-center justify-center px-24 py-[8px] relative rounded-[12px] shrink-0 text-black hover:text-white border" type="submit">
                    <div class="flex flex-col font-['IBM Plex Sans Thai',sans-serif,] font-medium justify-center leading-[0] not-italic relative shrink-0 text-[14px] text-center  tracking-[-0.09px] w-[112px]">
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
                                        <input type="้hidden" value="<?php echo $course['name'] ?>" name="course_name" hidden>
                                        <input type="้hidden" value="<?php echo $index ?>" name="delete_id" hidden>
                                        <input type="submit" value="[ลบ]">
                                    </form>
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
    </div>
</body>

</html>