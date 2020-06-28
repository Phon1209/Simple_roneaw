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
  <body class="bg_sk" style="margin-top: -1rem;padding-top:1rem;">
    <?php echo $__env->make('component/sidebar',['current'=>'ตั้งค่าบัญชี'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="/changePassword" method="post" id="changePasswordForm" style="padding-left:100px">
      Account Setting
      <div>Old Password<input type="password" name="oldpwd"></div>
      <div>New Password<input type="password" name="newpwd"></div>
      <div>Confirm New Password<input type="password" name="confirmnewpwd"></div>
      <div><input type="button" id="changepassword" value="Change Password" style="width:150px"></div>
      <?php echo csrf_field(); ?>

    </form>
    <script src="/js/api.js"></script>
    <script type="text/javascript">
      document.querySelector("#changepassword").addEventListener("click",function(){
        const oldpwd=document.querySelector("input[name='oldpwd']").value;
        const newpwd=document.querySelector("input[name='newpwd']").value;
        const confirmnewpwd=document.querySelector("input[name='confirmnewpwd']").value;
        if (newpwd===confirmnewpwd)
        {
          console.log("Ok newpwd===confirmnewpwd");
          API.sendFormRequest("/changePassword","changePasswordForm",function(xhr){
            if (xhr.responseText==="true")
            {
              console.log("Change Password Completed");
            }
            else if (xhr.responseText==="false")
            {
              console.log("Change Password Failed");
            }
          });
        }
        else
        {
          console.log("Popup newpwd!=confirmnewpwd");
        }
        console.log(oldpwd);
        console.log(newpwd);
        console.log(confirmnewpwd);
      });
    </script>
  </body>
</html>
<?php /**PATH D:\Code Project\Printer Room System\PrinterRoomSystem\resources\views/accountSetting.blade.php ENDPATH**/ ?>