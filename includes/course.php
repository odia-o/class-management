<?php
require_once(LIB_PATH.DS."database.php");

class Course extends DatabaseObject{
    protected static $table_name = "courses";
    protected static $db_fields = array("id", "title", "units", "course_code", "description");
    protected static $db_fields2 = array("title", "units", "course_code", "description");
    public $id;
    public $title;
    public $units;
    public $course_code;
    public $description;


    
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