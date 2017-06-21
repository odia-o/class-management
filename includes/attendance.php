<?php
require_once(LIB_PATH.DS."database.php");

class Attendance extends DatabaseObject{
    protected static $table_name = "attendance";
    protected static $db_fields = array("id", "student_id", "course_id", "at1", "at2", "at3", "at4", "at5", "at6", "at7", "at8", "at9", "at10", "at11", "at12");
    protected static $db_fields2 = array("student_id", "course_id", "at1", "at2", "at3", "at4", "at5", "at6", "at7", "at8", "at9", "at10", "at11", "at12");
    public $id;
    public $student_id;
    public $course_id;
    public $at1;
    public $at2;
    public $at3;
    public $at4;
    public $at5;
    public $at6;
    public $at7;
    public $at8;
    public $at9;
    public $at10;
    public $at11;
    public $at12;
    public $errors = array();


    
    public static function find($course_id="", $student_id=""){
        global $db;
        
        $query = "SELECT * FROM attendance ";
        $query .= "WHERE course_id = '{$course_id}'";
        $query .= " AND student_id = '{$student_id}'";
        
        $result_array = self::find_by_sql($query);
        if($result_array) {
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
                $this->errors[] = "something went wrong";
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