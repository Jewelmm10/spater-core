<?php
$settings = get_option( 'spater_core_layouts', [] );

$defaults = [
  'type' => 'default',
  'template_id' => '',
  'display' => 'entire_site'
];
?>

<div class="wrap">
    <h1>Header & Footer Builder</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'spater_layouts_group' ); ?>

        <h2>Header</h2>
        <table class="form-table">
            <tr>
                <th>Type</th>
                <td>
                    <select name="spater_core_layouts[header][type]">
                        <option value="default" <?php selected($settings['header']['type'] ?? '', 'default'); ?>>Theme
                            Default</option>
                        <option value="elementor" <?php selected($settings['header']['type'] ?? '', 'elementor'); ?>>
                            Elementor</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>Template</th>
                <td>
                    <?php wp_dropdown_pages([
      'post_type' => 'elementor_library',
      'name' => 'spater_core_layouts[header][template_id]',
      'selected' => $settings['header']['template_id'] ?? '',
    ]); ?>
                </td>
            </tr>

            <tr>
                <th>Display On</th>
                <td>
                    <select name="spater_core_layouts[header][display]">
                        <option value="entire_site">Entire Site</option>
                        <option value="singular">Singular</option>
                        <option value="archive">Archive</option>
                    </select>
                </td>
            </tr>
        </table>

        <hr>

        <h2>Footer</h2>
        <table class="form-table">
            <tr>
                <th>Type</th>
                <td>
                    <select name="spater_core_layouts[footer][type]">
                        <option value="default">Theme Default</option>
                        <option value="elementor">Elementor</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th>Template</th>
                <td>
                    <?php wp_dropdown_pages([
      'post_type' => 'elementor_library',
      'name' => 'spater_core_layouts[footer][template_id]',
      'selected' => $settings['footer']['template_id'] ?? '',
    ]); ?>
                </td>
            </tr>

            <tr>
                <th>Display On</th>
                <td>
                    <select name="spater_core_layouts[footer][display]">
                        <option value="entire_site">Entire Site</option>
                        <option value="singular">Singular</option>
                        <option value="archive">Archive</option>
                    </select>
                </td>
            </tr>
        </table>

        <?php submit_button(); ?>
    </form>
</div>