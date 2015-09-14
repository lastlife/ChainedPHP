<?php
/**
 * User: Paul
 * Date: 29/05/14
 * Time: 18:24
 */

namespace Engine\Templates;

/**
 * Class TemplateTwig
 * @package Engine\Templates
 */
class TemplateTwig extends TemplateBase {
    /**
     * @var \Twig_Loader_Filesystem
     */
    private $loader;
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @param $params array
     */
    public function __construct($params) {
        parent::__construct($params);
    }

    /**
     * @param $template_dir string
     */
    public function setTemplateDir($template_dir) {
        $this->loader = new \Twig_Loader_Filesystem(dirname(__FILE__)."/../../templates/$template_dir");
        /*$this->twig = new \Twig_Environment($this->loader, array(
            'cache' => dirname(__FILE__)."/../../templates/$template_dir/cache"
        ));*/
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => false
        ));
    }

    /**
     * Generates the template data.
     */
    public function generate() {
        $this->setTemplateDir($this->params['template_dir']);
        $this->result = $this->twig->render($this->params['template_file'], $this->params['params']);
    }

    /**
     * @param array $template_params
     */
    public function setParams($template_params = array()) {
        $this->params['params'] = $template_params;
    }

    /**
     * @param bool|false $returnableTemplate
     */
    public function setReturnableTemplate($returnableTemplate = false) {
        $this->returnableTemplate = $returnableTemplate;
    }

    /**
     * Runs, and echoes if needed, the template after generating the data.
     * @return string
     */
    public function run() {
        $this->generate();
        if ($this->returnableTemplate) {
            return $this->result;
        } else {
            echo $this->result;
        }
    }
}