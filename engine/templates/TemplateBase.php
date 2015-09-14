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
    /** @var bool */
    protected $returnableTemplate = false;
    /** @var array */
    protected $params;
    /** @var string */
    protected $result;

    /**
     * @param $params array
     */
    public function __construct($params) {
        $this->params = $params;
    }

    /**
     * @param array $params
     */
    public function setParams($params = array()) {
        $this->params = $params;
    }

    /**
     * @param bool|false $returnableTemplate
     */
    public function setReturnableTemplate($returnableTemplate = false) {
        $this->returnableTemplate = $returnableTemplate;
    }

    /**
     * @return string|void
     */
    public function run() {
        if ($this->returnableTemplate) {
            return $this->result;
        } else {
            echo $this->result;
        }
    }
}