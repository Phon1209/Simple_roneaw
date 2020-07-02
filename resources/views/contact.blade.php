<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link
      rel="stylesheet"
      href="/css/mobile.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Athiti|Kanit|Mali&display=swap" rel="stylesheet">
    <title>Contact</title>
    <style>
      @font-face {
        font-family: supermarket;
        src: url("/font/supermarket.ttf");
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        background: #f4f4f4;
      }

      header {
        font-size: 16px;
      }

      h1 {
        font-family: "supermarket", sans-serif;
        font-size: 48px;
        display: block;
        margin: 16px auto;
        text-align: center;
      }

      .line {
        width: 100%;
        background-image: linear-gradient(to right, #ffc1ce 20%, #bbf6fe);
        height: 4px;
        border-radius: 5px;
        margin: 30px auto;
        margin-bottom: 80px;
      }

      .container {
        max-width: 1100px;
        margin: 0 auto;
        font-size: 16px;
        font-family: "supermarket", sans-serif;
      }

      .cards {
        display: grid;
        padding: 16px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 16px;
      }

      .card {
        margin: 16px auto;
        width: 300px;
        background: white;
        height: 370px;
        position: relative;
        border-radius: 10px;
        transform-style: preserve-3d;
        transition: all 0.5s ease;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14),
          0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
      }

      .card:hover {
        transform: rotateY(180deg);
      }

      .card .title {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        padding-right: 16px;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
        backface-visibility: hidden;
      }

      .card .title .name {
        font-size: 32px;
        font-weight: bold;
      }

      .card .title .role {
        list-style: none;
        font-size: 19.2px;
        line-height: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        color: steelblue;
      }

      .card .contact {
        box-shadow: inset 0 0 0 2px skyblue;
        position: absolute;
        padding: 16px;
        width: 100%;
        height: 100%;
        color: white;
        background: #000080;
        border-radius: 10px;
        font-size: 22.4px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        backface-visibility: hidden;
        transform: rotateY(180deg);
      }

      .card .contact > div {
        margin: 6.4px 0;
      }

      .card .contact > div i {
        margin-right: 8px;
      }

      .card .contact > div.head {
        font-size: 64px;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        color: pink;
        align-self: center;
      }

      .mail {
        cursor: pointer;
      }

      .card:nth-child(even) .title .role {
        color: palevioletred;
      }

      .card:nth-child(even) .contact {
        background: #d35c84;
      }

      .card:nth-child(even) .contact > div.head {
        color: #b3e0f2;
      }
    </style>
  </head>
  <body style="margin-top:-30px; padding-top:30px;">
    @include('component/sidebar',['current'=>'ติดต่อผู้จัดทำ'])
    <header>
      <h1>คณะผู้จัดทำ</h1>
      <div class="line"></div>
    </header>
    <div class="container">
      <div class="cards">
        <div class="card">
          <div class="title">
            <div class="name">ปฏิพล เลิศสุธากุล</div>
            <ul class="role">
              <li>Front-End Developer</li>
              <li>UI/UX Designer</li>
            </ul>
          </div>
          <div class="contact">
            <div class="head">
              SK138
            </div>
            <div class="phone">
              <i class="fas fa-phone-square-alt"></i>0649914515
            </div>
            <div class="fb">
              <i class="fab fa-facebook-square"></i>ปฏิพล เลิศสุธากุล
            </div>
            <div class="mail">
              <i class="fas fa-envelope"></i>ptphon@gmail.com
            </div>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <div class="name">พงศ์วิวัฒน์ ลิมปสุธรรม</div>
            <ul class="role">
              <li>Back-End Developer</li>
            </ul>
          </div>
          <div class="contact">
            <div class="head">
              SK138
            </div>
            <div class="phone">
              <i class="fas fa-phone-square-alt"></i>0813410410
            </div>
            <div class="fb">
              <i class="fab fa-facebook-square"></i>Pongwiwat Limpasuthum
            </div>
            <div class="mail">
              <i class="fas fa-envelope"></i>pongwiwat1995@gmail.com
            </div>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <div class="name">ชยุตม์ อาจอำนวยวิภาส</div>
            <ul class="role">
              <li>UI/UX Designer</li>
            </ul>
          </div>
          <div class="contact">
            <div class="head">SK138</div>
            <div class="phone">
              <i class="fas fa-phone-square-alt"></i>0982714480
            </div>
            <div class="fb">
              <i class="fab fa-facebook-square"></i>Chayut Artamnuayvipas
            </div>
            <div class="mail">
              <i class="fas fa-envelope"></i>bruce21208@yahoo.co.th
            </div>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <div class="name">อธิษฐาน บัวเทพ</div>
            <ul class="role">
              <li>UX Designer</li>
              <li>Tester</li>
            </ul>
          </div>
          <div class="contact">
            <div class="head">SK138</div>
            <div class="phone">
              <i class="fas fa-phone-square-alt"></i>0953182205
            </div>
            <div class="fb">
              <i class="fab fa-facebook-square"></i>Atittarn Bouthep
            </div>
            <div class="mail">
              <i class="fas fa-envelope"></i>atittarn2@gmail.com
            </div>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <div class="name" style="line-height:18px">มาร์ค กิตติพัศ</div>
            <div class="name">คูประเสริฐวงศ์</div>
            <ul class="role">
              <li>UI/UX Designer</li>
              <li>Tester</li>
            </ul>
          </div>
          <div class="contact">
            <div class="head">SK140</div>
            <div class="phone">
              <i class="fas fa-phone-square-alt"></i>0641455398
            </div>
            <div class="fb">
              <i class="fab fa-facebook-square"></i>Mark Kittiphat Kuprasertwong
            </div>
            <div class="mail">
              <i class="fas fa-envelope"></i>markkittiphat@gmail.com
            </div>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <div class="name">นันทิตา โฉมศิริ</div>
            <ul class="role">
              <li>UI/UX Designer</li>
            </ul>
          </div>
          <div class="contact">
            <div class="head"></div>
            <div class="phone">
              <i class="fas fa-phone-square-alt"></i>0649914515
            </div>
            <div class="fb">
              <i class="fab fa-facebook-square"></i>Nantita Chomsiri
            </div>
            <div class="mail">
              <i class="fas fa-envelope"></i>nantitakikk@gmail.com
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.querySelectorAll(".contact .mail").forEach((mail) => {
        mail.addEventListener("click", (e) => {
          let mailto = e.target.childNodes[2].textContent;
          if (e.target.nodeName === "I")
            mailto = e.target.parentNode.childNodes[2].textContent;
          window.location.href = `mailto:${e.target.childNodes[2].textContent}`;
        });
      });
    </script>
  </body>
</html>
