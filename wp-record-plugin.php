<?php
/*
  Plugin Name: WP Custom Form Data
  Description: Simple Plugin to Add, Show, Delete and Update Records.
  Version: 1.0.0
  Author: Asad Ur Rehman
 */

define("RECORD_PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));

function record_menus_development()
{
    add_menu_page("Participent Record ", "Participent Record", "manage_options", "wp-record-plugin", "record_wp_list_call");
    add_submenu_page("wp-record-plugin", "Show Participent Records", "Show Participent Records", "manage_options", "wp-record-plugin", "record_wp_list_call");
    add_submenu_page("wp-record-plugin", "Add  Participent", "Add  Participent", "manage_options", "wp-record-add", "record_wp_add_call");
}

add_action("admin_menu", "record_menus_development");

function record_wp_list_call()
{
    include_once RECORD_PLUGIN_DIR_PATH . '/views/list-student.php';
}

function record_wp_add_call()
{
    include_once RECORD_PLUGIN_DIR_PATH . '/views/add-participent.php';
}
