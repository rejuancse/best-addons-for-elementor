<div class="wp-wpew-extensions-list">
    <h1 class="addon-list-heading">
        <?php _e('WP Elementor Widgets for Elementor', 'wpew'); ?>
    </h1>
    
    <?php
    $extensions = apply_filters('wpew_extensions_lists_config', array());
    if (is_array($extensions) && count($extensions)){
        ?>
        <div class="wp-list-table widefat plugin-install">
            <?php
            foreach ( $extensions as $basName => $addon ) {
                $addonConfig = wpew_function()->get_addon_config($basName);
                $isEnable = (bool)wpew_function()->avalue_dot('is_enable', $addonConfig); ?>

                <div class="plugin-card">
                    <div class="name column-name">
                        <h2><?php echo $addon['name']; ?></h2>
                    </div>

                    <div class="action-links">
                        <ul class="plugin-action-buttons">
                            <li>
                                <label class="btn-switch">
                                    <input type="checkbox" class="wpew_extensions_list_item" value="1" name="<?php echo $basName; ?>" <?php checked(true, $isEnable) ?> />
                                    <div class="btn-slider btn-round"></div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php
    }
    ?>
</div>
