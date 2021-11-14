<div class="wrap wpew-wrap">
    <div id="wpew-tabs" class="wpew-settings-panel wpew-main-setting-panel">
        <div class="wpew-tabs-content wpew-main-setting-content">
            <table class="form-table wpew-option-table wpew-main-setting-table">
                <tr class="wpew-field wpew-field-group">
                    <th>
                        <?php _e('Products Listing Shortcodes', 'wpew'); ?>
                    </th>

                    <td>
                        <h3><?php _e('Integration code by theme location', 'wpew'); ?></h3>
                        <?php
                            echo '<div class="wpew-integration-code">';
                                echo "<p class='integration-code-row'> <span>PHP</span>  <code> &lt;?php echo do_shortcode('[product_listing]') ?&gt;</code></p>";
                                echo "<p class='integration-code-row'> <span>SHORTCODE</span> <code> [product_listing] </code> </p>";
                            echo '</div>';
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="clear"></div>
    </div>
</div>
