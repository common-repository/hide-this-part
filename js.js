jQuery(document).ready(function() {
	jQuery('.hide-this-part-more').click(function () {
		
		// Get the hidden element
		var hidden_element = jQuery('#'+this.id).next();
		hidden_element.slideToggle('slow');
		
		// Change the more link text
		if(hidden_element.attr('status') === 'invisible') {
			hidden_element.attr('status', 'visible');
			
			// Make the morelink a lesslink
			jQuery('#'+this.id).text('Less »');
		}
		else {
			hidden_element.attr('status', 'invisible');
			
			// Get the morelink text, that the user wants to be displayed
			var morelink_text = jQuery('#'+this.id).attr('morelink-text');
			
			// Make the lesslink a more link
			jQuery('#'+this.id).text(morelink_text+'  »');
		}
	});
});