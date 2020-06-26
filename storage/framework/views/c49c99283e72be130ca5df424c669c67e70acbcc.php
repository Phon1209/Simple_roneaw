<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
    <title></title>

    <style>
      @font-face {
        font-family: "THSarabunNew";
        font-style: normal;
        font-weight: normal;
        src: url(<?php echo e(storage_path('/fonts/THSarabunNew.ttf')); ?>) format("truetype");
      }
      @font-face {
        font-family: "THSarabunNew";
        font-style: normal;
        font-weight: bold;
        src: url(<?php echo e(storage_path('/fonts/THSarabunNew Bold.ttf')); ?>) format("truetype");
      }
      @font-face {
        font-family: "THSarabunNew";
        font-style: italic;
        font-weight: normal;
        src: url(<?php echo e(storage_path('/fonts/THSarabunNew Italic.ttf')); ?>) format("truetype");
      }
      @font-face {
        font-family: "THSarabunNew";
        font-style: italic;
        font-weight: bold;
        src: url(<?php echo e(storage_path('/fonts/THSarabunNew BoldItalic.ttf')); ?>) format("truetype");
      }
      body {
        font-family: "THSarabunNew";
        font-size: 18px;
      }
      table {
        width: 100%;
        margin: auto;
        border-collapse: collapse;
        margin-top: 3rem;
      }
      table, th, td {
        border: 1px solid black;
      }
      th {
        width: 100%;
      }
      block {
        display: block;
      }

      .pdfheader{
        padding: 3rem 0;
        text-align:center;
      }

      .pdfheader .header {
        font-size: 1.4rem;
        font-weight: bold;
        text-align:center;
      }

      .pdfbody .bold {
        font-weight: bold;
        font-size: 1.1rem;
      }

      .pdfsignature {
        margin-top: 90px;
        margin-left: 50%;
      }
      .pdfsignature .signature {
        display: inline-block;
      }

      .pdfsignature .signature p {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="pdfheader">
      <block><img src="<?php echo e(storage_path('/images/sk_logo.png')); ?>" width="100px"></block>
      <block class="header">โรงเรียนสวนกุหลาบวิทยาลัย</block>
    </div>
    <div class="pdfbody">
      <block><span class="bold">วันที่</span> <?php echo e(date("d/m/Y")); ?> เวลา <?php echo e(date("H:i:s")); ?></block>
      <block><span class="bold">หน่วยงาน: </span> <?php echo e($organizationName); ?></block>
      <block>
        <table>
          <thead>
            <tr>
              <th>ชนิดกระดาษ</th>
              <th>เอกสารการสอน</th>
              <th>เอกสารทั่วไป</th>
              <th>ข้อสอบ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>กระดาษน้ำตาล</th>
              <th><?php echo e($organizationDataList->WorkType1BrownPaper); ?></th>
              <th><?php echo e($organizationDataList->WorkType2BrownPaper); ?></th>
              <th><?php echo e($organizationDataList->WorkType3BrownPaper); ?></th>
            </tr>
            <tr>
              <th>กระดาษขาว</th>
              <th><?php echo e($organizationDataList->WorkType1WhitePaper); ?></th>
              <th><?php echo e($organizationDataList->WorkType2WhitePaper); ?></th>
              <th><?php echo e($organizationDataList->WorkType3WhitePaper); ?></th>
            </tr>
            <tr>
              <th>กระดาษสี</th>
              <th><?php echo e($organizationDataList->WorkType1ColorPaper); ?></th>
              <th><?php echo e($organizationDataList->WorkType2ColorPaper); ?></th>
              <th><?php echo e($organizationDataList->WorkType3ColorPaper); ?></th>
            </tr>
          </tbody>
        </table>
      </block>
    </div>
  </body>
</html>
<?php /**PATH D:\Code Project\Printer Room System\PrinterRoomSystem\resources\views/admin/organizationReportForm.blade.php ENDPATH**/ ?>