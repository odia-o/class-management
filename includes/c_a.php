<?php
require_once(LIB_PATH.DS."database.php");

class C_a extends DatabaseObject{
    protected static $table_name = "c_a";
    protected static $db_fields = array("id", "course_id", "quiz1", "q1_size", "quiz2", "q2_size", "assignment1", "a1_size", "assignment2", "a2_size", "project1", "p1_size", "project2", "p2_size", "attendance", "at_size", "mid_sem", "mi_size", "exam", "ex_size", "total");
    protected static $db_fields2 = array("course_id", "quiz1", "q1_size", "quiz2", "q2_size", "assignment1", "a1_size", "assignment2", "a2_size", "project1", "p1_size", "project2", "p2_size", "attendance", "at_size", "mid_sem", "mi_size", "exam", "ex_size", "total");

    public $id;
    public $course_id;
    public $quiz1;
    public $q1_size;
    public $quiz2;
    public $q2_size;
    public $assignment1;
    public $a1_size;
    public $assignment2;
    public $a2_size;
    public $project1;
    public $p1_size;
    public $project2;
    public $p2_size;
    public $attendance;
    public $at_size;
    public $mid_sem;
    public $mi_size;
    public $exam;
    public $ex_size;
    public $total;
    public $errors = array();
    public $e;
    


    public static function all_fields($c_id=""){
        global $db;
        
        $query = "SELECT * FROM c_a ";
        $query .= "WHERE course_id = '{$c_id}'";
        $query .= " LIMIT 1";
        
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
            $this->total = 0;
            if($this->quiz1 == 1){
                $this->total += $this->q1_size;
            }
            if($this->quiz2 == 1){
                $this->total += $this->q2_size;
            }
            if($this->assignment1 == 1){
                $this->total += $this->a1_size;
            }
            if($this->assignment2 == 1){
                $this->total += $this->a2_size;
            }
            if($this->project1 == 1){
                $this->total += $this->p1_size;
            }
            if($this->project2 == 1){
                $this->total += $this->p2_size;
            }
            if($this->mid_sem == 1){
                $this->total += $this->mi_size;
            }
            if($this->attendance == 1 && $this->at_size <= 12){
                $this->total += $this->at_size;
            }
            if($this->exam == 1){
                $this->total += $this->ex_size;
            }
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