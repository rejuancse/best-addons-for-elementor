/*-------------------------
 * X-Extensions for WooCommerce
 *------------------------- */
jQuery(document).ready(function($){

	/**
	 * x-extension color picker
	 *--------------------------------- */ 
	$('.xewc-color-field').wpColorPicker();

	/*
	 * x-extension enable/disable.
	 *---------------------------------- */ 
	$(document).on('change', '.xewc_extensions_list_item', function(e) {
        var $that = $(this);
        var isEnable = $that.prop('checked') ? 1 : 0;
        var addonFieldName = $that.attr('name');
        $.ajax({
            url : ajaxurl,
            type : 'POST',
            data : { 
				isEnable:isEnable, 
				addonFieldName:addonFieldName, 
				action : 'xewc_addon_enable_disable'
			},
            success: function (data) {
                if (data.success){
                    //Success
                }
            }
        });
    });
});
