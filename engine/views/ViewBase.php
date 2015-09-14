<?php
/**
 * User: Paul
 * Date: 2/06/14
 * Time: 23:40
 */

namespace Engine\Views;

/**
 * Class ViewBase used to extend other Views.
 *
 * The View should get data from the Model and publish it to the user. It doesn't automatically mean it's a
 * Template Engine. The Views could be any output format at all, let it be a (plain) HTML, processed HTML (like
 * a HTML engine), JSON, XML, etc.
 * @package Engine\Views
 */
abstract class ViewBase {
    /** @var bool Determines if the View should return the rendered view or not. */
    protected $returnableView;
    /** @var array */
    protected $params;

    /**
     * @param array $params
     * @param bool $returnableView
     */
    public function __construct($params = array(), $returnableView = false) {
        $this->params = $params;
        $this->returnableView = $returnableView;
    }

    /**
     * @param array $params
     */
    public function setParams($params = array()) {
        $this->params = $params;
    }

    /**
     * @return mixed It might return something so that the Director can handle the data as it sees fit.
     */
    abstract public function run();
}
