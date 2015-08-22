<?php
/**
 * User: Paul
 * Date: 3/06/14
 * Time: 19:08
 */

namespace Engine\Templates;

abstract class TemplateBase {
    protected $params;
    protected $result;
    public function __construct($params) {
        $this->params = $params;
    }
    public function run() {
        echo $this->result;
    }
}