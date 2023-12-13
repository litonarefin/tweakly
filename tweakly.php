<?php
/**
 * Plugin Name: Tweakly
 * Plugin URI:  https://jeweltheme.com/tweakly
 * Description: Admin Tweaks Plugin
 * Version:     1.0.1
 * Author:      Jewel Theme
 * Author URI:  https://jeweltheme.com
 * Text Domain: tweakly
 * Domain Path: /languages/
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Tweakly
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Tweaks init
 */
add_action('init', 'tweakly_init');
function tweakly_init(){
    tweakly_hide_frontend_admin_bar();
    tweakly_remove_wp_version_number();
    add_action( 'admin_menu', 'tweakly_remove_admin_footer_version' );
}
/**
 * Hide Frontend Admin Bar
 *
 * @return void
 */
function tweakly_hide_frontend_admin_bar(){
    add_filter( 'show_admin_bar', '__return_false' );
}


/**
 * Remove Admin Footer Version Number
 *
 * @return void
 */
function tweakly_remove_admin_footer_version(){
    // Remove WordPress Version except Admin
    if ( ! current_user_can( 'manage_options' ) ) {
        remove_filter( 'update_footer', 'core_update_footer' );
    }
}


/**
 * Remove WordPress Version Number
 *
 * @return void
 */
function tweakly_remove_wp_version_number(){
    remove_action( 'wp_head', 'wp_generator' ); // Remove WordPress Generator Version
    add_filter( 'the_generator', '__return_false' ); // Remove Generator Name From Rss Feeds.
}
