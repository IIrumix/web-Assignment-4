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

<body class="bg-[url('asset/bg.png')] absolute inset-0  object-cover size-full">
  <div class="content-stretch flex flex-col gap-[50px] items-center px-[480px] py-[200px] relative size-full">
    <!--<img alt="" className="h-48 w-full bg-cover bg-center" src{i=mgHero1} />-->
    <!--<img alt="" className="absolute inset-0 max-w-none object-cover pointer-events-none size-full" src={imgHero1} />-->
    <div class="content-stretch flex flex-col h-1/2 items-center justify-between not-italic relative shrink-0 text-center" data-name="Content">
      <div class="flex flex-col font-['IBM Plex Sans Thai',sans-serif] font-medium h-[68px] justify-center leading-[1.4] relative shrink-0 text-[24px] text-[rgba(0,0,0,0.55)] tracking-[-0.12px] w-[960px] whitespace-pre-wrap">
        <p class="mb-0">นายอชิตพล พิศสมัย 67011212147</p>
        <p>&nbsp;</p>
      </div>
      <div class="mb-5 flex flex-col font-['IBM Plex Sans Thai',sans-serif] font-bold h-[70px] justify-center leading-[0] relative shrink-0 text-[64px] text-black tracking-[-1.28px] w-full">
        <h1 class="block leading-[1.1] whitespace-pre-wrap">ระบบคำนวณ GPA</h1>
      </div>

      <div class="flex flex-row gap-4">

        <a href="manage_courses.php">
          <button class="bg-black hover:bg-gray-800 transition-colors content-stretch flex items-center justify-center px-[16px] py-[12px] relative rounded-[12px] shrink-0" >
            <div class="flex flex-col font-['IBM Plex Sans Thai',sans-serif,] font-medium justify-center leading-[0] not-italic relative shrink-0 text-[18px] text-center text-white tracking-[-0.09px] w-[112px]">
              <p class="leading-[1.45] whitespace-pre-wrap">จัดการรายวิชา</p>
            </div>
          </button>
        </a>

        <a href="gpa_calculator.php">
          <div class="bg-transparent hover:bg-black/5 transition-all content-stretch flex items-center justify-center px-[16px] py-[12px] relative rounded-[12px] shrink-0 border-2 border-[rgba(0,0,0,0.15)] border-solid">
            <div class="flex flex-col font-['IBM Plex Sans Thai',sans-serif] font-medium justify-center leading-[0] not-italic relative shrink-0 text-[18px] text-center text-black tracking-[-0.09px] w-[112px]">
              <p class="leading-[1.45] whitespace-pre-wrap">คำนวณ GPA</p>
            </div>
          </div>
        </a>

      </div>

    </div>
  </div>
</body>

</html>