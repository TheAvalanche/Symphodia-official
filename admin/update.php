<?php
$con=mysqli_connect("mysql.hostinger.ru", "u211433583_admin", "123456", "u211433583_admin");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Save_failed";
  }
    
$date = date("Y-m-d");
if ($_POST["table"] == "news") {
	if ($_POST["delete"] != "true"){
		$sql="UPDATE $_POST[table] SET title='$_POST[title]', text='$_POST[text]', image='$_POST[image]' WHERE id='$_POST[id]'";
	} else {
		$sql="DELETE FROM $_POST[table] WHERE id='$_POST[id]'";
	}
} else if ($_POST["table"] == "music") {
	if ($_POST["delete"] != "true"){
		$sql="UPDATE $_POST[table] SET album_id='$_POST[album_id]', title='$_POST[title]', content='$_POST[text]', file='$_POST[file]' WHERE id='$_POST[id]'";
	} else {
		$sql="DELETE FROM $_POST[table] WHERE id='$_POST[id]'";
	}
}


if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  echo "Save_failed";
  }

echo "Success!";

mysqli_close($con);
?>