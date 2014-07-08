<?
	session_start();
	if (!isset($_SESSION['user'])) {
		header ("location: index.php");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Symphodia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet" media="screen">

  </head>
  <body>
  	<div class="row" style="background-color:#eeeeee;border-bottom: solid 1px">
		<div style="float:right;">
			<a class="btn btn-primary" href="logout.php">Выйти</a>
		</div>
	</div>
	<ul class="nav nav-tabs">
		<li>
			<a href="admin_news.php">Новости</a>
		</li>
		<li>
			<a href="admin_music.php">Музыка</a>
		</li>
		<li class="active">
			<a href="#">О нас</a>
		</li>
	</ul>

	
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>