<?php
namespace SpaterCore\Admin;

class HeaderFooterMeta {

    public function __construct() {
        add_action( 'add_meta_boxes', [ $this, 'metabox' ] );
        add_action( 'save_post', [ $this, 'save' ] );
    }

    public function metabox() {
        add_meta_box(
            'spater-hf-settings',
            'Header Footer Settings',
            [ $this, 'render' ],
            'spater_header_footer',
            'normal',
            'high'
        );
    }

    public function render( $post ) {

        $type = get_post_meta( $post->ID, '_spater_hf_type', true );
        $display = get_post_meta( $post->ID, '_spater_hf_display', true );
        ?>

<p>
    <label><strong>Type</strong></label>
    <select name="spater_hf_type">
        <option value="header" <?php selected($type,'header'); ?>>Header</option>
        <option value="footer" <?php selected($type,'footer'); ?>>Footer</option>
    </select>
</p>

<p>
    <label><strong>Display On</strong></label>
    <select name="spater_hf_display">
        <option value="entire_site">Entire Site</option>
        <option value="singular">Singular</option>
        <option value="archive">Archive</option>
    </select>
</p>
<?php
    }

    public function save( $post_id ) {
        if ( isset($_POST['spater_hf_type']) ) {
            update_post_meta( $post_id, '_spater_hf_type', $_POST['spater_hf_type'] );
        }
        if ( isset($_POST['spater_hf_display']) ) {
            update_post_meta( $post_id, '_spater_hf_display', $_POST['spater_hf_display'] );
        }
    }
}