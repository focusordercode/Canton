<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
<title>登录</title>

</head>

<body>
<form action="/focusor/admin.php/Home/Login/checklogin" method="post">
<p>用户名：<input type="text" name="username" id="username"  /></p>
<p>密码：<input type="password" name="password" id="password"  /></p>
<input type="submit" value="注册" />
</form>
</body>

</html>