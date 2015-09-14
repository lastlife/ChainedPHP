<?php
/**
 * User: Paul
 * Date: 29/05/14
 * Time: 17:59
 */

require_once dirname(dirname(__DIR__)).'/apps/basic/directors/DirectorIndex.php';
require_once dirname(dirname(__DIR__)).'/apps/basic/directors/DirectorJson.php';
require_once dirname(dirname(__DIR__)).'/apps/basic/controllers/ControllerIndex.php';
require_once dirname(dirname(__DIR__)).'/apps/basic/controllers/ControllerJson.php';
require_once dirname(dirname(__DIR__)).'/apps/basic/models/ModelBook.php';
require_once dirname(dirname(__DIR__)).'/apps/basic/models/ModelJsonBook.php';

$DirectorIndex = new \Apps\Basic\Directors\DirectorIndex($_REQUEST);
$DirectorIndex->getIndex();
