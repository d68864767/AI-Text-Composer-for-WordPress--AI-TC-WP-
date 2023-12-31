```php
<?php
/**
 * The admin-specific functionality of the AI Text Composer for WordPress.
 *
 * @package     AI-TC-WP
 * @author      Your Name
 * @license     GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class AI_TC_WP_Admin {

	/**
	 * The unique identifier of this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 */
	protected $version;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct() {
		$this->plugin_name = 'ai-tc-wp';
		$this->version = '1.0.0';
	}

	/**
	 * Register the stylesheets for the admin area.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . '../assets/css/ai-tc-wp-style.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . '../assets/js/ai-tc-wp-script.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 */
	public function add_plugin_admin_menu() {
		add_menu_page( 'AI Text Composer for WordPress', 'AI-TC-WP', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'), 'dashicons-admin-generic', 9 );
	}

	/**
	 * Render the settings page for this plugin.
	 */
	public function display_plugin_setup_page() {
		include_once( 'partials/ai-tc-wp-admin-display.php' );
	}

	/**
	 * Register the settings.
	 */
	public function options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

	/**
	 * Validate all options fields.
	 */
	public function validate($input) {
		// All checkboxes inputs
		$valid = array();

		// Cleanup
		$valid['cleanup'] = (isset($input['cleanup']) && !empty($input['cleanup'])) ? 1 : 0;

		return $valid;
	}
}
```
