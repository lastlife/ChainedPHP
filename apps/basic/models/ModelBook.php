<?php
/**
 * User: Paul
 * Date: 12/09/2015
 * Time: 11:42
 */

namespace Apps\Basic\Models;

use Engine\Models\ModelDirect;

class ModelBook extends ModelDirect {
    /** @var array */
    private $books = array();

    public function __construct($params = array()) {
        parent::__construct(array());
        $this->books = array(
            array('title' => 'Title Book 1', 'author' => 'Anonymous'),
            array('title' => 'Title Book 2', 'author' => 'Van Helsing'),
            array('title' => 'Title Book 3', 'author' => 'Some Guy'),
            array('title' => 'Title Book 4', 'author' => 'Anonee Moose')
        );
    }

    public function getBookList() {
        return $this->books;
    }

    public function getBook($id) {
        if (array_key_exists($id, $this->books)) {
            return array($this->books[$id]);
        } else {
            throw new \Exception("ID Book <em>$id</em> does not exist.", E_USER_ERROR);
        }
    }
}