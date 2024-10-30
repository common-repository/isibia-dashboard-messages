<?php
/*
  Plugin Name: Isibia Dashboard Messages
  Plugin URI: https://github.com/ArtemAnoshin/isibia-dashboard-messages
  Description: Free Isibia plugin. Create messages for control panel users.
  Version: 1.0
  Author: Artem Anoshin <artem.anoshin@gmail.com>
  Text Domain: isibia-dashboard-messages
*/

use IsibiaDashboardMessages\Core\Plugin;

require_once 'vendor/autoload.php';

$plugin = new Plugin();
$plugin->launch();
