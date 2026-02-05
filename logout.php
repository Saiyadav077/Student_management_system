<?php 

session_start();
session_destroy();
if { (!isset ($session['username']))
header("location:login.php");
}
elseif($row["usertype"]=="admin) {
$session['username']=$name;
$session['usertype']='admin"


?>




