<?php
/**
 * User: Paul
 * Date: 24/08/2015
 * Time: 17:39
 */

namespace Engine\Models;

/**
 * Class ModelBase
 * @package Engine\Models
 */
abstract class ModelBase {
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
