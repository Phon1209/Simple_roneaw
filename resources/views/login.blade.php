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
    <link href="https://fonts.googleapis.com/css?family=Athiti|Kanit|Mali|Roboto+Condensed|Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Home</title>
  </head>
  <body>
    <header>
      <nav id="navbar">
        <div class="container">
          <ul>
            <li><a href="/" class="current">Home</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <section id="login-form">
      <div class="container">
        <form action="/login" method="post">
        <div class="form-group">
          <h1>Roneaw</h1>
          <div class="line"></div>
@isset($loginMSG)
            <label id="error">{{$loginMSG}}</label>
@endisset 
            @csrf

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
      <!-- Test -->
    </section>
  </body>
</html>
