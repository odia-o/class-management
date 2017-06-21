<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}

if(empty($_GET['gg'])) {
    $session->message("No ID was provided.");
    redirect_to('login.php');
}

$d = new Approval();
   
$d->user_id = $_GET['gg'];
$d->staff_id = $session->id;
   
  if( $d->save()){
    redirect_to("list_customers.php?gg=".$_GET['gg']."&del=1");
}
   else{
    return false;
}
?>