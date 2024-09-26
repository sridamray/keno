(function($) {
  "use strict";
		$(document).ready(function(){
			$(document.body).on('added_to_cart', function() {
		        $.ajax({
		            type: 'POST',
		            url: custom_ajax_init.ajaxurl,
		            data: {
		                action: 'update_cart_count'
		            },
		            success: function(response) {
		                $('.cart-count').html(response);
		            }
		        });
		    });

// The End

	});
		
})(jQuery); 