<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("../login.php");
}
$message = array();
if(isset($_POST['submit'])) {
                foreach($_POST as $key=>$val){
                    if(strlen($key) == 3) {
                        $k = substr($key, 0,2);
                        $s_id = substr($key, -1, 1);
                        $tmp = Record::find_record($_GET['c_id'], $s_id);
                        
                        $c = Student::find_by_id($s_id);
                        if($k === "q1"){
                            $tmp->quiz1 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "q2"){
                            $tmp->quiz2 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "a1"){
                            $tmp->assignment1 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "a2"){
                            $tmp->assignment2 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "p1"){
                            $tmp->project1 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "p2"){
                            $tmp->project2 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "mi"){
                            $tmp->mid_sem = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "ex"){
                            $tmp->exam = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                    }
                    elseif(strlen($key) == 4) {
                        $k = substr($key, 0,2);
                        $s_id = substr($key, -1, 1);
                        $tmp = Record::find_record($_GET['c_id'], $s_id);
                        if($k === "q1"){
                            $tmp->quiz1 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "q2"){
                            $tmp->quiz2 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "a1"){
                            $tmp->assignment1 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "a2"){
                            $tmp->assignment2 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "p1"){
                            $tmp->project1 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "p2"){
                            $tmp->project2 = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "mi"){
                            $tmp->mid_sem = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                        elseif($k === "ex"){
                            $tmp->exam = $val;
                            if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e." for ".$c->matric_no;
                            }
                        }
                    }
                }
            }
include_layout_template("header.html");
?>
<li><a href="home.php" class="waves-effect waves-button"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li><a href="all_courses.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>All Courses</p></a></li>
                        <li><a href="attendance.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-edit"></span><p>Attendance</p></a></li>
                        <li class="active"><a href="student_scores.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Student Scores</p></a></li>

                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Student Scores</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Scores</h3>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                    
                    <div class="row">


                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">The Scores</h4>
                                    
                                </div>
                                <div>
                                <p><?php $msg = "";if(isset($message)){foreach($message as $m){$msg .= $m."<br>";}}echo output_message($msg); ?></p>
                                </div>
                                <form method="post">
                                <div class="panel-body">
                                   <div>
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Matric Number</th>
                                                <?php $all_fields = C_a::all_fields($_GET['c_id']);
                                                $arr = array();
                                                if($all_fields->quiz1 == '1'){
                                                    $arr['quiz1'] = $all_fields->q1_size;
                                                }
                                                if($all_fields->quiz2 == '1'){
                                                    $arr['quiz2'] = $all_fields->q2_size;
                                                }
                                                if($all_fields->assignment1 == '1'){
                                                    $arr['assignment1'] = $all_fields->a1_size;
                                                }
                                                if($all_fields->assignment2 == '1'){
                                                    $arr['assignment2'] = $all_fields->a2_size;
                                                }
                                                if($all_fields->project1 == '1'){
                                                    $arr['project1'] = $all_fields->p1_size;
                                                }
                                                if($all_fields->project2 == '1'){
                                                    $arr['project2'] = $all_fields->p2_size;
                                                }
                                                if($all_fields->attendance == '1'){
                                                    $arr['attendance'] = $all_fields->at_size;
                                                }
                                                if($all_fields->mid_sem == '1'){
                                                    $arr['mid_sem'] = $all_fields->mi_size;
                                                }
                                                if($all_fields->exam == '1'){
                                                    $arr['exam'] = $all_fields->ex_size;
                                                }
                                                if($all_fields->total){
                                                    $arr['total'] = $all_fields->total;
                                                }
                                                
//                                                var_dump($arr);
//                                                exit();
                                                
                                                foreach($arr as $k => $t){
                                                    echo "<th>$k($t)</th>";
                                                }
                                                ?>
                                                
<!--
                                                <th>Quiz 1(5)</th>
                                                <th>Quiz 2(5)</th>
                                                <th>Assignment(5)</th>
                                                <th>Project(15)</th>
                                                <th>Mid-Sem(15)</th>
                                                <th>Attendance(5)</th>
                                                <th>Exam(50)</th>
                                             <th>Total(100)</th>
-->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Matric Number</th>
                                                <?php
                                                foreach($arr as $k => $t){
                                                    echo "<th>$k($t)</th>";
                                                }
                                                ?>
<!--
                                               
                                                <th>Quiz 1(5)</th>
                                                <th>Quiz 2(5)</th>
                                                <th>Assignment(5)</th>
                                                <th>Project(15)</th>
                                                <th>Mid-Sem(15)</th>
                                                <th>Attendance(5)</th>
                                                <th>Exam(50)</th>
                                              <th>Total(100)</th>
-->
                                            </tr>
                                            
                                        </tfoot>
                                        <tbody>
                                            
                                            <?php 
                                             $all_students = Student_course::all_students($_GET['c_id']);
                                            if($all_students){
                                                
                                            
                                            
                                                $count = 1;

                                                    foreach($all_students as $student) {
                                                        $c = Student::find_by_id($student->student_id);
                                                       $rec = Record::find_record($_GET['c_id'], $c->id);

                                                        echo "<tr><td>".$count." </td>";
                                                        echo "<td>".$c->matric_no ." </td>";
                                                        foreach($arr as $k => $t){
                                                            $y = substr($k, 0,2);
                                                            if($k === "quiz1"){$y = 'q1';}
                                                            if($k === "quiz2"){$y = 'q2';}
                                                            if($k === "assignment1"){$y = 'a1';}
                                                            if($k === "assignment2"){$y = 'a2';}
                                                            if($k === "project1"){$y = 'p1';}
                                                            if($k === "project2"){$y = 'p2';}
                                                            
                                                            echo "<td><input type='text' size=2 name='{$y}{$c->id}' value='". $rec->{$k}. "' /></td>";
                                                        }
//                                                        echo "<td><input type='text' size=2 name='q1{$c->id}' value='". $rec->quiz1. "' /></td>";
//                                                        echo "<td><input type='text' size=2 name='q2{$c->id}' value='". $rec->quiz2. "' /></td>";
//                                                        echo "<td><input type='text' size=2 name='as{$c->id}' value='". $rec->assignment. "' /></td>";
//                                                        echo "<td><input type='text' size=2 name='pr{$c->id}' value='". $rec->project. "' /></td>";
//                                                        echo "<td><input type='text' size=2 name='mi{$c->id}' value='". $rec->mid_sem. "' /></td>";
//                                                        echo "<td>". $rec->attendance. "</td>";
//                                                        echo "<td><input type='text' size=2 name='ex{$c->id}' value='". $rec->exam. "' /></td>";
                                                       echo "</tr>";

                                                        $count = $count + 1;
                                                    }
                                            }
                                            
                                            ?>
                                            
                                        </tbody>
                                       </table>  
                                       
                                    </div>
                                </div>
                                    <input type="submit" name="submit" value="Update" class="btn btn-success" />
                                </form>
                            </div>
                        </div>
                    <?php
                          include_layout_template("footer.html");
                              ?>