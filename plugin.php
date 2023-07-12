<?php
/**
 * Plugin Name: Student CRUD Plugin
 * Plugin URI: https://github.com/kavindee/PHP_plugin_CRUD.git
 * Description: Custome student Plugin to execute CRUD operation in wordpress.
 * Version: 1.0.0
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Author: Mohan Weerasinghe
 * Author URI: https://web.facebook.com/mohankavinda.weerasingha/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: crud-plugin
 */

 // This function will be executed when the plugin is activated.
 register_activation_hook(__FILE__, 'table_creator');

 //creating database on plugin activation
 global $jal_db_version;
 $jal_db_version = '1.0';

 function table_creator(){
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'student_list';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE `$table_name` (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(100) DEFAULT NULL,
        address varchar(220) DEFAULT NULL,
        gender varchar(220) DEFAULT NULL,
        contact int(12),
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $sql );

    add_option('jal_db_version', $jal_db_version);
}

//adding in menu in wordpress
add_action('admin_menu', 'at_try_menu');

function at_try_menu(){
    //adding plugin in menu
    add_menu_page(
        'student_list', //page title
        'Student Listing', //menu title
        'manage_options', //capabilities
        'Student_Listing',//menu slug
        'student_list'//function
    );
    add_submenu_page(
        'Student_Listing',//parent page slug
        'student_insert', //page title
        'Student Insert', //menu titel
        'manage_options', //manage optios
        'Student_Interst', //slug
        'student_insert' //function
    );
    add_submenu_page(
        'Student_Listing',//parent page slug
        'student_shortcode', //page title
        'Student ShortCode', //menu titel
        'manage_options', //manage optios
        'Student_ShortCode', //slug
        'student_shortcode' //function
    );
    add_submenu_page(
        NULL, //parent page slug
        'student_update', //$page_title
        'Student Update', // $menu_title
        'manage_options', // $capability
        'Student_Update', // $menu_slug,
        'student_update' // $function
    );
    add_submenu_page(
        NULL, //parent page slug
        'student_delete', //$page_title
        'Student Delete', // $menu_title
        'manage_options', // $capability
        'Student_Delete', // $menu_slug,
        'student_delete' // $function
    );
}

// returns the root directory path of particular plugin
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR. 'student_list.php');
require_once(ROOTDIR. 'student_insert.php');
require_once(ROOTDIR. 'student_update.php');
require_once(ROOTDIR. 'student_delete.php');
require_once(ROOTDIR. 'student_shortcode.php');
