<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'php_class'.DS.'eze');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."functions.php");
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."database_object.php");
require_once(LIB_PATH.DS."pagination.php");
require_once(LIB_PATH.DS."Validator.php");

require_once(LIB_PATH.DS."student.php");
require_once(LIB_PATH.DS."lecturer.php");
require_once(LIB_PATH.DS."course.php");
require_once(LIB_PATH.DS."lecturer_course.php");
require_once(LIB_PATH.DS."student_course.php");



?>