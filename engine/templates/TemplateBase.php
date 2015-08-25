<?php
/**
 * User: Paul
 * Date: 3/06/14
 * Time: 19:08
 */

namespace Engine\Templates;

/**
 * Class TemplateBase
 * @package Engine\Templates
 */
abstract class TemplateBase {
    /**
     * @var array
     */
    protected $params;
    /**
     * @var array
     */
    protected $result;

    /**
     * @param $params array
     */
    public function __construct($params) {
        $this->params = $params;
    }

    public function run() {
        echo $this->result;
    }
}