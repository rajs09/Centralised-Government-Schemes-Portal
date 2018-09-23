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


  $username = $_POST['username'];
  #print_r($username);
  $password = $_POST['password'];
  $password = md5($password);
  print_r($password);
  $sql = "select * from users where name='$username' and password='$password'";

  if ($result=mysqli_query($conn,$sql))
    {
      print_r($result);
    // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
  #    print_r($rowcount);

      if($rowcount == 1)
      {
        header("Location:/image/index.html");
      }
      else {
        header("Location:/image/login.html");
      }
    }


$conn->close();

?>
