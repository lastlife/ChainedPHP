<?php
/**
 * User: Paul
 * Date: 2/06/14
 * Time: 23:40
 */

namespace Engine\Views;

abstract class ViewBase {
    protected $params;
    public function __construct($params) {
        $this->params = $params;
    }
    abstract public function run();
}
