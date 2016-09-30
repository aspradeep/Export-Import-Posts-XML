<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://kavisoftek.in/
 * @since      1.0.0
 *
 * @package    Export_Import_Posts_Xml
 * @subpackage Export_Import_Posts_Xml/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Export_Import_Posts_Xml
 * @subpackage Export_Import_Posts_Xml/admin
 * @author     Kavisoftek <info@kavisoftek.in>
 */
class Export_Import_Posts_Xml_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		add_action( 'wp_ajax_eipexportform', array ( $this, 'eip_exporter_form_ajax' ));
		require_once( plugin_dir_path( __FILE__ ) . 'wordpress-importer.php' );	
		require_once( plugin_dir_path( __FILE__ ) . 'parsers.php' );	
		

	}

	/**
	 * Add Main Menu.
	 *
	 * @since    1.0.0
	 */
	public function eip_add_menu() {
		add_menu_page( __('Export & Import Posts'), __('Export & Import Posts'), 'edit_themes', 'export_import', array($this,'display_export_import_page'), '', 99 );
	}
	
	/**
	 * Display Main Page Content.
	 *
	 * @since    1.0.0
	 */
	public function display_export_import_page() {
		global $title;
		?>
        <h2 class="title"><?php echo $title; ?></h2>
        <a href="<?php menu_page_url( 'export_posts', true ); ?>" class="button action"><?php echo __('Export Posts'); ?></a><br /><br />
        <a href="<?php menu_page_url( 'import_posts', true ); ?>" class="button action"><?php echo __('Import Posts'); ?></a><br />
        <?php
	}
	
	/**
	 * Add Export Submenu.
	 *
	 * @since    1.0.0
	 */
	public function eip_add_submenu_export() {
		add_submenu_page( 'export_import', __('Export Posts'), __('Export Posts'), 'edit_themes', 'export_posts', array($this,'display_export_page') );
	}
	
	/**
	 * Display Export Page Content.
	 *
	 * @since    1.0.0
	 */
	public function display_export_page() {
		global $title;
		?>
        <h2 class="title"><?php echo $title; ?></h2>
        <?php
		do_action( 'eip_exporter_form' );
	}
	
	/**
	 * Add Import Submenu.
	 *
	 * @since    1.0.0
	 */
	public function eip_add_submenu_import() {
		add_submenu_page( 'export_import', __('Import Posts'), __('Import Posts'), 'edit_themes', 'import_posts', array($this,'display_import_page') );
	}
	
	/**
	 * Display Export Page Content.
	 *
	 * @since    1.0.0
	 */
	public function display_import_page() {
		global $title;
		?>
        <h2 class="title"><?php echo $title; ?></h2>
        <?php
		wp_import_upload_form( 'admin.php?import=wordpress&amp;step=1' );
	}
	
	
	/**
	 * Export Form
	 *
	 * @since 0.0.1
	 */
	public function eip_exporter_form_display() {
		?>
        <a href="<?php echo admin_url('admin-ajax.php'); ?>?action=eipexportform" class="button button-primary button-large" id="exportform" target="_blank">Click here to Export</a>
        <?php
	}
	
	function eip_exporter_form_ajax() {		
		require_once( plugin_dir_path( __FILE__ ) . 'wxr.php' );					
		_export_wp();
		die();	
		exit;
	}

	
	/**
	 * Export Action
	 *
	 * @since 0.0.1
	 */
	public function eip_export_action() {		
		require_once( plugin_dir_path( __FILE__ ) . 'wxr.php' );					
		_export_wp();
		die();			
	}
	
}
