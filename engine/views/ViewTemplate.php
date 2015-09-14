<?php
/**
 * User: Paul
 * Date: 18/03/14
 * Time: 3:35
 */

namespace Engine\Views;

use Engine\Templates\TemplateBase;

/**
 * Class ViewTemplate
 * @package Engine\Views
 */
class ViewTemplate extends ViewBase {
    /** @var TemplateBase */
    private $template_engine;

    /**
     * @param array $params
     * @param TemplateBase $template_engine
     * @param bool $returnableView
     */
    public function __construct($params, TemplateBase $template_engine, $returnableView = false) {
        parent::__construct($params, $returnableView);
        $this->template_engine = $template_engine;
        $this->template_engine->setReturnableTemplate($returnableView);
    }

    /**
     * @param array $params
     */
    public function setParams($params = array()) {
        $this->params = $params;
    }

    /**
     * @param array $template_params
     */
    public function setTemplateParams($template_params = array()) {
        $this->template_engine->setParams($template_params);
    }

    public function run() {
        if ($this->returnableView) {
            return $this->template_engine->run();
        } else {
            $this->template_engine->run();
        }
    }
}
