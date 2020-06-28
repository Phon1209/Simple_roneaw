<!DOCTYPE html>
<html lang="en" dir="ltr">
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
    <title>Account Setting</title>
  </head>
  <body class="bg_sk">
    <?php echo $__env->make('component/sidebar',['current'=>'ตั้งค่าบัญชี'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="alert-collection"></div>
    <div class="container">
      <h2>Account Setting</h2>
      <div class="table-content">
        <section class="py-2">
          <form action="/changePassword" method="post" id="changePasswordForm" class="d-flex-cc p-3 round">
            <div class="form-group">
              <label>ชื่อผู้ใช้</label>
              <?php echo e($userData->Username); ?>

            </div>
            <div class="form-group">
              <label>ชื่อ</label>
              <?php echo e($userData->DisplayName); ?>

            </div>
            <div class="form-group">
              <label>รหัสผ่านเก่า</label>
              <input type="password" name="oldpwd">
            </div>
            <div class="form-group">
              <label>รหัสผ่านใหม่</label>
              <input type="password" name="newpwd">
            </div>
            <div class="form-group">
              <label>ยืนยันรหัสผ่านใหม่</label>
              <input type="password" name="confirmnewpwd">
            </div>
            <input class="btn btn-block" type="button" id="changepassword" value="เปลื่ยนรหัสผ่าน">
            <?php echo csrf_field(); ?>

          </form>
        </section>
      </div>
    </div>
    <script src="/js/loader.js"></script>
    <script src="/js/api.js"></script>
    <script type="text/javascript">
      const UI = (function() {
        const alertCollection = document.querySelector(".alert-collection");
        function showAlert(text, className) {
          const alert = document.createElement("div");
          alert.className = className;
          let icon;

          if (className.includes("success"))
            icon = `<i class="fas fa-check-circle"></i>`;
          if (className.includes("warning"))
            icon = `<i class="fas fa-exclamation-triangle"></i>`;
          if (className.includes("danger"))
            icon = `<i class="fas fa-times-circle"></i>`;

          alert.innerHTML = `${icon} ${text}`;
          alertCollection.appendChild(alert);

          setTimeout(removeAlert, 5000);
        }

        function removeAlert() {
          const node = document.querySelector(".alert");
          if (node) node.remove();
        }

        function resetForm(id) {
          const elem = document.getElementById(id);
          if (elem.nodeName === "FORM") {
            elem.reset();
          }
        }

        return {
          showAlert,
          resetForm,
        }
      })();

      document.querySelector("#changepassword").addEventListener("click",function(){
        const oldpwd=document.querySelector("input[name='oldpwd']").value;
        const newpwd=document.querySelector("input[name='newpwd']").value;
        const confirmnewpwd=document.querySelector("input[name='confirmnewpwd']").value;
        if (newpwd===confirmnewpwd)
        {
          loader.onLoad();
          API.sendFormRequest("/changePassword","changePasswordForm",function(xhr){
            loader.loadFinished();
            if (xhr.responseText==="true")
            {
              UI.showAlert("เปลื่ยนรหัสผ่านสำเร็จ","alert alert-success")
            }
            else if (xhr.responseText==="false")
            {
              UI.showAlert("เปลื่ยนรหัสผ่านไม่สำเร็จ","alert alert-danger");
            }
            UI.resetForm("changePasswordForm");
          });
        }
        else
        {
          UI.showAlert("ยืนยันรหัสผ่านใหม่ไม่ถูกต้อง","alert alert-warning")
        }
      });
    </script>
  </body>
</html>
<?php /**PATH /Users/Admin/Sites/PrinterRoomSystem/resources/views/accountSetting.blade.php ENDPATH**/ ?>