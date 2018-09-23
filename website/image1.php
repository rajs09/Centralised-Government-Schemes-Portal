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
  $file = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.',$filename);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png','pdf');

  if(in_array($fileActualExt,$allowed))
  {
    if($fileError == 0)
    {
      if($fileSize<1000000)
      {
        $fileNameNew = uniqid('',true).".".$fileActualExt;
        $fileDestination = './uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName,$fileDestination);
        header("Location:index.php?uploadsuccess");
      }
      else {
        echo "Your file is too big";
      }
    }
    else{
      echo "There was an error while uploading the file.";
    }
  }
  else {
    echo "You can't upload this file";
    }

}
/*
$imagename=$_FILES["myimage"]["name"];

//Get the content of the image and then add slashes to it
$imagetmp=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO images VALUES('$imagetmp','$imagename')";


if (mysqli_query($conn,$insert_image)){
						 echo "Records inserted successfully.";
	}
	else
	{
			echo "ERROR: Could not able to execute. ".$conn->error;
	}
$conn->close();*/
?>
