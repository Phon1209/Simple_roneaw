<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="/css/style.css" />
    <link
      rel="stylesheet"
      media="screen and (max-width: 880px)"
      href="/css/mobile.css"
    />
    <link href="https://fonts.googleapis.com/css?family=Athiti|Kanit|Mali|Roboto+Condensed|Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Home</title>
  </head>
  <body>
    <section id="login-form">
      <div class="container">
        <form action="/login" method="post">
        <div class="form-group">
          <img src="img/suankularb.png" alt="">
          <h1>ระบบสั่ง</h1>
          <div class="line"></div>
<?php if(isset($loginError)): ?>
            <div class="error-layout">
              <div class="error-box"><?php echo e($loginError); ?></div>
            </div>
<?php endif; ?>
            <?php echo csrf_field(); ?>

            <div class="form-box">
              <label>Username</label>
              <input type="text" name="usr">
            </div>
            <div class="form-box">
              <label>Password</label>
              <input type="password" name="pwd">
            </div>
            <button type="submit" class="pd-1 btn">Login</button>
          </div>
        </form>
      </div>
    </section>
  </body>
</html>
<?php /**PATH /Users/Admin/Sites/PrinterRoomSystem/resources/views/login.blade.php ENDPATH**/ ?>