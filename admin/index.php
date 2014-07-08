<!DOCTYPE html>
<html>
  <head>
    <title>Symphodia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
			padding-top: 100px;
			background-color: #606060;
		}

		.form-horizontal {
			max-width: 500px;
			padding-top: 20px;
			padding-bottom: 20px;
			margin: 20px auto;
			background-color: #303030;
			border: 1px solid #fff;
		}
	</style>

  </head>
  <body>
	<div class="container">
		<form class="form-horizontal" action="login.php" method="POST">
			<div class="control-group">
				<div class="row">
					<div class="span10 offset1">
						<h1>Куда без пароля?!</h1>
					</div>
				</div>
			</div>
		  <div class="control-group">
			<label class="control-label" for="login">Логин</label>
			<div class="controls">
			  <input type="text" id="login" placeholder="Я" name="login">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="password">Пароль</label>
			<div class="controls">
			  <input type="password" id="password" placeholder="Плохой Гитарист" name="password">
			</div>
		  </div>
		  <div class="control-group">
			<div class="controls">
			  <button type="submit" class="btn">Войти</button>
			</div>
		  </div>
		</form>
	</div>


  </body>
</html>