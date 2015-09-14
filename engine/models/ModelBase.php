<?php
/**
 * User: Paul
 * Date: 24/08/2015
 * Time: 17:39
 */

namespace Engine\Models;

/**
 * Class ModelBase used to extend other Models
 *
 * This class is the most abstract part of the framework. It should update whatever the controller tells it to, process
 * the data in whatever logic form it's supposed to and then formatted it in a common way so that any view can
 * understand it. Remember that this is *not* a DB helper of any kind, it just tells it what to do from a given input
 * defined within the Model itself.
 * @package Engine\Models
 */
abstract class ModelBase {
    /**
     * @var array
     */
    protected $params;

    /**
     * @param array $params
     */
    public function __construct($params = array()) {
        $this->params = $params;
    }

    /**
     * @param array $params
     */
    public function setParams($params = array()) {
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    abstract public function run();
}
