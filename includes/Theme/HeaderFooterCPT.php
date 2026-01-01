<?php
namespace SpaterCore\Theme;

if ( ! defined( 'ABSPATH' ) ) exit;

class HeaderFooterCPT {

    public function __construct() {
        add_action( 'init', [ $this, 'register' ] );
    }

    public function register() {

        register_post_type( 'spater_header_footer', [
            'label' => 'Header Footer',
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => false, 
            'supports' => [ 'title', 'elementor' ],
            'capability_type' => 'page',
        ]);
    }
}