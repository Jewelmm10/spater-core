<?php
/**
 * Plugin Name:       Spater Core
 * Plugin URI:        https://edbd-server.com/plugins/spater-core/
 * Description:       Core functionality plugin for the Spater WordPress theme. Includes Elementor widgets, custom post types, and theme-related features.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.4
 * Author:            Md Jewel Miah
 * Author URI:        https://www.linkedin.com/in/jewelmm9/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       spater-core
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

require_once __DIR__ . '/vendor/autoload.php';

final class Spater_Core {

    const VERSION = '1.0.0';
    
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }
    /**
     * Initializes the singleton instance
     *
     * @return Spater_Core
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define plugin constants
     */
    public function define_constants() {
        define( 'SPATER_CORE_VERSION', self::VERSION );
        define( 'SPATER_CORE_FILE', __FILE__ );
        define( 'SPATER_CORE_PATH', __DIR__ );
        define( 'SPATER_CORE_URL', plugins_url( '', SPATER_CORE_FILE ) );
        define( 'SPATER_CORE_ASSETS', SPATER_CORE_URL . '/assets' );
    }

    public function init_plugin() {
        if ( is_admin() ) {
            new SpaterCore\Admin();
        }
    }

    /**
     * Plugin activation hook
     */
    public function activate() {
        $installed = get_option( 'spater_core_installed' );

        if ( ! $installed ) {
            update_option( 'spater_core_installed', time() );
        }

        update_option( 'spater_core_version', SPATER_CORE_VERSION );
    }
}

/**
 * Returns the main plugin instance
 *
 * @return Spater_Core
 */
function Spater_Core() {
    return Spater_Core::init();
}
// Initialize the plugin
Spater_Core();