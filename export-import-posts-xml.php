<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://kavisoftek.in/
 * @since             1.0.0
 * @package           Export_Import_Posts_Xml
 *
 * @wordpress-plugin
 * Plugin Name:       Export Import Posts XML
 * Plugin URI:        http://kavisoftek.in/export-import-posts-xml/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Pradeep
 * Author URI:        http://kavisoftek.in/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       export-import-posts-xml
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-export-import-posts-xml-activator.php
 */
function activate_export_import_posts_xml() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-export-import-posts-xml-activator.php';
	Export_Import_Posts_Xml_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-export-import-posts-xml-deactivator.php
 */
function deactivate_export_import_posts_xml() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-export-import-posts-xml-deactivator.php';
	Export_Import_Posts_Xml_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_export_import_posts_xml' );
register_deactivation_hook( __FILE__, 'deactivate_export_import_posts_xml' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-export-import-posts-xml.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_export_import_posts_xml() {

	$plugin = new Export_Import_Posts_Xml();
	$plugin->run();

}
run_export_import_posts_xml();
