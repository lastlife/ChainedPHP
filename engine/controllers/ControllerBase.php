<?php
/**
 * User: Paul
 * Date: 31/05/14
 * Time: 20:31
 */

namespace Engine\Controllers;

/**
 * Class ControllerBase
 * @package Engine\Controllers
 */
abstract class ControllerBase {
    /**
     * @var object
     */
    protected $model;
    /**
     * @var object
     */
    protected $view;
    /**
     * @var array
     */
    protected $params;
    /**
     * @var string
     */
    protected $input_format;
    /**
     * @var string
     */
    protected $output_format;
    /**
     * @var array
     */
    protected $children;

    /**
     * @param array $params
     * @param string $input_format
     * @param string $output_format
     * @param array $children_controllers
     */
    public function __construct($params, $input_format, $output_format, $children_controllers = array()) {
        $this->params = $params;
        $this->input_format = $input_format;
        $this->output_format = $output_format;
        /**
         * $children_controllers format:
         * array(
         *   'class_name',
         *   'params',
         *   'input_format',
         *   'output_format',
         *   'children_controllers'
         * )
         */
        $this->children = $children_controllers;
    }

    /**
     * Runs the controller and any possible children.
     * Children run before the view.
     */
    public function run() {
        $model_class = array_map('ucfirst', explode('_', $this->input_format));
        $model_class = 'Model'.implode('', $model_class);
        $this->model = new $model_class($this->params['model_params']);
        $this->params['model'] = $this->model->run();

        // Usually, do something here
        $this->params['view_params'] = $this->params['model'];
        // Call any possible children
        $this->runChildren();

        $view_class = array_map('ucfirst', explode('_', $this->output_format));
        $view_class = 'Model'.implode('', $view_class);
        $this->view = new $view_class($this->params['view_params']);
        $this->view->run();
    }

    public function runChildren($index = -1) {
        if (count($this->children) > 0) {
            if ($index > -1) {
                if (isset($this->children[$index])) {
                    $child = $this->children[$index];
                    $controller_class = array_map('ucfirst', explode('_', $child['class_name']));
                    $controller_class = 'Controller'.implode('', $controller_class);
                    $controller = new $controller_class($child['params'], $child['input_format'], $child['output_format'], $child['children_controllers']);
                    $controller->run();
                }
            } else {
                foreach ($this->children as $child) {
                    $controller_class = array_map('ucfirst', explode('_', $child['class_name']));
                    $controller_class = 'Controller'.implode('', $controller_class);
                    $controller = new $controller_class($child['params'], $child['input_format'], $child['output_format'], $child['children_controllers']);
                    $controller->run();
                }
            }
        }
    }
}
