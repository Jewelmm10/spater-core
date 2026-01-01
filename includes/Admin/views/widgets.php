<?php
use SpaterCore\Admin\WidgetToggle;

$toggle = new WidgetToggle();
$widgets = $toggle->get_widgets();
$saved   = $toggle->get_saved();
?>

<div class="wrap">

    <h1>Elementor Widgets</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'spater_widgets_group' ); ?>

        <table class="widefat striped">
            <thead>
                <tr>
                    <th>Widget</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ( $widgets as $key => $label ) : ?>
                <tr>
                    <td><?php echo esc_html( $label ); ?></td>
                    <td>
                        <input type="checkbox" name="spater_core_widgets[<?php echo esc_attr( $key ); ?>]" value="1"
                            <?php checked( isset( $saved[$key] ) ); ?>>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php submit_button(); ?>
    </form>

</div>