<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}
    
    $rec = Record::find_record($_GET['c_id'], $_GET['s_id']);
    $rec->attendance += 1;
    $rec->save();
        redirect_to("attend.php?c_id=".$_GET['c_id']);
   
?>