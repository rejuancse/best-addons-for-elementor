<div class="wrap xewc-wrap">
    <div id="xewc-tabs" class="xewc-settings-panel xewc-main-setting-panel">
        <div class="xewc-tabs-content xewc-main-setting-content">
            <table class="form-table xewc-option-table xewc-main-setting-table">
                <tr class="xewc-field xewc-field-group">
                    <th>
                        <?php _e('Products Listing Shortcodes', 'xewc'); ?>
                    </th>

                    <td>
                        <h3><?php _e('Integration code by theme location', 'xewc'); ?></h3>
                        <?php
                            echo '<div class="xewc-integration-code">';
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
