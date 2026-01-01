<?php
namespace SpaterCore\Theme;

class HeaderFooterRender {

    public function __construct() {
        add_action( 'wp', [ $this, 'render' ] );
    }

    public function render() {

        $items = get_posts([
            'post_type' => 'spater_header_footer',
            'post_status' => 'publish',
            'numberposts' => -1
        ]);

        foreach ( $items as $item ) {

            $type = get_post_meta( $item->ID, '_spater_hf_type', true );
            $display = get_post_meta( $item->ID, '_spater_hf_display', true );

            if ( ! $this->match( $display ) ) continue;

            if ( $type === 'header' ) {
                add_action( 'wp_body_open', function () use ( $item ) {
                    echo \Elementor\Plugin::instance()
                        ->frontend
                        ->get_builder_content_for_display( $item->ID );
                });
            }

            if ( $type === 'footer' ) {
                add_action( 'wp_footer', function () use ( $item ) {
                    echo \Elementor\Plugin::instance()
                        ->frontend
                        ->get_builder_content_for_display( $item->ID );
                });
            }
        }
    }

    private function match( $display ) {
        return match ( $display ) {
            'singular' => is_singular(),
            'archive' => is_archive(),
            default => true
        };
    }
}