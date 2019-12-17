<?php
/*
Plugin Name: Help popin plugin
Plugin URI: https://gmirmand.fr/help-popip
Description: Plugin pour ajouter une pop-in d'aide
Author: Gaëtan Mirmand
Version: 1.0
Author URI: https://gmirmand/fr
*/

if ( is_admin() ) {
    include plugin_dir_path(__FILE__) . 'admin.php';
} else {
    include(plugin_dir_path(__FILE__) . 'front.php');
}
