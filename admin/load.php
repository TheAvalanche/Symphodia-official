<?php
$q=$_POST["id"];
$table=$_POST["table"];

$con=mysqli_connect("mysql.hostinger.ru", "u211433583_admin", "123456", "u211433583_admin");

$sql="SELECT * FROM ".$table." WHERE id = '".$q."'";

$result=mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
  {
  if ($table == "news") {
    echo $row['id'];
	echo "//-//";
	echo $row['title'];
	echo "//-//";
	echo $row['text'];
	echo "//-//";
	echo $row['image'];
  } else if ($table == "music") {
    echo $row['id'];
	echo "//-//";
	echo $row['album_id'];
	echo "//-//";
	echo $row['title'];
	echo "//-//";
	echo $row['content'];
	echo "//-//";
	echo $row['file'];
  }

  }


mysqli_close($con);
?>