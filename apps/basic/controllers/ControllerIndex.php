<?php
/**
 * User: Paul
 * Date: 6/14/14
 * Time: 2:19 PM
 */

namespace Apps\Basic\Controllers;

use Engine\Controllers\ControllerBase;

/**
 * Class ControllerIndex
 * @package Apps\Basic\Controllers
 */
class ControllerIndex extends ControllerBase {
    public function __construct($params, $input_format, $output_format, $children_controllers = array()) {
        parent::__construct($params, $input_format, $output_format, $children_controllers = array());
    }

    public function run() {
        $model_class = array_map('ucfirst', explode('_', $this->input_format));
        $model_class = '\Engine\Models\Model'.implode('', $model_class);
        $this->model = new $model_class($this->params['model_params']);
        $this->params['model'] = $this->model->run();

        // Usually, do something here
        $this->params['view_params']['template_params']['params'] = $this->params['model'];
        // Call any possible children
        $this->runChildren();

        $view_class = array_map('ucfirst', explode('_', $this->output_format));
        $view_class = '\Engine\Views\View'.implode('', $view_class);
        $this->view = new $view_class($this->params['view_params']);
        $this->view->run();
    }
}