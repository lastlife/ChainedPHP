<?php
/**
 * User: Paul
 * Date: 17/03/14
 * Time: 19:01
 */

namespace Engine\Models;

/**
 * Class ModelDirect
 * @package Engine\Models
 */
class ModelDirect extends ModelBase {
    public function __construct($params) {
        parent::__construct($params);
    }

    public function run() {
        return $this->params;
    }
}
