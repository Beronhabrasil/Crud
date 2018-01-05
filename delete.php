<?php

$id = $_POST['id'];

include_once 'DB.php';


$mysqli = new DB();
var_dump($mysqli);

        
 $mysqli->GetConn()->query("DELETE FROM `tblkunden` WHERE id='$id'");


 
 

 
   

         
         
         

 
 

