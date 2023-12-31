```php
<?php
/**
 * AI Text Composer for WordPress
 *
 * @package     AI-TC-WP
 * @author      Your Name
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: AI Text Composer for WordPress
 * Plugin URI:  https://yourwebsite.com/ai-tc-wp
 * Description: Automatically generates high-quality, SEO-optimized content for WordPress websites.
 * Version:     1.0.0
 * Author:      Your Name
 * Author URI:  https://yourwebsite.com
 * Text Domain: ai-tc-wp
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 */
function activate_ai_tc_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/ai-tc-wp-generator.php';
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_ai_tc_wp() {
	// Code to run on plugin deactivation
}

register_activation_hook( __FILE__, 'activate_ai_tc_wp' );
register_deactivation_hook( __FILE__, 'deactivate_ai_tc_wp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/ai-tc-wp-settings.php';
require plugin_dir_path( __FILE__ ) . 'includes/ai-tc-wp-search.php';
require plugin_dir_path( __FILE__ ) . 'includes/ai-tc-wp-article-structure.php';
require plugin_dir_path( __FILE__ ) . 'admin/ai-tc-wp-admin.php';
require plugin_dir_path( __FILE__ ) . 'public/ai-tc-wp-public.php';

/**
 * Begins execution of the plugin.
 */
function run_ai_tc_wp() {
	$plugin = new AI_TC_WP();
	$plugin->run();
}

run_ai_tc_wp();
```
