<?php
namespace SpaterCore\Admin;

class Menu {
    function __construct() {
        add_action( 'admin_menu', [ $this, 'register_menu' ] );
    }
    /**
     * Register admin menu
     *
     * @return void
     */
    public function register_menu() {
        $parent_slug = 'spater-core';
        $capability = 'manage_options';

        add_menu_page( __( 'Spater', 'spater-core' ), 
            __( 'Spater', 'spater-core' ), 
            $capability, 
            $parent_slug, 
            [ $this, 'welcome_page' ], 
            plugins_url( 'assets/images/icons/icon.png', SPATER_CORE_FILE ), 
            '6' 
        );
        add_submenu_page(
            $parent_slug, 
            __( 'Welcome', 'spater-core' ),
            __( 'Welcome', 'spater-core' ), 
            $capability, 
            $parent_slug, 
            [ $this, 'welcome_page' ] 
        );
        add_submenu_page( 
            $parent_slug, 
            __( 'Widgets', 'spater-core' ),
            __( 'Widgets', 'spater-core' ), 
            $capability, 
            'spater-widgets', 
            [ $this, 'widgets_page' ] 
        );
        add_submenu_page(
            $parent_slug, 
            __( 'Header & Footer Builder', 'spater-core' ),
            __( 'All Header Footer', 'spater-core' ), 
            //$capability, 
            'edit_pages', 
            //'spater-layouts', 
            'edit.php?post_type=spater_header_footer'
        );

    }

    public function welcome_page() {
        include SPATER_CORE_PATH . '/includes/Admin/views/welcome.php';
    }

    public function layouts_page() {
        include SPATER_CORE_PATH . '/includes/Admin/views/layouts.php';
    }



}