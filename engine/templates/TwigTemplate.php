<?php
/**
 * User: Paul
 * Date: 29/05/14
 * Time: 18:24
 */

/**
 * Class TwigTemplate
 */
class TwigTemplate extends \Engine\Templates\TemplateBase {
    /**
     * @var Twig_Loader_Filesystem
     */
    private $loader;
    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @param array $params
     */
    function __construct($params) {
        $this->params = $params;
        require_once dirname(__FILE__).'/../lib/Twig/Autoloader.php';
        \Twig_Autoloader::register();
    }

    /**
     * @param $template_dir
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