<?php
require_once("../../includes/initialize.php");
if(!$session->is_logged_in()) {
    redirect_to("../login.php");
}
include_layout_template("header.html");
?>
<li><a href="home.php" class="waves-effect waves-button"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
                        <li><a href="all_courses.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>All Courses</p></a></li>
                        <li class="active"><a href="register.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-edit"></span><p>Register for Courses</p></a></li>

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
                        <h3>Courses</h3>
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
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Units</th>
                                                <th>Description</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Course Title</th>
                                                <th>Units</th>
                                                <th>Description</th>
                                                <th>&nbsp;</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                             $all_courses = Course::find_all();
                                
                                                foreach($all_courses as $c) {
                                                    
                                                   
                                                    
                                                    echo "<tr><td>". $c->course_code. "</td>";
                                                    echo "<td>". $c->title. "</td>";
                                                    echo "<td>". $c->units. "</td>";
                                                    echo "<td>". $c->description. "</td>";
                                                    echo "<td><a type='button' class='btn btn-success' href='add.php?c_id={$c->id}'>Add</a></td>";
                                                    echo "<td><a type='button' class='btn btn-danger' href='remove.php?c_id={$c->id}'>Remove</a></td></tr>";
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