<?php
session_start();

if (!isset($_SESSION['courses'])) {
  $_SESSION['courses'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $course_name = $_POST["course_name"] ?? "no name";
  $course_grade = $_POST["course_grade"] ?? "no grade";
  $course_credit = 0;

  if (isset($_SESSION['courses_list'])) {
    foreach ($_SESSION['courses_list'] as $course) {
      if ($course['name'] === $course_name) {
        $course_credit = $course['credits'];
        break;
      }
    }
  }

  array_push($_SESSION['courses'], [
    'name' => $course_name,
    'grade' => $course_grade,
    'credits' => $course_credit
  ]);


  header("Location: add_grade.php");
  exit();
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
  <link rel="stylesheet" href="blob.css">
</head>

<body class="m-0 p-0 h-full overflow-hidden bg-[#fffaf0]">
  <div class="relative w-screen h-screen">
    <div class="blob yellow blur-[50px]"></div>
    <div class="blob yellow2 blur-[50px]"></div>
    <div class="blob pink blur-[50px]"></div>

    <div class="content-stretch flex flex-col gap-[50px] items-center px-[480px] py-[200px] relative size-full">
      <div class="">
        <div class="mb-5 flex flex-col font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center leading-[0] relative shrink-0 text-[64px] text-black tracking-[-1.28px] w-full">
          <h1 class="block leading-[1.1] whitespace-pre-wrap">เพิ่มเกรด</h1>
        </div>

        <div class="justify-start bg-transparent content-stretch flex items-center px-[8px] py-[8px] relative rounded-[12px] shrink-0">
          <a href="gpa_calculator.php"><- กลับไปหน้า GPA</a>
        </div>

        <div class="flex flex-col">
          <?php if (empty($_SESSION['courses_list'])): ?>
            <h1 class="text-lg">ยังไม่มีข้อมูลวิชาในระบบ</h1>
          <?php else: ?>
            <form action="add_grade.php" method="POST">
              <label for="course_name">เลือกวิชา:</label>
              <select name="course_name" id="course_name" class="rounded-[12px] border-solid px-[8px] py-[8px]" require>
                <option value="" disabled selected>--เลือกวิชา--</option>
                <?php foreach ($_SESSION['courses_list'] as $index => $courseList): ?>
                  <option value="<?= htmlspecialchars($courseList['name']) ?>">
                    <?= htmlspecialchars($courseList['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select><br>
              Grade: <input type="text" name="course_grade" class="bg-transparent backdrop-blur-sm hover:bg-gray-400 transition-all rounded-md border" required><br><br>
              <button class="bg-tranparent backdrop-blur-3xl hover:bg-gray-800 transition-all content-stretch flex items-center justify-center px-24 py-[8px] relative rounded-[12px] shrink-0 text-black hover:text-white border" type="submit">
                <div class="flex flex-col font-['IBM Plex Sans Thai',sans-serif,] font-medium justify-center leading-[0] not-italic relative shrink-0 text-[14px] text-center  tracking-[-0.09px] w-[112px]">
                  <p class="leading-[1.45] whitespace-pre-wrap">Add Grade</p>
                </div>
              </button>
            </form>

          <?php endif; ?>
        </div>


      </div>

    </div>
  </div>
</body>

</html>