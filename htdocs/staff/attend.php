<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("../login.php");
}
include_layout_template("header.html");
?>
<li><a href="home.php" class="waves-effect waves-button"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li><a href="all_courses.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>All Courses</p></a></li>
                        <li class="active"><a href="attendance.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-edit"></span><p>Attendance</p></a></li>
                        <li><a href="student_scores.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Student Scores</p></a></li>

                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Attendance</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Attendance</h3>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                    
                    <div class="row">
                        
                   

                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Courses</h4>
                                     <div class="panel-body">
                                  
                                </div>
                                </div>
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">My Courses</h4>
                                </div> 
                                <div class="panel-body">
                                   <div>
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Matric Number</th>
                                                <th>Gender</th>
                                                <?php
                                                $all_fields = C_a::all_fields($_GET['c_id']);
                                                for($i = 1; $i <= $all_fields->at_size; $i++){
                                                    echo "<th>$i</th>";
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Full Name</th>
                                                <th>Matric Number</th>
                                                <th>Gender</th>
                                                <?php
                                                for($i = 1; $i <= $all_fields->at_size; $i++){
                                                    echo "<th>$i</th>";
                                                }
                                                ?>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                             $all_students = Student_course::all_students($_GET['c_id']);
                                            if($all_students){
                                                
                                            
                                                $count = 1;

                                                    foreach($all_students as $student) {
                                                        $c = Student::find_by_id($student->student_id);
                                                        $re = Attendance::find($_GET['c_id'], $student->student_id);
//                                                        var_dump($re);
//                                                        exit();


                                                        echo "<tr><td>".$count." </td>";
                                                        echo "<td>".$c->matric_no ." </td>";
                                                        echo "<td>".$c->last_name. " ".$c->first_name . "</td>";
                                                        echo "<td>". $c->gender. "</td>";
                                                        foreach($re as $r => $l){?>
                                                        <th><input type='checkbox' name="<?php echo "$r" ?>"/></th>
                                                       <?php }
                                                        echo "</tr>";
                                                        $count = $count + 1;
                                                    }
                                            }
                                            ?>
                                            
                                        </tbody>
                                       </table>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    
 <?php
                          include_layout_template("footer.html");
                              ?>