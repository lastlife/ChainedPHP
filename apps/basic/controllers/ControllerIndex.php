<?php
/**
 * User: Paul
 * Date: 6/14/14
 * Time: 2:19 PM
 */

namespace Apps\Basic\Controllers;

use Engine\Controllers\ControllerBase;
use Engine\Models\ModelBase;
use Apps\Basic\Models\ModelJsonBook;
use Engine\Views\ViewBase;
use Engine\Views\ViewTemplate;

/**
 * Class ControllerIndex
 * @package Apps\Basic\Controllers
 */
class ControllerIndex extends ControllerBase {
    public function __construct($request, ModelBase $model, ViewBase $view, $returnableView = false) {
        parent::__construct($request, $model, $view, $returnableView);
    }

    /**
     * @return mixed
     */
    public function getBookList() {
        /** @var ModelJsonBook $model */
        $model = &$this->model;
        /** @var ViewTemplate $view */
        $view = &$this->view;

        $model_data = array(
            'title' => 'Directed MVC',
            'header_title' => 'Book List'
        );

        $model_data['books'] = $model->getBookList();
        $view->setTemplateParams($model_data);

        if ($this->returnableView) {
            return $view->run();
        } else {
            $view->run();
        }
    }

    public function getBook($id) {
        /** @var ModelJsonBook $model */
        $model = &$this->model;
        /** @var ViewTemplate $view */
        $view = &$this->view;

        $model_data = array(
            'title' => 'Directed MVC',
            'header_title' => 'Book List'
        );

        $model_data['books'] = $model->getBook($id);
        $view->setTemplateParams($model_data);

        if ($this->returnableView) {
            return $view->run();
        } else {
            $view->run();
        }
    }
}