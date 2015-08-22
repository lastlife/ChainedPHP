<?php
/**
 * User: Paul
 * Date: 2/06/14
 * Time: 23:28
 */

namespace Engine\Models;

/**
 * Interface IModel
 * @package Engine\Models
 */
interface IModel {
    public function __construct($params, $input_format);
} 