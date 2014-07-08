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
		
		<div class="album">
			<?php
				$id = $_GET["id"];
				$con=mysqli_connect("mysql.hostinger.ru", "u211433583_admin", "123456", "u211433583_admin");

				$sql="SELECT * FROM albums WHERE id='".$id."'";

				$result=mysqli_query($con,$sql);
				
				while($row = mysqli_fetch_array($result))
					{	
						echo "<h2>".$row['name']."</h2>";
						echo "<hr><br>";
						echo "<table border='0' class='album_table'>
								<tbody>
									<tr>
										<td>";
									echo "<img src='".$row['image']."' align='top' height='300' width='300' style='border: 1px solid grey;'>
										</td>";
									echo "<td class='album_description'>".$row['description']."</td>
									</tr>
								</tbody>
							</table>";
					}
					
				$sql="SELECT * FROM music WHERE album_id='".$id."' ORDER BY id ASC";

				$result=mysqli_query($con,$sql);
				echo "<br><hr>";
				echo "<ol>";
				while($row = mysqli_fetch_array($result))
					{	
						echo "<li class='pointerOnHover' onclick='fadeElement(".$row[id].")'><b>".$row['title']."</b></li>";
						echo "<div id='content".$row[id]."' class='hidden'><br>".$row['content']."<br><br></div>";
						echo "<audio src='".$row['file']."' type='audio/mp3' controls='controls'></audio>";
					}
				echo "</ol>";
			
				mysqli_close($con);
			?>
			
		</div>

		<div class="footer">
		</div>
		</div>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
  </body>
</html>