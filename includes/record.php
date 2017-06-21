<?php
require_once(LIB_PATH.DS."database.php");

class Record extends DatabaseObject{
    protected static $table_name = "records";
    protected static $db_fields = array("id", "student_id", "course_id", "quiz1", "quiz2", "assignment1", "project1", "assignment2", "project2", "attendance", "mid_sem", "exam", "total");
    protected static $db_fields2 = array("student_id", "course_id", "quiz1", "quiz2", "assignment1", "project1", "assignment2", "project2", "attendance", "mid_sem", "exam", "total");
    public $id;
    public $student_id;
    public $course_id;
    public $quiz1;
    public $quiz2;
    public $assignment1;
    public $project1;
    public $assignment2;
    public $project2;
    public $attendance;
    public $mid_sem;
    public $exam;
    public $total;
    public $errors = array();
    public $e;
    public $tray = array();
    


    public static function find_record($c_id="", $s_id=""){
        global $db;
        
        $query = "SELECT * FROM records ";
        $query .= "WHERE course_id = '{$c_id}'";
        $query .= " AND student_id = '{$s_id}' LIMIT 1";
        
        $result_array = self::find_by_sql($query);
        if($result_array) {
            return !empty($result_array) ? array_shift($result_array) : false;
        }
        else {
            return null;
        }
    }
    
     public function save() {
        if(isset($this->id)) {
            if($this->quiz1 > 5) {
                $this->e = "Quiz1 score cannot be more than 5";
                return false;
            }
            if($this->quiz2 > 5) {
                $this->e = "Quiz2 score cannot be more than 5";
                return false;
            }
            if($this->assignment1 > 5) {
                $this->e = "Assignment 1 score cannot be more than 5";
                return false;
            }
            if($this->project1 > 15) {
                $this->e = "Project 1 score cannot be more than 15";
                return false;
            }
            if($this->assignment2 > 5) {
                $this->e = "Assignment 2 score cannot be more than 5";
                return false;
            }
            if($this->project2 > 15) {
                $this->e = "Project 2 score cannot be more than 15";
                return false;
            }
            if($this->mid_sem > 15) {
                $this->e = "Mid sem score cannot be more than 15";
                return false;
            }
            if($this->attendance > 5) {
                $this->e = "Attendance score cannot be more than 5";
                return false;
            }
            if($this->exam > 50) {
                $this->e = "Exam score cannot be more than 50";
                return false;
            }
            $this->total = $this->quiz1 + $this->quiz2 + $this->assignment1 + $this->project1 + $this->assignment2 + $this->project2  + $this->mid_sem + $this->attendance + $this->exam;
            if($this->total > 100) {
                $this->e = "Total score cannot be more than 100";
                return false;
            }
            if(!empty($this->e)) {return false;}
               if(parent::update()){
                   return true;
               }
            else {
                return false;
            }
       
            
        }
        else {
            if(!empty($this->errors)) {return false;}
            
            
                if(parent::create()) {
                    return true;
                
            }
            else {
                $this->errors[] = "Something went wrong";
                return false;
            }
        }
    }
    
      public function destroy()
    {
        if(parent::delete()) {
            return true;
        }
        else {
            return false;
        }
    }

}
?>