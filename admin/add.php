<?php
$con=mysqli_connect("mysql.hostinger.ru", "u211433583_admin", "123456", "u211433583_admin");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Save_failed";
  }

$date = date("Y-m-d");
if ($_POST["table"] == "news") {
	$sql="INSERT INTO $_POST[table] (title, date, text, image)
	VALUES
	('$_POST[title]','$date','$_POST[text]', '$_POST[image]')";
} else if ($_POST["table"] == "music") {
	$sql="INSERT INTO $_POST[table] (title, album_id, content, file)
	VALUES
	('$_POST[title]','$_POST[album_id]','$_POST[text]', '$_POST[file]')";
}
 

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  echo "Save_failed";
  }
echo "Success!";

mysqli_close($con);
?>