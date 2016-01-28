jQuery.fn.selectReplace = function() {
	return this.each(function() {
		var $this = jQuery(this);

		if ( !$this.parents('.custom-select').length ) {
			var wrap_tag = 'div';
			var $overlay = $('<' + wrap_tag + ' class="custom-select-overlay">' + '<span class="custom-select-value">' + '</span>' + '<small class="custom-select-button">' + '<i class="custom-select-arrow">' + '</i>' + '</small>' + '</' + wrap_tag + '>')

			$this.wrap('<' + wrap_tag + ' class="custom-select" />');
			$this.parents('.custom-select').prepend($overlay);
		}
                
            jQuery(document).on('change', '.select-replace', function() {
			var $this = $(this);
                        var $id = $this.attr('id');
                        var $opcion = $("#"+$id+" option:selected").text();        
                        
                        $this.parents('.custom-select').find('.custom-select-value').text($opcion);
		});

		
                
           jQuery('.select-replace').trigger('change');
	});
}

jQuery.selectReplace = function() {
	jQuery('.select-replace').selectReplace();
}