<?php
/**
 * User: Paul
 * Date: 29/05/14
 * Time: 17:59
 */

require_once dirname(dirname(__DIR__)).'/apps/basic/directors/DirectorJson.php';
require_once dirname(dirname(__DIR__)).'/apps/basic/controllers/ControllerJson.php';
require_once dirname(dirname(__DIR__)).'/apps/basic/models/ModelBook.php';

$DirectorJson = new \Apps\Basic\Directors\DirectorJson($_REQUEST);
$DirectorJson->getDefault();
