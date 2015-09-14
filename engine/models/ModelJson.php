<?php
/**
 * User: Paul
 * Date: 17/03/14
 * Time: 19:01
 */

namespace Engine\Models;

/**
 * Dummy class that returns whatever it's passed to it.
 * @package Engine\Models
 */
class ModelJson extends ModelBase {
    public function __construct($params) {
        parent::__construct($params);
    }

    public function run() {
        return json_decode($this->params);
    }
}
