<?php
/**
 * User: Paul
 * Date: 18/03/14
 * Time: 3:35
 */

/**
 * Class ViewDirect
 */
class ViewDirect extends \Engine\Views\ViewBase {
    public function __construct($params) {
        parent::__construct($params);
    }
    public function run() {
        echo $this->params;
    }
}
