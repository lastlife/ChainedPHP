<?php
/**
 * Created by PhpStorm.
 * User: paul
 * Date: 6/14/14
 * Time: 2:19 PM
 */

/**
 * Class ControllerIndex
 */
class ControllerIndex extends \Engine\Controllers\ControllerBase {
    public function __construct($params, $input_format, $output_format, $children_controllers = array()) {
        parent::__construct($params, $input_format, $output_format, $children_controllers = array());
    }

    public function run() {
        //Model stuff
        $modelArray = array(
            'title' => 'Prueba Twig',
            'header_title' => 'Suppa Powa MCV',
            'body' => 'Stuff!'
        );

        /*$model_class = array_map('ucfirst', explode('_', $this->input_format));
        $model_class = 'Model'.implode('', $model_class);
        $this->model = new $model_class($this->params['model_params']);
        $this->params['model'] = $this->model->run();*/

        // Do stuff
        $this->params['view_params']['template_params']['params'] = $modelArray;

        echo '<pre>';
        var_dump($this);
        echo '</pre>';

        $view_class = array_map('ucfirst', explode('_', $this->output_format));
        $view_class = 'View'.implode('', $view_class);
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