<?php
/**
 * User: Paul
 * Date: 31/05/14
 * Time: 20:31
 */

namespace Engine\Controllers;

use Engine\Models\ModelBase;
use Engine\Views\ViewBase;

/**
 * Class ControllerBase used to extend other Controllers.
 *
 * The main function of the Controller is to receive the user's petition, update the Model in consequence and, then,
 * pass the updated data to the View (traditional MVC rarely leave this job to the Controller, but it give us a
 * good control overall and makes testing easier).
 * @package Engine\Controllers
 */
abstract class ControllerBase {
    /**
     * @var bool It tells the Controller that it needs to return whatever the View renders.
     * It's usually needed for the Director class, since, sometimes, it needs to do things with it.
     */
    protected $returnableView;
    /** @var ModelBase The Model being used. */
    protected $model;
    /** @var ViewBase The View being used. */
    protected $view;
    /** @var array User's request. */
    protected $request;

    /**
     * @param array $request
     * @param ModelBase $model
     * @param ViewBase $view
     * @param bool $returnableView
     */
    public function __construct($request, ModelBase $model, ViewBase $view, $returnableView = false) {
        $this->request = $request;
        $this->model = $model;
        $this->view = $view;
        $this->returnableView = $returnableView;
    }

    /**
     * It sets parameters for the Controller.
     * @param array $request
     */
    public function setRequest($request = array()) {
        $this->request = $request;
    }
}
