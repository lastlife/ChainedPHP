<?php
/**
 * User: Paul
 * Date: 10/09/2015
 * Time: 11:18
 */

namespace Apps\Basic\Directors;

use Apps\Basic\Controllers\ControllerJson;
use Apps\Basic\Models\ModelBook;
use Engine\Directors\DirectorBase;
use Engine\Views\ViewJson;

/**
 * Class DirectorJson for the index page
 * @package Apps\Basic\Directors
 */
class DirectorJson extends DirectorBase {
    public function getDefault() {
        $model = new ModelBook();
        $view = new ViewJson();
        $controllerJson = new ControllerJson($this->request, $model, $view);

        if (isset($_REQUEST['id']) && $_REQUEST['id'] >= 0) {
            $controllers = array(
                array('object' => $controllerJson, 'method' => 'getBook', 'args' => array($_REQUEST['id']))
            );
        } else {
            $controllers = array(
                array('object' => $controllerJson, 'method' => 'getBookList', 'args' => array())
            );
        }
        $this->process($controllers);
    }
}
