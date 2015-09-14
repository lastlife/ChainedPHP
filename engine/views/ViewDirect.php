<?php
/**
 * User: Paul
 * Date: 18/03/14
 * Time: 3:35
 */

namespace Engine\Views;

/**
 * Dummy class to output/return whatever it was passed to it.
 * @package Engine\Views
 */
class ViewDirect extends ViewBase {
    public function __construct($params, $returnableView = false) {
        parent::__construct($params, $returnableView);
    }
    public function run() {
        if ($this->returnableView) {
            return $this->params;
        } else {
            echo $this->params;
        }
    }
}
