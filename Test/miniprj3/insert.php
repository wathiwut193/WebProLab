<?php
$con=mysqli_connect("localhost","it58160426","it58160426","it58160426");
$con->query("SET NAMES UTF8");
$data=json_decode(file_get_contents("php://input"));
if(count($data)>0){
  $Code=mysqli_real_escape_string($con,$data->Code);
  $nameAppoint=mysqli_real_escape_string($con,$data->nameAppoint);
  $committee=mysqli_real_escape_string($con,$data->committee);
  $datestart=mysqli_real_escape_string($con,$data->datestart);
  $dateend=mysqli_real_escape_string($con,$data->dateend);
   $link=mysqli_real_escape_string($con,$data->link);
  
  if($datestart != null && $dateend == null){
    $query="insert into command(Code,nameAppoint,committee,datestart,dateend,status,link) values('$Code','$nameAppoint','committee','$datestart','$dateend','A','$link')";
    if(mysqli_query($con,$query)){
      echo "Data Inserted";
    }else{
      echo "Error";
    }
  }else{
    $query="insert into command(Code,nameAppoint,committee,datestart,dateend,status,link) values('$Code','$nameAppoint','$committee','$datestart','$dateend','X','$link')";
    if(mysqli_query($con,$query)){
      echo "Data Inserted";
    }else{
      echo "Error";
    }
  } 
}
?>
