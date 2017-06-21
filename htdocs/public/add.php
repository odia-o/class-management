<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("login.php");
}
    
    $rec = new Student_course;
    $rec->student_id = $session->id;
    $rec->course_id = $_GET['c_id'];
    $rec->save();
    $tmp = new Record;
    $tmp->student_id = $session->id;
    $tmp->course_id = $_GET['c_id'];
    $tmp->quiz1 = 0;
    $tmp->quiz2 = 0;
    $tmp->assignment1 = 0;
    $tmp->assignment2 = 0;
    $tmp->project1 = 0;
    $tmp->project2 = 0;
    $tmp->attendance = 0;
    $tmp->mid_sem = 0;
    $tmp->exam = 0;
    $tmp->total = 0;
    $tmp->save();
        redirect_to("register.php?c_id=".$_GET['c_id']);
   
?>