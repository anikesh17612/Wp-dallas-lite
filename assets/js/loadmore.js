var ajaxurl = loadmore_params.adminUrl+"admin-ajax.php";
		var page = 2;
		jQuery(function($) {
			jQuery('body').on('click', '.loadmore', function() {
				var data = {
					'action': 'load_posts_by_ajax',
					'page': page,
					'wpdal_loadpost': 1
				};

				jQuery.post(ajaxurl, data, function(response) {
					if(response){
						jQuery('.site-main').append(response);
						page++;
					}else{
						jQuery('.loadmore').hide();
					}
				});
			});
		});

jQuery(document).ready(function(){
	var currentBodyLayout =loadmore_params.body_layout;
	if(currentBodyLayout == 'box_layout'){
		jQuery('body').addClass('box_layout');
	}
})		