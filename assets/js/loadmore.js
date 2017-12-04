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
					jQuery('.site-main').append(response);
					page++;
				});
			});
		});