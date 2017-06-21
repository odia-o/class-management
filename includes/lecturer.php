<?php
require_once(LIB_PATH.DS."database.php");

class Lecturer extends DatabaseObject{
    protected static $table_name = "lecturers";
    protected static $db_fields = array("id", "first_name", "last_name", "username", "gender", "title", "phone", "password");
    protected static $db_fields2 = array("first_name", "last_name", "username", "gender", "title", "phone", "password");
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $phone;
    public $title;
    public $registration_date;
    public $gender;
    public $cp;

    public function full_name() {
        if(isset($this->first_name) && isset($this->last_name)) {
            return $this->first_name. " " .$this->last_name;
        }
        else {
            return "";
        }
    }
    
    public static function authenticate($username="", $password="") {
        global $db;
        $username = $db->escape_value($username);
        $password = $db->escape_value($password);
        
        $query = "SELECT * FROM lecturers ";
        $query .= "WHERE username = '{$username}' ";
        $query .= "AND password = md5('{$password}') ";
        $query .= "LIMIT 1";
        
        $result_array = self::find_by_sql($query);
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    
     public function save() {
        if(isset($this->id)) {
            parent::update();
        }
        else {
            if(!empty($this->errors)) {return false;}
            if(strlen($this->last_name) >= 255 || empty($this->last_name)) {
                $this->errors[] = "The Last name can only be 255 characters long.";
                return false;
            }
            if(strlen($this->first_name) >= 255 || empty($this->first_name)) {
                $this->errors[] = "The First name can only be 255 characters long.";
                return false;
            }
            
            if(empty($this->gender)){
                $this->errors[] = "invalid gender.";
                return false;
            }
            if($this->cp != $this->password) {
                $this->errors[] = "Passwords don't match";
                return false;
            }
            $query = "SELECT * FROM staff WHERE password = md5('{$this->password}') LIMIT 1";
            $result_array = self::find_by_sql($query);
            if($result_array){
                $this->errors[] = "Password exists";
                return false;
            }
            if($this->password === false){
                $this->errors[] = "*Enter a password";
                return false;
            }
               
               
             $this->registration_date = strftime("%Y-%m-%d", time());
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