<?php
$username="root";
$password="";
$servername="localhost";
$db_name="tsechack";

$conn=mysqli_connect($servername,$username,$password,$db_name);

if(!$conn)
{
	die("Connection Failed".mysqli_connect_error());
}
echo "Connection Successful"."<br>";

if(isset($_POST['submit']))
{
	$imageName = $_POST['file_name'];
	print_r($imageName);
	#$imageName = $_FILES["image"]["name"];
	$imageData = file_get_contents($_FILES["image"]["tmp_name"]);
	$imageData = base64_encode($imageData);
	$imageType = ($_FILES["image"]["type"]);
	$sql = "insert into images(id,name,image,type) values('','$imageName','$imageData','$imageType')";

	if(substr($imageType,0,5) == "image")
	{
		if ($conn->query($sql) === TRUE)
		{
		    echo "New record created successfully";
				echo "Image Uploaded";

		}
		else
		{
		    echo "Error! "."<br>" . $conn->error;
		}
	}
	else {
		echo "Only images are allowed!";
}
}
