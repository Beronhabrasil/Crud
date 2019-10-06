<?php
$kname="";
$kdvname ="";
$kdstrasse ="";
$kdplz ="";
$kdorte ="";
$id = $_POST['id'];
$kdname = $_POST['kdname'];
$kdvname = $_POST['kdvname'];
$kdstrasse = $_POST['kdstrasse'];
$kdplz = $_POST['kdplz'];
$kdort = $_POST['kdort'];

include_once 'DB.php';
$db = new DB();
$result1 = $db->query("UPDATE `tblkunden` SET `kdname`= '$kdname',kdvname ='$kdvname',kdstrasse='$kdstrasse',kdplz='$kdplz',kdort='$kdort'WHERE id='$id'");
print_r($result1);
