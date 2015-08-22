<?php
/**
 * User: Paul
 * Date: 18/03/14
 * Time: 3:35
 */

/**
 * Class ViewTemplate
 */
class ViewTemplate extends \Engine\Views\ViewBase {
    public function __construct($params) {
        $this->params = $params;
    }
    public function run() {
        if (isset($this->params['template_engine']) && strlen($this->params['template_engine']) > 0) {
            $template_engine_class = array_map('ucfirst', explode('_', $this->params['template_engine']));
            $template_engine_class = implode('', $template_engine_class).'Template';
        } else {
            $template_engine_class = array_map('ucfirst', explode('_', Domain::Param('template_engine')));
            $template_engine_class = implode('', $template_engine_class).'Template';
        }
        $template_engine = new $template_engine_class($this->params['template_params']);
        $template_engine->run();
    }
}