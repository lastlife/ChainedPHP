<?php
/**
 * User: Paul
 * Date: 12/09/2015
 * Time: 11:42
 */

namespace Apps\Basic\Models;

use Engine\Models\ModelJson;

class ModelJsonBook extends ModelJson {
    /** @var string URL for fetching the JSON data */
    private $url = 'http://www.introthegame.com/mvc-project/index.php';
    /** @var array */
    private $url_query = array('page' => 'json');

    public function __construct($params = array()) {
        parent::__construct(array());
    }

    public function getBookList() {
        $json = file_get_contents($this->url.'?'.http_build_query($this->url_query));
        $book_list = json_decode($json, true);
        return $book_list;
    }

    public function getBook($id) {
        if (isset($id) && !empty($id) && $id >= 0) {
            $this->url_query += array('id' => $id);
        }
        $json = file_get_contents($this->url.'?'.http_build_query($this->url_query));
        $book_list = json_decode($json, true);
        return $book_list;
    }
}