<?php
/**
 * User: Paul
 * Date: 29/05/14
 * Time: 18:24
 */

namespace Engine\Templates;

/**
 * Class TwigTemplate
 * @package Engine\Templates
 */
class TwigTemplate extends TemplateBase {
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
        require_once dirname(__FILE__).'/../lib/Twig/Autoloader.php';
        \Twig_Autoloader::register();
    }

    /**
     * @param $template_dir string
     */
    public function setTemplateDir($template_dir) {
        $this->loader = new \Twig_Loader_Filesystem(dirname(__FILE__)."/../../templates/$template_dir");
        $this->twig = new \Twig_Environment($this->loader, array(
            'cache' => dirname(__FILE__)."/../../templates/$template_dir/cache"
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
     * Runs, and echoes, the template after generating the data.
     */
    public function run() {
        $this->generate();
        echo $this->result;
    }
}