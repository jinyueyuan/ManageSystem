<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-default" style="margin-bottom:0;border:0;border-radius:0;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-grain"></span>&nbsp;学生信息查询系统</a>
        </div>


        <span class="navbar-text"style="float:right;">欢迎登录</span>
      </div>
      </nav>

    <div class="container col-md-3 col-md-offset-4">

      <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">请登录</h2>
        <label for="inputID" class="sr-only">用户名</label>
        <input type="text" id="inputID" name="userid" class="form-control" placeholder="用户名" required autofocus>
        <div style='height:10px;clear:both;display:block'></div>
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="密码" required>
        <div class="radio">
          <label>
            <input type="radio" name="identity" value="teacher" checked>教  师
          </label>
          <label>
            <input type="radio" name="identity" value="administrator">管理员
          </label>
        </div>
        
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="登录">
      </form>

    </div>


  </body>

</html>