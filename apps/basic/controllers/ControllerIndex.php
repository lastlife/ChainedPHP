<?php
/**
 * User: Paul
 * Date: 6/14/14
 * Time: 2:19 PM
 */

namespace Apps\Basic\Controllers;

use Engine\Controllers\ControllerBase;

/**
 * Class ControllerIndex
 * @package Apps\Basic\Controllers
 */
class ControllerIndex extends ControllerBase {
    public function __construct($params, $input_format, $output_format, $children_controllers = array()) {
        parent::__construct($params, $input_format, $output_format, $children_controllers = array());
    }
}