<?php
/**
 * User: Paul
 * Date: 17/03/14
 * Time: 18:57
 */
require_once dirname(__FILE__).'/engine/errors/ErrorHandling.php';

/**
 * Load config file
 */
require_once dirname(__FILE__).'/config/config.php';

/**
 * Initiallize first app and template name
 * (not necesarily a template-based engine, it's just where to find the index.php)
 */
$GLOBALS['init_app_name'] = $init_app_name;
$GLOBALS['template_name'] = $template_name;

require_once dirname(__FILE__).'/engine/Autoload.php';

include_once dirname(__FILE__).'/templates/'.$GLOBALS['template_name'].'/index.php';
