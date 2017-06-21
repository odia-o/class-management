<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("../login.php");
}


include_layout_template("header.html");
?>
<li><a href="home.php" class="waves-effect waves-button"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li class="active"><a href="all_courses.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>All Courses</p></a></li>
                        <li><a href="register.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-edit"></span><p>Register for Courses</p></a></li>

                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Scores</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Continous Assesment</h3>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                    
                    <div class="row">


                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">Scores</h4>
                                     <div class="panel-body">
                                  
                                </div>
                                </div>
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">The Scores</h4>
                                </div> 
                                <div class="panel-body">
                                   <div>
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
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
                                                
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <?php
                                                foreach($arr as $k => $t){
                                                    echo "<th>$k($t)</th>";
                                                }
                                                ?>
                                                
                                            </tr>
                                            
                                        </tfoot>
                                        <tbody>
                                            
                                            <?php 
                                             
                                                   $rec = Record::find_record($_GET['c_id'], $session->id);
                                                    
                                                    echo "<tr>";
                                                    foreach($arr as $k => $t){
                                                            $y = substr($k, 0,2);
                                                            if($k === "quiz1"){$y = 'q1';}
                                                            if($k === "quiz2"){$y = 'q2';}
                                                            if($k === "assignment1"){$y = 'a1';}
                                                            if($k === "assignment2"){$y = 'a2';}
                                                            if($k === "project1"){$y = 'p1';}
                                                            if($k === "project2"){$y = 'p2';}
                                                            
                                                            echo "<td>{$rec->{$k}}</td>";
                                                        }
                                                    echo "</tr>";
                                                    
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