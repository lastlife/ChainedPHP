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
 * Initialize first app and template name
 * (not necesarily a template-based engine, it's just where to find the index.php)
 */
if (isset($template_name)) {
    $GLOBALS['template_name'] = $template_name;
} else {
    throw new Exception('No Template Folder configured.');
}

require_once dirname(__FILE__).'/vendor/autoload.php';

if (file_exists(dirname(__FILE__).'/templates/'.$GLOBALS['template_name'].'/'.$_GET['page'].'.php')) {
    include_once dirname(__FILE__).'/templates/'.$GLOBALS['template_name'].'/'.$_GET['page'].'.php';
} else {
    include_once dirname(__FILE__).'/templates/'.$GLOBALS['template_name'].'/index.php';
}
