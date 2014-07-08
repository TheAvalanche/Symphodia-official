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
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet" media="screen">
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
	<!--Editor-->
	<link rel="stylesheet" type="text/css" href="/libs/css/bootstrap-wysihtml5.css"></link>
	<script src="/libs/js/wysihtml5-0.3.0.js"></script>
	<script src="/libs/js/bootstrap-wysihtml5.js"></script>
	
	<!--Form submit-->
	<script>
	function processForm() {
		 var errors = '';
	     // Validate header
		 var name = $("#add-form [name='title']").val();
		 if (!name) {
		  errors += ' - А ну ввели заголовок!!!\n';
		 }
		 // Validate content
		 var age_range = $("#add-form [name='text']").val();
		 if (!age_range) {
		  errors += ' - А ну ввели текст!!!\n';
		 }
		 // Validate image
		 var age_range = $("#add-form [name='image']").val();
		 if (!age_range) {
		  errors += ' - А ну ввели ссылку на картинку!!!\n';
		 }
		 
		 if (errors) {
		  errors = 'Вы совсем офигели?\n' + errors;
		  alert(errors);
		  return false;
		 } else {
		  $.ajax({
			type: "POST",
			url: "add.php",
			data: $('form#add-form').serialize(),
			success: function(data) {
				 if (data == 'save_failed') {
				  alert('Обломитесь, ничего не сохранилось!');
				  return false;
				 } else {
				  alert('Черт, вам удалось сохранить все данные...');
				  window.location.reload();
				  return false;
				 }
			}
		  
		  });
		  return false;
		 }
	 
	}
	</script>
	<script>
	function updateDeleteForm(deleteForm) {

			document.getElementById('update-delete').value="false";
			if (deleteForm == "true") {
				if(!confirm("Вы действительно хотите спасти мир, удалив эту запись?")) {
					document.getElementById('update-delete').value='false';
					return false;
				} else {
					document.getElementById('update-delete').value='true';
				}
			}
			$.ajax({
				type: "POST",
				url: "update.php",
				data: $('form#update-form').serialize(),
				success: function(data) {
					if (data == 'save_failed') {
					  alert('Обломитесь, ничего не сохранилось!');
					  return false;
					} else {
					  alert('Черт, вам удалось сохранить все данные...');
					  window.location.reload();
					  return false;
					}
				}
			});
			return false;
		}
	</script>
	
	<!--Fill form-->
	<script>
	function fillForm(str) {
		if (str == "") {
			return false;
		}
		$.ajax({
			type: "POST",
			url: "load.php",
			data: {id: str, table: "news"},
			success: function(data) {
				var pieces = data.split('//-//');
								
				var id = pieces[0];
				var title = pieces[1];
				var content = pieces[2];
				var image = pieces[3];

				document.getElementById('update-id').value=id;
				document.getElementById('update-title').value=title;

				var $ta = $('textarea#update-text');
				var w5ref = $ta.data('wysihtml5');
				if(w5ref){
				   w5ref.editor.setValue(content);
				} else {
				   $ta.html(content);
				}
				
				document.getElementById('update-image').value=image;
				
				document.getElementById('update-button').disabled = false;
				document.getElementById('delete-button').disabled = false;
			}
		});
	}
	</script>
	
	<!--Hide divs-->
	<script>
		function hideDiv(str1, str2) {
			document.getElementById('add-div').hidden = true;
			document.getElementById('update-div').hidden = true;
			document.getElementById('add-href').setAttribute("class", "");
			document.getElementById('update-href').setAttribute("class", "");
			document.getElementById(str1).hidden = false;
			document.getElementById(str2).setAttribute("class", "active");
		}
	</script>

  </head>
  <body>
	<div class="row" style="background-color:#eeeeee;border-bottom: solid 1px">
		<div style="float:right;">
			<a class="btn btn-primary" href="logout.php">Выйти</a>
		</div>
	</div>
	<ul class="nav nav-tabs">
		<li class="active">
			<a href="#">Новости</a>
		</li>
		<li>
			<a href="admin_music.php">Музыка</a>
		</li>
		<li>
			<a href="admin_about.php">О нас</a>
		</li>
	</ul>

	<div class="container">
		<ul class="nav nav-pills">
			<li id="add-href" class="active">
				<a href="#" onclick="hideDiv('add-div', 'add-href')">Добавить</a>
			</li>
			<li id="update-href"><a href="#" onclick="hideDiv('update-div', 'update-href')">Обновить</a></li>
		</ul>
		
		<div id="add-div">
		<h3>Добавить новую запись.</h3>
		<form id="add-form" action="add.php" method="post">
		<div class="hero-unit">
			<input id="add-news" type="hidden" name="table" value="news">
			<input id="add-title" type='text' name="title" placeholder="Название, чтоб дальше уже читать не хотелось." style="width: 500px;">
			<textarea id="add-text" name="text" placeholder="Сюда писать все свои грязные мысли..." style="width: 810px; height: 400px"></textarea>
			<input id="add-image" type='text' name="image" placeholder="Ссылка на порнографию." style="width: 810px;">
			<button id="add-button" class="btn btn-success" type="button" onclick="processForm()">Поработить этот мир</button>
		</div>
		</form>
		</div>
		
		<div id = "update-div" hidden="true">
		<h3>Обновить существующую запись.</h3>
		<?php
			$con=mysqli_connect("mysql.hostinger.ru", "u211433583_admin", "123456", "u211433583_admin");
			// Check connection
			if (mysqli_connect_errno())
			  {
			  echo "Не могу подсоедениться к базе данных, хоть ты тресни.";
			  }

			$sql="SELECT id, date, title FROM news ORDER BY id DESC";
			$result=mysqli_query($con,$sql);
			if (!$result)
			  {
			  die('Error: ' . mysqli_error());
			  echo "Save_failed";
			  }
			else
			  {
			  echo "<select id=\"select_news\" name=\"news_history\" onchange=\"fillForm(this.value)\">";
			  echo "<option value=\"\">Выбери новость</option>";
			  while($row = mysqli_fetch_array($result))
				  {
				  echo "<option value=\"" . $row['id'] . "\">" . $row['date'] . " - " . $row['title'] . "</option>";
				  }
			  echo "</select>";
			  }

			mysqli_close($con);	
		?>
		<form id="update-form" action="update.php" method="post">
		<div class="hero-unit">
			<input id="update-news" type="hidden" name="table" value="news">
			<input id="update-delete" type="hidden" name="delete">
			<input id="update-id" type="hidden" name="id">
			<input id="update-title" type='text' name="title" placeholder="Название, чтоб дальше уже читать не хотелось." style="width: 500px;">
			<textarea id="update-text" name="text" placeholder="Сюда писать все свои грязные мысли..." style="width: 810px; height: 350px"></textarea>
			<input id="update-image" type='text' name="image" placeholder="Ссылка на порнографию." style="width: 810px;">
			<button id="update-button" class="btn btn-success" type="button" onclick="updateDeleteForm('false')" disabled="disabled">Поработить этот мир</button>
			<button id="delete-button" class="btn btn-danger" type="button" onclick="updateDeleteForm('true')" disabled="disabled">Спасти этот мир</button>
		</div>
		</form>
		</div>
	<script type="text/javascript">
			$('#add-text').wysihtml5();
			$('#update-text').wysihtml5();
	</script>
	</div>

	

  </body>
</html>