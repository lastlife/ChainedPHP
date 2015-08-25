<?php
/**
 * User: Paul
 * Date: 2/06/14
 * Time: 23:40
 */

namespace Engine\Views;

/**
 * Class ViewBase
 * @package Engine\Views
 */
abstract class ViewBase {
    /**
     * @var array
     */
    protected $params;

    /**
     * @param $params array
     */
    public function __construct($params) {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    abstract public function run();
}
