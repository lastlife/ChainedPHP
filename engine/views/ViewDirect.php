<?php
/**
 * User: Paul
 * Date: 18/03/14
 * Time: 3:35
 */

namespace Engine\Views;

/**
 * Class ViewDirect
 * @package Engine\Views
 */
class ViewDirect extends ViewBase {
    public function __construct($params) {
        parent::__construct($params);
    }
    public function run() {
        echo $this->params;
    }
}
