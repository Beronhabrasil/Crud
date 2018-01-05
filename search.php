
<?php

  
 
 include_once 'DB.php';

 

 $key = $_POST['key'];
 if(isset($key))
 {
   $db = new DB;
  

 $result =   $db->query("SELECT * from `tblkunden` WHERE `kdname` = '$key'")  ;  
foreach($result as $results)
  {
    
   
  echo  "<p>Name"."&nbsp;&nbsp". $results['kdname'];
  echo "<br />";
echo   "Nachname"." &nbsp;&nbsp".$results['kdvname']  ; 
  }
     
 }
 else{ echo 'not found';} 
 
 
 
   
 














          
          
          
          
          
  






  