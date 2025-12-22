<?php
namespace SpaterCore\Admin;

class Menu {
    function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }
    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu() {
        $parent_slug = 'spater-core';
        $capability = 'manage_options';

        add_menu_page( __( 'Spater Core', 'spater-core' ), __( 'Spater', 'spater-core' ), $capability, $parent_slug, [ $this, 'plugin_page' ], plugins_url( 'assets/images/icons/icon.png', SPATER_CORE_FILE ), '6' );
        add_submenu_page( $parent_slug, __( 'Header Footer', 'spater-core' ), __( 'Header Footer', 'spater-core' ), $capability, $parent_slug, [ $this, 'plugin_page' ] );
        add_submenu_page( $parent_slug, __( 'Settings', 'spater-core' ), __( 'Settings', 'spater-core' ), $capability, 'spater-core-settings', [ $this, 'settings_page' ] );

    }

    public function plugin_page() {
        echo '<div class="wrap">';
        echo '<h1>Welcome to Spater Technology!</h1>';
        echo '</div>';
    }

    /**
     * Handles the settings page
     *
     * @return void
     */
    public function settings_page() {
        echo '<div class="wrap">';
        echo '<h1>Settings Page</h1>';
        echo '</div>';
    }
}