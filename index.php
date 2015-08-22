<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 17/03/14
 * Time: 18:57
 */
$GLOBALS['app_name'] = 'basic';
$GLOBALS['template_name'] = 'bootstrap';

require_once dirname(__FILE__).'/engine/errors/ErrorHandling.php';
require_once dirname(__FILE__).'/engine/Autoload.php';

if (isset($_GET['src']) && file_exists($_GET['src'])) {
    highlight_file($_GET['src']);
} else {
    include_once dirname(__FILE__).'/templates/'.$GLOBALS['template_name'].'/index.php';
}
