<?php
namespace SpaterCore\Admin;

if ( ! defined( 'ABSPATH' ) ) exit;

class WidgetToggle {

    private $option_name = 'spater_core_widgets';

    public function __construct() {
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    public function register_settings() {
        register_setting(
            'spater_widgets_group',
            $this->option_name
        );
    }

    public function get_widgets() {
        return [
            'hero' => 'Hero Section',
            'cta'  => 'Call To Action',
            'post_grid' => 'Post Grid',
        ];
    }

    public function get_saved() {
        return get_option( $this->option_name, [] );
    }
}