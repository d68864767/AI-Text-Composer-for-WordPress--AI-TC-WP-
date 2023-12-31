```php
<?php
/**
 * The settings of the AI Text Composer for WordPress
 *
 * @package     AI-TC-WP
 * @author      Your Name
 * @license     GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class AI_TC_WP_Settings {

	/**
	 * The unique identifier of this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
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
	 * Register the settings page for the admin area.
	 */
	public function add_settings_page() {
		add_options_page(
			'AI Text Composer for WordPress Settings', // page_title
			'AI-TC-WP Settings', // menu_title
			'manage_options', // capability
			'ai-tc-wp', // menu_slug
			array( $this, 'create_settings_page' ) // function
		);
	}

	/**
	 * Create the settings page for the admin area.
	 */
	public function create_settings_page() {
		// Check user capabilities
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		// Add settings page content
		echo '<div class="wrap">';
		echo '<h1>' . esc_html( get_admin_page_title() ) . '</h1>';
		echo '<form action="options.php" method="post">';
		settings_fields( 'ai-tc-wp' );
		do_settings_sections( 'ai-tc-wp' );
		submit_button( 'Save Settings' );
		echo '</form>';
		echo '</div>';
	}
}
```
