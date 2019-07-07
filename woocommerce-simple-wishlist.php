<?php

/**
 * Plugin Name:    WooCommerce Simple Wishlist
 * Plugin URI:     http://andreinadaban.ro
 * Description:    A simple extension for WooCommerce that allows your customers to add products to a wishlist.
 * Version:        1.0.0
 * Author:         Andrei Nadaban
 * Author URI:     http://andreinadaban.ro
 * License:        GPL-2.0+
 * License URI:    http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:    wcsw
 * Domain Path:    /languages
 */

/**
 * If this file is called directly, exit.
 */
if ( ! defined( 'WPINC' ) ) {
	exit;
}

/**
 * Current plugin version.
 */
define( 'WCSW_VERSION', '1.0.0' );

/**
 * Plugin directory.
 */
define( 'WCSW_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Plugin main file.
 */
define( 'WCSW_PLUGIN', plugin_basename( __FILE__ ) );

/**
 * WooCommerce main file.
 */
define( 'WCSW_WOO', 'woocommerce/woocommerce.php' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wcsw-activator.php.
 */
function wcsw_activate() {
	require_once WCSW_DIR . '/includes/class-wcsw-activator.php';
	WCSW_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wcsw-deactivator.php.
 */
function wcsw_deactivate() {
	require_once WCSW_DIR . '/includes/class-wcsw-deactivator.php';
	WCSW_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'wcsw_activate' );
register_deactivation_hook( __FILE__, 'wcsw_deactivate' );

/**
 * The core plugin class that is used to define internationalization, admin and public hooks.
 */
require WCSW_DIR . '/includes/class-wcsw.php';

/**
 * Begins execution of the plugin.
 *
 * @since  1.0.0
 */
function wcsw_run() {

	$plugin = new WCSW( apply_filters( 'wcsw_config', array(
		'button_add_icon'    => WCSW_DIR . '/public/assets/dist/svg/heart-add.svg',
		'button_remove_icon' => WCSW_DIR . '/public/assets/dist/svg/heart-remove.svg',
		'button_clear_icon'  => WCSW_DIR . '/public/assets/dist/svg/clear.svg',
		'button_style'       => 'icon_text',
		'button_in_archive'  => true,
		'button_clear'       => true,
		'menu_name'          => 'Wishlist',
		'menu_position'      => 2,
	) ) );

	$plugin->run();

}

add_action( 'after_setup_theme', 'wcsw_run' );