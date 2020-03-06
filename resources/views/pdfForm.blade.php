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
        src: url({{storage_path('/fonts/THSarabunNew.ttf')}}) format("truetype");
      }
      @font-face {
        font-family: "THSarabunNew";
        font-style: normal;
        font-weight: bold;
        src: url({{storage_path('/fonts/THSarabunNew Bold.ttf')}}) format("truetype");
      }
      @font-face {
        font-family: "THSarabunNew";
        font-style: italic;
        font-weight: normal;
        src: url({{storage_path('/fonts/THSarabunNew Italic.ttf')}}) format("truetype");
      }
      @font-face {
        font-family: "THSarabunNew";
        font-style: italic;
        font-weight: bold;
        src: url({{storage_path('/fonts/THSarabunNew BoldItalic.ttf')}}) format("truetype");
      }
      body {
        font-family: "THSarabunNew";
        font-size: 18px;
      }
      table {
        width: 100%;
        margin: auto;
        border-collapse: collapse;
      }
      table, th, td {
        border: 1px solid black;
      }
      block {
        display: block;
        margin-bottom: 20px;
      }
      
      .pdfheader{
        padding: 3rem 0;
      }

      .pdfheader header {
        font-size: 1.4rem;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="pdfheader">
      <block><img src="{{storage_path('/images/sk_logo.png')}}" width="100px"></block>
      <block class="header">โรงเรียนสวนกุหลาบวิทยาลัย</block>
    </div>
    <div class="pdfbody">
      <block>วันที่ {{date("d/m/Y")}} เวลา {{date("H:i:s")}}</block>
      <block>จัดทำ: {{$translate['WorkType'][$orderData['WorkType']]}}</block>
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
              <th>{{$orderData['brownPageOrigin']}}</th>
              <th>{{$orderData['brownCopy']}}</th>
              <th>{{$translate['pagePerPaper'][$orderData['brownPagePerPaper']]}}</th>
            </tr>
            <tr>
              <th>กระดาษขาว</th>
              <th>{{$orderData['whitePageOrigin']}}</th>
              <th>{{$orderData['whiteCopy']}}</th>
              <th>{{$translate['pagePerPaper'][$orderData['whitePagePerPaper']]}}</th>
            </tr>
            <tr>
              <th>กระดาษสี</th>
              <th>{{$orderData['colorPageOrigin']}}</th>
              <th>{{$orderData['colorCopy']}}</th>
              <th>{{$translate['pagePerPaper'][$orderData['colorPagePerPaper']]}}</th>
            </tr>
          </tbody>
        </table>
      </block>
      <div class="pdfsignature">
        <div class="signature">
          ลงชื่อ.................................................................<br>
          ({{$userData->DisplayName}})<br>
          {{$organizationName}}
        </div>
      </div>
    </div>
  </body>
</html>
