<?php




$kname="";
$kdvname ="";
$kdstrasse ="";
 $kdplz ="";
 $kdorte ="";
  
$kname = $_POST['kdname'];
$kdvname = $_POST['kdvname']; 
$kdstrasse = $_POST['kdstrasse'];
$kdplz = $_POST['kdplz'];
$kdort = $_POST['kdort'];

include_once 'DB.php';

$db = new DB();



if ($db->connect_error) {
    die('Error : ('. $db->connect_errno .') '. $db->connect_error);
}else{    echo 'connected';}
 
 $insert  = $db->query("INSERT INTO tblkunden(`kdname`, `kdvname`, `kdstrasse`, `kdplz`, `kdort`)VALUES('$kname', '$kdvname', '$kdstrasse', '$kdplz','$kdort')");  
   

 if($insert){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />';
}else{
    die('Error : ('. $db->errno .') '. $db->error);
}
 
 


 




//"tblkunden",$_POST['kdname'],$_POST['kdvname'] ,$_POST['kdstrasse'] , $_POST['kdplz']