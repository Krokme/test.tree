<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" type="image/png" href="<?php echo PROJECT_PATH; ?>img/favicon.png"/>
    <link href="<?php echo PROJECT_PATH; ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet/less" type="text/css" href="<?php echo PROJECT_PATH; ?>css/custom.less">
    <script src="<?php echo PROJECT_PATH; ?>js/less.min.js"></script>
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="/login" id="login_form">
              <h1>Login</h1>
              <div id="error" class="error"></div>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="true" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="true" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <div>
                  <p>User: <b>test</b> Password: <b>test</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>

    </div>

    <script src="<?php echo PROJECT_PATH; ?>js/jquery.min.js"></script>
    <script src="<?php echo PROJECT_PATH; ?>js/main.js"></script>
  </body>
</html>
