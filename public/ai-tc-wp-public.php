```php
<?php
/**
 * The public-facing functionality of the AI Text Composer for WordPress.
 *
 * @package     AI-TC-WP
 * @author      Your Name
 * @license     GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class AI_TC_WP_Public {

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
	 * Register the stylesheets for the public-facing side of the site.
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . '../assets/css/ai-tc-wp-style.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . '../assets/js/ai-tc-wp-script.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Register the shortcode to display the generated article on the front-end.
	 */
	public function register_shortcode() {
		add_shortcode('ai-tc-wp', array($this, 'display_article'));
	}

	/**
	 * Display the generated article on the front-end.
	 */
	public function display_article($atts) {
		$atts = shortcode_atts(
			array(
				'title' => '',
				'placeholder' => '',
				'length' => 'medium',
			), $atts, 'ai-tc-wp' );

		$generator = new AI_TC_WP_Generator();
		$article = $generator->generate_article($atts['title'], $atts['placeholder'], $atts['length']);

		return $article;
	}
}
```
