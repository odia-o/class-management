<?php
require_once(LIB_PATH.DS."database.php");

class Student_course extends DatabaseObject{
    protected static $table_name = "student_courses";
    protected static $db_fields = array("id", "student_id", "course_id");
    protected static $db_fields2 = array("student_id", "course_id");
    public $id;
    public $student_id;
    public $course_id;


    public static function all_courses($student_id="") {
        global $db;
        
        $query = "SELECT * FROM student_courses ";
        $query .= "WHERE student_id = '{$student_id}'";
        
        $result_array = self::find_by_sql($query);
        if($result_array){
            return $result_array;
        }
    else {
        return null;
    }
}
    public static function find_record($c_id="", $s_id=""){
        global $db;
        
        $query = "SELECT * FROM student_courses ";
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
    
    public static function all_students($course_id="") {
        global $db;
        
        $query = "SELECT * FROM student_courses ";
        $query .= "WHERE course_id = '{$course_id}'";
        
        $result_array = self::find_by_sql($query);
        if($result_array){
            return $result_array;
        }
    else {
        return null;
    }
}
    
     public function save() {
        if(isset($this->id)) {
            parent::update();
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