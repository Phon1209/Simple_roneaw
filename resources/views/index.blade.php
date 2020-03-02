<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link
      rel="stylesheet"
      media="screen and (max-width: 880px)"
      href="css/mobile.css"
    /> -->
    <link href="https://fonts.googleapis.com/css?family=Athiti|Kanit|Mali&display=swap" rel="stylesheet">
    <title>Form</title>
  </head>
  <body>
    <form action="/" method="post">
      @csrf

      <div class="panel">
      <section id="org-slct" class="slct">
        <div class="inst"><h3>เลือกหน่วยงาน</h3></div>
        <div class="radio-slct">
          <input type="radio" name="org" id="org1" value="1" />
          <label for="org1">กลุ่มสาระการเรียนรู้คณิตศาสตร์</label>
          <input type="radio" name="org" id="org2" value="2" />
          <label for="org2">กลุ่มบริหารกิจการนักเรียน</label>
        </div>
      </section>
      <section id="work-slct" class="slct">
        <div class="inst"><h3>เลือกประเภทงาน</h3></div>
        <div class="radio-slct">
          <input type="radio" name="work" id="work1" value="1" />
          <label for="work1">เอกสารการสอน</label>
          <input type="radio" name="work" id="work2" value="2" />
          <label for="work2">เอกสารทั่วไป</label>
          <input type="radio" name="work" id="work3" value="3" />
          <label for="work3">ข้อสอบ</label>
        </div>
      </section>
      </div>
      <section id="table-form">
        <table>
          <thead>
            <tr>
              <th>ชนิดกระดาษ</th>
              <th>จำนวนต้นฉบับ(หน้า)</th>
              <th>จำนวนสำเนา(ชุด)</th>
              <th>ลักษณะเอกสาร</th>
              <th>จำนวนกระดาษต่อชุด</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="bg-brown">กระดาษน้ำตาล</th>
              <th><input id="brownPageOrigin" class="brown" type="number" name="brownPageOrigin"></th>
              <th><input id="brownCopy" class="brown" type="number" name="brownCopy"></th>
              <th><input id="brownPagePerPaper" type="hidden" name="brownPagePerPaper" value="2"><div id="brownType" class="toggle-btn">หน้า-หลัง</div></th>
              <th><input type="number" id="brownPerCopy" disabled="disabled"></th>
              <th><input id="brown-total" type="number" name="brownTotal" disabled="disabled"></th>
            </tr>
            <tr>
              <th class="bg-white">กระดาษขาว</th>
              <th><input id="whitePageOrigin" class="white" type="number" name="whitePageOrigin"></th>
              <th><input id="whiteCopy" class="white" type="number" name="whiteCopy"></th>
              <th><input id="whitePagePerPaper" type="hidden" name="whitePagePerPaper" value="2"><div id="whiteType" class="toggle-btn" >หน้า-หลัง</div></th>
              <th><input type="number" id="whitePerCopy" disabled="disabled"></th>
              <th><input id="white-total" type="number" name="whiteTotal" disabled="disabled"></th>
            </tr>
            <tr>
              <th class="bg-pink">กระดาษสี</th>
              <th><input id="colorPageOrigin" class="color" type="number" name="colorPageOrigin"></th>
              <th><input id="colorCopy" class="color" type="number" name="colorCopy"></th>
              <th><input id="colorPagePerPaper" type="hidden" name="colorPagePerPaper" value="2"><div id="colorType" class="toggle-btn" >หน้า-หลัง</div></th>
              <th><input type="number" id="colorPerCopy" disabled="disabled"></th>
              <th><input id="color-total" type="number" name="colorTotal" disabled="disabled"></th>
            </tr>

          </tbody>
        </table>
        <input type="submit" value="Print" class="btn v-large-btn">
        <script src="js/table_form.js"></script>

      </section>
    </form>
  </body>
</html>
