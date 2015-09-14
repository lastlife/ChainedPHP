<?php
/**
 * User: Paul
 * Date: 18/03/14
 * Time: 3:35
 */

namespace Engine\Views;

/**
 * Returns/outputs a JSON formated object/array.
 * @package Engine\Views
 */
class ViewJson extends ViewBase {
    public function __construct($params = array(), $returnableView = false) {
        parent::__construct($params, $returnableView);
    }
    public function run() {
        if ($this->returnableView) {
            return json_encode($this->params);
        } else {
            echo json_encode($this->params);
        }
    }
}
