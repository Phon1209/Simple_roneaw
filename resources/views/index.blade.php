<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      media="screen and (max-width: 880px)"
      href="css/mobile.css"
    />
    <script src="https://kit.fontawesome.com/744c1f376a.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Athiti|Kanit|Mali&display=swap" rel="stylesheet">
    <title>Form</title>
  </head>
  <body>
    <section class="sidebar">
      <input type="checkbox" class="toggler"/>
      <div class="hamburger">
        <div></div>
       </div>
      <div class="menu">
        <div>
          <ul class="menu-list">
            <li class="current"><a href="#">PRINT</a></li>
            <li><a href="#">HISTORY</a></li>
            <li><a href="#">HELP</a></li>
            <li><a href="/logout">LOGOUT</a></li>
          </ul>
        </div>
      </div>
    </section>
    <form action="/" method="post" onsubmit="return formCheck()">
      @csrf

      @isset($formError)
      <div class="error-layout">
        <div class="error-box">{{$formError}}</div>
      </div>
      @endisset

      <!-- Form Error Popup -->
      <div id="org-error" class="hidden-error">
        <div class="error-box">ยังไม่ได้เลือกหน่วยงาน</div>
      </div>
      <div id="work-error" class="hidden-error">
        <div class="error-box">ยังไม่ได้เลือกประเภทงาน</div>
      </div>
      <div id="blank-paper-error" class="hidden-error">
        <div class="error-box">ยังไม่ได้ใส่ข้อมูลกระดาษ</div>
      </div>
      <div id="invalid-paper-error" class="hidden-error">
        <div class="error-box">ข้อมูลกระดาษผิดพลาด</div>
      </div>

      <div class="panel">
      <section id="org-slct" class="slct">
        <div class="inst"><h3>เลือกหน่วยงาน</h3></div>
        <div class="radio-slct">
@foreach ($organizationList as $idx=>$organization)
          <input type="radio" name="org" id="org{{$idx+1}}" value="{{$idx+1}}" />
          <label for="org{{$idx+1}}">{{$organization}}</label>
@endforeach
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
              <th class="content-center"><input id="brownPageOrigin" class="brown auto-fill" type="number" name="brownPageOrigin"></th>
              <th class="content-center"><input id="brownCopy" class="brown auto-fill" type="number" name="brownCopy"></th>
              <th><input id="brownPagePerPaper" type="hidden" name="brownPagePerPaper" value="2"><i class="fas fa-chevron-circle-left"></i><div id="brownType" class="toggle-btn">หน้า-หลัง</div><i class="fas fa-chevron-circle-right"></i></th>
              <th><input type="number" id="brownPerCopy" disabled="disabled"></th>
              <th><input id="brown-total" type="number" name="brownTotal" disabled="disabled"></th>
            </tr>
            <tr>
              <th class="bg-white">กระดาษขาว</th>
              <th class="content-center"><input id="whitePageOrigin" class="white auto-fill" type="number" name="whitePageOrigin"></th>
              <th class="content-center"><input id="whiteCopy" class="white auto-fill" type="number" name="whiteCopy"></th>
              <th><input id="whitePagePerPaper" type="hidden" name="whitePagePerPaper" value="2"><i class="fas fa-chevron-circle-left"></i><div id="whiteType" class="toggle-btn" >หน้า-หลัง</div><i class="fas fa-chevron-circle-right"></i></th>
              <th><input type="number" id="whitePerCopy" disabled="disabled"></th>
              <th><input id="white-total" type="number" name="whiteTotal" disabled="disabled"></th>
            </tr>
            <tr>
              <th class="bg-pink">กระดาษสี</th>
              <th class="content-center"><input id="colorPageOrigin" class="color auto-fill" type="number" name="colorPageOrigin"></th>
              <th class="content-center"><input id="colorCopy" class="color auto-fill" type="number" name="colorCopy"></th>
              <th><input id="colorPagePerPaper" type="hidden" name="colorPagePerPaper" value="2"><i class="fas fa-chevron-circle-left"></i><div id="colorType" class="toggle-btn" >หน้า-หลัง</div><i class="fas fa-chevron-circle-right"></i></th>
              <th><input type="number" id="colorPerCopy" disabled="disabled"></th>
              <th><input id="color-total" type="number" name="colorTotal" disabled="disabled"></th>
            </tr>
          </tbody>
        </table>
        <input type="submit" value="PRINT" class="btn v-large-btn">
        <script src="js/table_form.js"></script>
@if ($openPDF)
        <div class="pdf-layout">
          <div class="pdf-box" onclick="openPDF()">Click เพื่อ Print PDF</div>
        </div>
@endif
      </section>
    </form>
  </body>
</html>
