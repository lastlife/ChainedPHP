<?php
/**
 * User: Paul
 * Date: 22/03/14
 * Time: 15:40
 */

/**
 * @param string $class_name
 * @throws Exception
 */
function __autoload($class_name) {
    /**
     * Checks for namespaces
     */
    if (strpos($class_name, '\\') !== false) {
        $class_name_array = explode('\\', $class_name);
        $class_name = $class_name_array[count($class_name_array) - 1];
    }

    /**
     * Did it autoload?
     */
    $autoloaded = false;

    /**
     * Engine Autoloading
     */
    /**
     * Check errors handlers
     */
    if (file_exists(dirname(__FILE__)."/errors/$class_name.php")) {
        require_once(dirname(__FILE__)."/errors/$class_name.php");
        $autoloaded = true;
    }

    /**
     * Check models
     */
    if (file_exists(dirname(__FILE__)."/models/$class_name.php")) {
        require_once(dirname(__FILE__)."/models/$class_name.php");
        $autoloaded = true;
    }

    /**
     * Check Apps controllers
     */
    if (isset($GLOBALS['init_app_name']) && file_exists(dirname(__FILE__)."/../apps/".$GLOBALS['init_app_name']."/controllers/$class_name.php")) {
        require_once(dirname(__FILE__)."/../apps/".$GLOBALS['init_app_name']."/controllers/$class_name.php");
        $autoloaded = true;
    }

    /**
     * Check controllers
     */
    if (file_exists(dirname(__FILE__)."/controllers/$class_name.php")) {
        require_once(dirname(__FILE__)."/controllers/$class_name.php");
        $autoloaded = true;
    }

    /**
     * Check views
     */
    if (file_exists(dirname(__FILE__)."/views/$class_name.php")) {
        require_once(dirname(__FILE__)."/views/$class_name.php");
        $autoloaded = true;
    }

    /**
     * Check templates
     */
    if (file_exists(dirname(__FILE__)."/templates/$class_name.php")) {
        require_once(dirname(__FILE__)."/templates/$class_name.php");
        $autoloaded = true;
    }

    if (!$autoloaded) {
        throw new Exception('Not able to <em>autoload</em> class <strong>'.$class_name.'<strong>.');
    }
}