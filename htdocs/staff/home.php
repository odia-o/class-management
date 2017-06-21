<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("../login.php");
}
include_layout_template("header.html");
?>
<li class="active"><a href="home.php" class="waves-effect waves-button"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li><a href="all_courses.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>All Courses</p></a></li>
                        <li><a href="attendance.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-edit"></span><p>Attendance</p></a></li>
                        <li><a href="student_scores.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Student Scores</p></a></li>

                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Dashboard</h3>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                    
                    <div class="row">
                        
                   

                         <div class="col-md-6">
                            <div class="panel panel-red">
                                <a href="attendance.php">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Mark Attendance</h3>
                                </div>
                                <div class="panel-body">
                                    <p>Select Course</p>
                                </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="panel panel-white">
                                <a href="all_courses.php">
                                <div class="panel-heading">
                                    <h3 class="panel-title">List all courses</h3>
                                </div>
                                <div class="panel-body">
                                    <p>All your courses</p>
                                </div>
                                </a>
                            </div>
                        </div>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                            <div class="panel panel-yellow">
                                <a href="student_scores.php">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Edit student scores</h3>
                                </div>
                                <div class="panel-body">
                                    <p>Update C.A</p>
                                </div>
                                </a>
                            </div>
                        </div>
                               <?php
                          include_layout_template("footer.html");
                              ?>