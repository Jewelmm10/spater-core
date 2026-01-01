<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="wrap spater-dashboard">

    <h1>Welcome to Spater Core</h1>

    <p>
        Version: <strong><?php echo SPATER_CORE_VERSION; ?></strong>
    </p>

    <p>
        Elementor Status:
        <?php if ( did_action( 'elementor/loaded' ) ) : ?>
        <span style="color:green;">Active</span>
        <?php else : ?>
        <span style="color:red;">Not Installed</span>
        <?php endif; ?>
    </p>

    <hr>

    <h2>Quick Links</h2>
    <ul>
        <li><a href="admin.php?page=spater-widgets">Manage Widgets</a></li>
        <li><a href="#">Documentation</a></li>
        <li><a href="#">Support</a></li>
    </ul>

</div>