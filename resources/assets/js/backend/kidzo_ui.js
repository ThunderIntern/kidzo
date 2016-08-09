; var kidzo_previewImage = {
	////////////////////////////////////////////////////////////////
	// preview image from ipnut text							  //
	////////////////////////////////////////////////////////////////
	init_previewImage: function() {
		$('.image_input').change(function(){
			var canvas = $(this).data('canvas');
			if ($(this).val() == ''){
				$('#' + canvas).attr('src', 'https://placeholdit.imgix.net/~text?txtsize=38&txt=1000x500');
			}else{
				$('#' + canvas).attr('src', $(this).val());
			}
		});
	},
	
	//////////
	// Init //
	//////////
	init: function() {
		this.init_previewImage();
	}
};


; var kidzo_ui = {
	init: function() {
		kidzo_previewImage.init();
	}
}