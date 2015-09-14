<?php
/**
 * User: Paul
 * Date: 6/14/14
 * Time: 2:19 PM
 */

namespace Apps\Basic\Controllers;

use Engine\Controllers\ControllerBase;
use Engine\Models\ModelBase;
use Engine\Views\ViewBase;
use Apps\Basic\Models\ModelBook;
use Engine\Views\ViewJson;

/**
 * Class ControllerJson
 * @package Apps\Basic\Controllers
 */
class ControllerJson extends ControllerBase {
    public function __construct($request, ModelBase $model, ViewBase $view, $returnableView = false) {
        parent::__construct($request, $model, $view, $returnableView);
    }

    /**
     * @return mixed
     */
    public function getBookList() {
        /** @var ModelBook $model */
        $model = &$this->model;
        /** @var ViewJson $view */
        $view = &$this->view;

        $model_data = $model->getBookList();
        $view->setParams($model_data);

        if ($this->returnableView) {
            return $view->run();
        } else {
            $view->run();
        }
    }

    public function getBook($id) {
        /** @var ModelBook $model */
        $model = &$this->model;
        /** @var ViewJson $view */
        $view = &$this->view;

        $model_data = $model->getBook($id);
        $view->setParams($model_data);

        if ($this->returnableView) {
            return $view->run();
        } else {
            $view->run();
        }
    }
}