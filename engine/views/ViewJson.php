<?php
/**
 * User: Paul
 * Date: 18/03/14
 * Time: 3:35
 */

namespace Engine\Views;

/**
 * Class ViewJson
 * @package Engine\Views
 */
class ViewJson extends ViewBase {
    public function __construct($params) {
        parent::__construct($params);
    }
    public function run() {
        echo json_encode($this->params);
    }
}
