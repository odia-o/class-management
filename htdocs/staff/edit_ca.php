<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("../login.php");
}
$message = array();
if(isset($_POST['submit'])) {

    $tmp = C_a::all_fields($_GET['c_id']);
    if(isset($_POST['quiz1'])){
        if($_POST['quiz1'] === '1' && isset($_POST['q1'])){
            $tmp->q1_size = $_POST['q1'];
            $tmp->quiz1 = $_POST['quiz1'];
        }
    }
    else {
            $tmp->q1_size = '0';
            $tmp->quiz1 = '0';
        }
    
    if(isset($_POST['quiz2'])){
        if($_POST['quiz2'] === '1' && isset($_POST['q2'])){
            $tmp->q2_size = $_POST['q2'];
            $tmp->quiz2 = $_POST['quiz2'];
        }
    }
    else {
            $tmp->q2_size = '0';
            $tmp->quiz2 = '0';
        }
    
    if(isset($_POST['assignment1'])){
        if($_POST['assignment1'] === '1' && isset($_POST['a1'])){
            $tmp->a1_size = $_POST['a1'];
            $tmp->assignment1 = $_POST['assignment1'];
        }
    }
    else {
            $tmp->a1_size = '0';
            $tmp->assignment1 = '0';
        }
    
    if(isset($_POST['assignment2'])){
        if($_POST['assignment2'] === '1' && isset($_POST['a2'])){
            $tmp->a2_size = $_POST['a2'];
            $tmp->assignment2 = $_POST['assignment2'];
        }
    }
    else {
            $tmp->a2_size = '0';
            $tmp->assignment2 = '0';
        }
    
    if(isset($_POST['project1'])){
        if($_POST['project1'] === '1' && isset($_POST['p1'])){
            $tmp->p1_size = $_POST['p1'];
            $tmp->project1 = $_POST['project1'];
        }
    }
    else {
            $tmp->p1_size = '0';
            $tmp->project1 = '0';
        }
    
    if(isset($_POST['project2'])){
        if($_POST['project2'] === '1' && isset($_POST['p2'])){
            $tmp->p2_size = $_POST['p2'];
            $tmp->project2 = $_POST['project2'];
        }
    }
    else {
            $tmp->p2_size = '0';
            $tmp->project2 = '0';
        }
    
    if(isset($_POST['attendance'])){
        if($_POST['attendance'] === '1' && isset($_POST['at'])){
            $tmp->at_size = $_POST['at'];
            $tmp->attendance = $_POST['attendance'];
        }
    }
    else {
            $tmp->at_size = '0';
            $tmp->attendance = '0';
        }
    
    if(isset($_POST['mid_sem'])){
        if($_POST['mid_sem'] === '1' && isset($_POST['mi'])){
            $tmp->mi_size = $_POST['mi'];
            $tmp->mid_sem = $_POST['mid_sem'];
        }
    }
    else {
            $tmp->mi_size = '0';
            $tmp->mid_sem = '0';
        }
    
    if(isset($_POST['exam'])){
        if($_POST['exam'] === '1' && isset($_POST['ex'])){
            $tmp->ex_size = $_POST['ex'];
            $tmp->exam = $_POST['exam'];
        }
    }
    else {
            $tmp->ex_size = '0';
            $tmp->exam = '0';
        }

    if((!$tmp->save()) && !empty($tmp->e)){
                                $message[] = $tmp->e;
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
                                                <th>Fields</th>
                                                <th>Current Size</th>
                                                <th>&nbsp;</th>
                                                <th>Size</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Fields</th>
                                                <th>Current Size</th>
                                                <th>&nbsp;</th>
                                                <th>Size</th>
                                            </tr>
                                            
                                        </tfoot>
                                        <tbody>
                                            
                                            <?php 
                                             $all_fields = C_a::all_fields($_GET['c_id']);
                                            
                                            if($all_fields){
                                                
                                            
                                                

                                                        echo "<tr>";
                                                        echo "<td>Quiz 1</td>";?>
                                                        <td><?php echo $all_fields->q1_size; ?></td>
                                                        <td><input type='checkbox' name='quiz1' value='1'/></td>
                                                        <td><input type='text' size=2 name='q1' value='' /></td><?php
                                                        echo "</tr>";
                                                
                                                        echo "<tr>";
                                                        echo "<td>Quiz 2</td>";?>
                                                        <td><?php echo $all_fields->q2_size; ?></td>
                                                        <td><input type='checkbox' name='quiz2' value='1' /></td>
                                                        <td><input type='text' size=2 name='q2' value='' /></td><?php
                                                        echo "</tr>";
                                                
                                                        echo "<tr>";
                                                        echo "<td>Assignment 1</td>";?>
                                                        <td><?php echo $all_fields->a1_size; ?></td>
                                                        <td><input type='checkbox' name='assignment1' value='1' /></td>
                                                        <td><input type='text' size=2 name='a1' value='' /></td><?php
                                                        echo "</tr>"; 
                                                
                                                        echo "<tr>";
                                                        echo "<td>Assignment 2</td>";?>
                                                        <td><?php echo $all_fields->a2_size; ?></td>
                                                        <td><input type='checkbox' name='assignment2' value='1' /></td>
                                                        <td><input type='text' size=2 name='a2' value='' /></td><?php
                                                        echo "</tr>"; 
                                                
                                                        echo "<tr>";
                                                        echo "<td>Attendance</td>";?>
                                                        <td><?php echo $all_fields->at_size; ?></td>
                                                        <td><input type='checkbox' name='attendance' value='1' /></td>
                                                        <td><input type='text' size=2 name='at' value='' /></td><?php
                                                        echo "</tr>";
                                                
                                                        echo "<tr>";
                                                        echo "<td>Project 1</td>";?>
                                                        <td><?php echo $all_fields->p1_size; ?></td>
                                                        <td><input type='checkbox' name='project1' value='1' /></td>
                                                        <td><input type='text' size=2 name='p1' value='' /></td><?php
                                                        echo "</tr>";
                                                
                                                        echo "<tr>";
                                                        echo "<td>Project 2</td>";?>
                                                        <td><?php echo $all_fields->p2_size; ?></td>
                                                        <td><input type='checkbox' name='project2' value='1' /></td>
                                                        <td><input type='text' size=2 name='p2' value='' /></td><?php
                                                        echo "</tr>";
                                                
                                                        echo "<tr>";
                                                        echo "<td>Mid Sem</td>";?>
                                                        <td><?php echo $all_fields->mi_size; ?></td>
                                                        <td><input type='checkbox' name='mid_sem' value='1' /></td>
                                                        <td><input type='text' size=2 name='mi' value='' /></td><?php
                                                        echo "</tr>";
                                                
                                                        echo "<tr>";
                                                        echo "<td>Exam</td>";?>
                                                        <td><?php echo $all_fields->ex_size; ?></td>
                                                        <td><input type='checkbox' name='exam' value='1' /></td>
                                                        <td><input type='text' size=2 name='ex' value='' /></td><?php
                                                        echo "</tr>";
                                                
                                                

                                                    
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