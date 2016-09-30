<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://kavisoftek.in/
 * @since      1.0.0
 *
 * @package    Export_Import_Posts_Xml
 * @subpackage Export_Import_Posts_Xml/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Export_Import_Posts_Xml
 * @subpackage Export_Import_Posts_Xml/includes
 * @author     Kavisoftek <info@kavisoftek.in>
 */
class Export_Import_Posts_Xml_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'export-import-posts-xml',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
