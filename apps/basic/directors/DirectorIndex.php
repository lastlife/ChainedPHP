<?php
/**
 * User: Paul
 * Date: 10/09/2015
 * Time: 11:18
 */

namespace Apps\Basic\Directors;

use Apps\Basic\Controllers\ControllerIndex;
use Apps\Basic\Models\ModelJsonBook;
use Engine\Directors\DirectorBase;
use Engine\Templates\TemplateTwig;
use Engine\Views\ViewTemplate;

/**
 * Class DirectorIndex for the index page
 * @package Apps\Basic\Directors
 */
class DirectorIndex extends DirectorBase {
    public function getIndex() {
        $returnableView = true;

        $model = new ModelJsonBook();
        $template_params = array(
            'template_dir' => $GLOBALS['template_name'],
            'template_file' => 'index.twig',
            'params' => array()
        );
        $template_engine = new TemplateTwig($template_params);
        $view = new ViewTemplate(array(), $template_engine);
        $controllerIndex = new ControllerIndex($this->request, $model, $view, $returnableView);

        if (isset($_REQUEST['id']) && $_REQUEST['id'] >= 0) {
            $controllers = array(
                array('object' => $controllerIndex, 'method' => 'getBook', 'args' => array($_REQUEST['id']))
            );
        } else {
            $controllers = array(
                array('object' => $controllerIndex, 'method' => 'getBookList', 'args' => array())
            );
        }

        $processed_data = $this->process($controllers);

        foreach ($processed_data as $type => $processed_classes) {
            if ($type === 'processed_controllers') {
                foreach ($processed_classes as $class => $processed_class) {
                    foreach ($processed_class as $method => $outputs) {
                        if ($method === 'getBookList' || $method === 'getBook') {
                            foreach ($outputs as $output) {
                                echo $output;
                            }
                        }
                    }
                }
            }
        }
    }
}
