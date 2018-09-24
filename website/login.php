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

  if(isset($_POST['submit']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $sql = "select * from users where name='$username' and password='$password'";

    if ($result=mysqli_query($conn,$sql))
      {
        $user_id=$result['user_id'];
        $rowcount=mysqli_num_rows($result);
        if($rowcount == 1)
        {
          setcookie('user_id',$user_id,time()+60*60*7);
          session_start();
          $_SESSION['user_id']=$user_id;
          header("Location:/website/index.html");
        }
        else {
          header("Location:/website/login.html");
        }
      }

  }

$conn->close();

?>
