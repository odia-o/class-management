<?php
require_once(LIB_PATH.DS."database.php");

class Lecturer_course extends DatabaseObject{
    protected static $table_name = "lecturer_courses";
    protected static $db_fields = array("id", "lecturer_id", "course_id");
    protected static $db_fields2 = array("lecturer_id", "course_id");
    public $id;
    public $lecturer_id;
    public $course_id;

public static function all_courses($lecturer_id="") {
        global $db;
        
        $query = "SELECT * FROM lecturer_courses ";
        $query .= "WHERE lecturer_id = '{$lecturer_id}'";
        
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