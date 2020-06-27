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
      <block><span class="bold">จัดทำ: </span> <?php echo e($translate['WorkType'][$orderData['WorkType']]); ?></block>
      <block>
        <table>
          <thead>
            <tr>
              <th>ชนิดกระดาษ</th>
              <th>จำนวนต้นฉบับ(หน้า)</th>
              <th>จำนวนสำเนา(ชุด)</th>
              <th>ลักษณะเอกสาร</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>กระดาษน้ำตาล</th>
              <th><?php echo e($orderData['brownPageOrigin']); ?></th>
              <th><?php echo e($orderData['brownCopy']); ?></th>
              <th><?php echo e($translate['pagePerPaper'][$orderData['brownPagePerPaper']]); ?></th>
            </tr>
            <tr>
              <th>กระดาษขาว</th>
              <th><?php echo e($orderData['whitePageOrigin']); ?></th>
              <th><?php echo e($orderData['whiteCopy']); ?></th>
              <th><?php echo e($translate['pagePerPaper'][$orderData['whitePagePerPaper']]); ?></th>
            </tr>
            <tr>
              <th>กระดาษสี</th>
              <th><?php echo e($orderData['colorPageOrigin']); ?></th>
              <th><?php echo e($orderData['colorCopy']); ?></th>
              <th><?php echo e($translate['pagePerPaper'][$orderData['colorPagePerPaper']]); ?></th>
            </tr>
          </tbody>
        </table>
      </block>
      <div class="pdfsignature">
        <div class="signature">
          <p>ลงชื่อ.................................................................</p>
          <p>(<?php echo e($userData->DisplayName); ?>)</p>
          <p><?php echo e($organizationName); ?></p>
        </div>
      </div>
    </div>
  </body>
</html>
<?php /**PATH D:\Code Project\Printer Room System\PrinterRoomSystem\resources\views/pdfForm.blade.php ENDPATH**/ ?>