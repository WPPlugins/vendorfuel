<?php
/*
Plugin Name: VendorFuel
Plugin URI: http://vendorfuel.com
Description: Dynamic javascript module loading e-commerce platform
Version: 1.0.0
Author: Hoffman Technologies, Inc dba VendorFuel
Author URI: http://hoffmantech.com/
License: GPL3
License URI: https://www.gnu.org/licenses/gpl.txt
*/
global $wpdb;
require(dirname(__FILE__).'/vendorfuel.class.php');
$vendorfuel = new vendorfuel($wpdb);
?>