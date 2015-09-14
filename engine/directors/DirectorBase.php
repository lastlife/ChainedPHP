<?php
/**
 * User: Paul
 * Date: 04/09/2015
 * Time: 13:41
 */

namespace Engine\Directors;

use Engine\Controllers\ControllerBase;

/**
 * Class DirectorBase used to extend other Directors.
 *
 * The Director's objective is to execute every Controller and/or (sub)Director so that it can make a understandable
 * output out from them. The Director should pass data to them, fetch the output and dispose of it as it sees fit.
 * @package Engine\Directors
 */
abstract class DirectorBase {
    /** @var array */
    protected $request;
    /** @var DirectorBase[] */
    protected $subdirectors;
    /** @var ControllerBase[] */
    protected $controllers;

    /**
     * @param array $request
     */
    public function __construct($request) {
        $this->request = $request;
    }

    /**
     * @param ControllerBase[] $controllers
     * @return array
     */
    public function processControllers($controllers = array()) {
        $processed_controllers = array();
        foreach ($controllers as $controllers_list) {
            $object = $controllers_list['object'];
            $method = $controllers_list['method'];
            $args = $controllers_list['args'];

            $controller_class = get_class($object);
            if (!in_array($controller_class, $processed_controllers)) {
                $processed_controllers[$controller_class] = array();
            }
            if (!in_array($method, $processed_controllers[$controller_class])) {
                $processed_controllers[$controller_class][$method] = array();
            }
            $reflectionMethod = new \ReflectionMethod($object, $method);
            $processed_controllers[$controller_class][$method][] = $reflectionMethod->invokeArgs($object, $args);
        }

        return $processed_controllers;
    }

    /**
     * @param DirectorBase[] $subdirectors
     * @return array
     */
    public function processSubdirectors($subdirectors = array()) {
        $processed_subdirectors = array();
        foreach ($subdirectors as $method => $subdirector) {
            $subdirector_class = get_class($subdirector);
            if (!in_array($subdirector_class, $processed_subdirectors)) {
                $processed_subdirectors[$subdirector_class] = array();
            }
            if (!in_array($method, $processed_subdirectors[$subdirector_class])) {
                $processed_subdirectors[$subdirector_class][$method] = array();
            }
            $processed_subdirectors[$subdirector_class][$method][] = $subdirector->$method($this->request);
        }
        return $processed_subdirectors;
    }

    /**
     * @param array $controllers
     * @param array $subdirectors
     * @return array
     */
    public function process($controllers = array(), $subdirectors = array()) {
        $this->controllers = $controllers;
        $this->subdirectors = $subdirectors;
        $processed_data = array('processed_controllers' => array(), 'processed_subdirectors' => array());
        if (count($this->controllers) > 0) {
            $processed_data['processed_controllers'] = $this->processControllers($controllers);
        }
        if (count($this->subdirectors) > 0) {
            $processed_data['processed_subdirectors'] = $this->processSubdirectors($subdirectors);
        }
        return $processed_data;
    }
}
