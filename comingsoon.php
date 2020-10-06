<?php
/**
 * Plugin Name: Comingsoon
 * Plugin URI: https://wiloke.com
 * Author: wiloke
 * Author URI: https://wiloke.com
 * Version: 1.0
 * Description: This is a comingsoon plugin
 */

use Comingsoon\Controllers\EnqueueScriptsController;
use Comingsoon\Controllers\FrontendController;
use Comingsoon\Controllers\MenuController;

define('COMINGSOON_VERSION', '1.0');
define('COMINGSOON_PATH', plugin_dir_path(__FILE__));
define('COMINGSOON_URL', plugin_dir_url(__FILE__));
require_once COMINGSOON_PATH . 'vendor/autoload.php';

\Comingsoon\Helpers\App::bind('config/settings', include COMINGSOON_PATH . 'config/settings.php');



new MenuController;
new EnqueueScriptsController;
new FrontendController;