<!DOCTYPE html>
<html>
  <head>
    <title>Официальный сайт рок-группы 'Symphodia'</title>
	<link rel="stylesheet" type="text/css" href="/css/symphodia.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="image_src" href="/img/share_logo.jpg">
	<meta name="description" content="Официальный сайт рок-группы 'Symphodia'">
	<meta name="keywords" content="Symphodia, Alex Kartishev, Roman Uljanov, Igor Nedbailo, Rock, Metal, music, Heavy, Hard">
	<meta name="author" content="Alex Kartishev">
	<script>
		function fadeElement(number) {
			var content = "#content" + number;
			$(content).fadeToggle();

		}
		function gotoFunction(url) {
			window.location = url;
		}
	</script>
	<!--Google Analytics-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-34512463-2']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
  </head>
  <body>
	<div class="top">
		<div class="wrapper">
			<div class="navigation">
				<ul class="navigation_list">
					<li><a href="/index.php"><img class="rotatable" src="/img/header_news.png"></a></li>
					<li><a href="/group.php"><img class="rotatable" src="/img/header_group.png"></a></li>
					<li><a href="/music.php"><img class="rotatable" src="/img/header_creative.png"></a></li>
					<li><a href="/contacts.php"><img class="rotatable" src="/img/header_contacts.png"></a></li>
				</ul>
			</div>			
			<div class="header">
			</div>
							
		<br>
		
		<div class="news_left">
		<?php
			$con=mysqli_connect("mysql.hostinger.ru", "u211433583_admin", "123456", "u211433583_admin");

			$sql="SELECT * FROM news ORDER BY id DESC";

			$result=mysqli_query($con,$sql);
			
			if($result === FALSE) {
				die(mysql_error()); // TODO: better error handling
			}
			
			while($row = mysqli_fetch_array($result))
				{	
					echo "<span class='date'>".$row['date']."</span><h4 id='title".$row[id]."' class='pointerOnHover' onclick='fadeElement(".$row[id].")'> ".$row['title']."</h4>";
					echo "<div id='content".$row[id]."' class='tabText'><table border='0'><tbody><tr>";
					echo "<td><img src='".$row[image]."' align='top' height='150' width='100'></td>";
					echo "<td>".$row['text']."</td>";
					echo "</tr></tbody></table></div>";
					echo "<br>";
				}

			mysqli_close($con);
		
		?>
		
		</div>
		<div class="news_right">
			<a class="side_links" href="https://www.facebook.com/Symphodia"><img src="/img/facebook.jpg"></a>
			<a class="side_links" href="http://vk.com/symphodia"><img src="/img/vk.jpg"></a>
			<a class="side_links" href="http://www.youtube.com/channel/UC1r86CtOd26L3W25jaDKEog"><img src="/img/youtube.jpg"></a>
		</div>
		<div class="footer">
		</div>
		</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
  </body>
</html>