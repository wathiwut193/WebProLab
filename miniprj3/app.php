<?php
    //include("db.php");
    $con=mysqli_connect("localhost", "it58160638", "elementzeed", "it58160638"); 
    $data=json_decode(file_get_contents("php://input"));

    if(count($data)>0){
      $code = mysqli_real_escape_string($con,$data->code);
      $query="insert into Appointment(code) values('$code')";
      if(mysqli_query($con,$query)){
        echo "Data Inserted";
      }
      else{
        echo "Error";
      }
    }

?>