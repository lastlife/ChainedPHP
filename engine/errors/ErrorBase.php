<?php
/**
 * User: Paul
 * Date: 17/03/14
 * Time: 20:58
 */

namespace Engine\Errors;

/**
 * Class ErrorBase
 * @package Engine\Errors
 */
abstract class ErrorBase {
    /**
     * @var \Exception[]
     */
    protected $list;

    public function __construct() {
        $this->list = array();
    }

    /**
     * @param \Exception $exception
     */
    public function add(\Exception $exception) {
        $this->list[] = $exception;
    }

    public function show() {
        foreach ($this->list as $exception) {
            echo 'Error on file "'.$exception->getFile().'" on line "'.$exception->getLine().'" with message: '.$exception->getMessage()."\n";
        }
    }
}