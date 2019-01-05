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


  $username = $_POST['username'];
  $password = $_POST['password'];
  $password = md5($password);
  $phoneno = $_POST['phoneno'];
  $aadhaarno = $_POST['aadhaarno'];


print_r($aadhaarno);
print_r($phoneno);

$sql = "insert into users(id,name,password,phoneno,aadhaarno) values('','$username','$password','$phoneno','$aadhaarno')";
#$result = mysqli_query($conn,$sql);
if ($conn->query($sql) === TRUE) {
    header("Location:./index.html");
    #echo "Successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
