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
      $search = $_POST['search'];
      $sql = "select * from scheme where scheme_name like '%$search%'";


      if ($result=mysqli_query($conn,$sql))
      {
            //print_r($result);
            //$_SESSION['username']= $username;
            //$_SESSION['user'] = $result;
            // Return the number of rows in result set
            //$rowcount=mysqli_num_rows($result);
            //$followingdata = $result->fetch_assoc();
            //while($followingdata)
            //{
            //  print_r($followingdata['scheme_name']);
            //}
            //$output = array();
            while ($row = $result->fetch_array()) {
              //print_r($row);

                print_r($row['scheme_name']);
                echo "<br>";
            }
            //$objSmarty->assign("result", $output);
            if(mysqli_num_rows($result) == 0)
            {
              echo "No Scheme found according to your requirements!";

            }
        }

  }

?>
