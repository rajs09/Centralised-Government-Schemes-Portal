<?php
/*<head>Choose the filter:</head>
  <form class="main_form">

        By Gender:
  <select class="by_gender" name="gender">
  <option value="NULL">Null
  </option>
  </select>

*/

$username="root";
$password="";
$servername="localhost";
$db_name="tsechack";

$conn=mysqli_connect($servername,$username,$password,$db_name);
/*
if(!$conn)
{
	die("Connection Failed".mysqli_connect_error());
}
echo "Connection Successful"."<br>";

$query = "select * from  images where id=2";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result))
{
  echo '
    <tr>
      <td>
      <img src="data:image/jpeg'.base64_decode($row['name']).'"/>
      </td>
    </tr>
  ';
}

  // do some validation here to ensure id is safe

  $username="root";
  $password="";
  $servername="localhost";
  $db_name="tsechack";

  $conn=mysqli_connect($servername,$username,$password,$db_name);
  */
  $sql = "SELECT image FROM images WHERE id='2'";

  $result = mysqli_query($conn,$sql);


  while($row = mysqli_fetch_row($result))
  {
    echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['0'] ).'"/>';
  }
/*
  if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();

        //Render image
        #echo $imgData['image'];
          echo '<img height="300" width="300" src="data:image,.$row[].">';
      }
      */
/*
      $query = "SELECT * FROM image WHERE id = '2'";
      $sth = $conn->query($query);
      $fetch=$sth->fetch_assoc();
      */
?>
