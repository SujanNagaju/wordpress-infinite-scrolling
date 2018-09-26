jQuery(function($){
	/*-------------------------------------
	---Ajax load more with button click-----
	--------------------------------------*/
	jQuery('.load-more').click(function(){
		// console.log('load more posts');
		var current_page = $(this).data('page');
		//var next_page = current_page + 1;
		jQuery.ajax({
			type: 'POST',
			url: myAjax.ajax_url,
			data: {action: 'show_more_posts', current_page:current_page},

			error : function(response){
				console.log(response.result);

			}, 

			success : function(response){
				$('.load-more').data('page',response.current_page);
				$('.post-listing').append(response.result);
				if(response.result == 'NO MORE POSTS'){
					$('.load-more').hide();
				}
			}
		});
		//console.log(current_page);
	});

	/*-----------------------------------
	----Ajax Infinite Scroll ------------
	------------------------------------*/
	function isOnScreen(elem) {
		// if the element doesn't exist, abort
		if( elem.length == 0 ) {
			return;
		}
		var $window = jQuery(window)
		var viewport_top = $window.scrollTop()
		var viewport_height = $window.height()
		var viewport_bottom = viewport_top + viewport_height
		var $elem = jQuery(elem)
		var top = $elem.offset().top - 100
		var height = $elem.height()
		var bottom = top + height

		return (top >= viewport_top && top < viewport_bottom) ||
		(bottom > viewport_top && bottom <= viewport_bottom) ||
		(height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
	}
	var stop_loadmore = false;
	$(window).on('scroll', function(e) {
		var load_posts = $('.load-posts'),
		current_page = load_posts.data('page');

		if( isOnScreen( load_posts ) && false === stop_loadmore ) {  
			stop_loadmore = true;
			// Pass element id/class you want to check 	
			jQuery.ajax({
				type: 'POST',
				url: myAjax.ajax_url,
				data: {
					action: 'load_posts',
					current_page:current_page
				}, 

				error : function(response){
					console.log(response.output);
				} ,

				success : function(response){
					load_posts.data('page', response.current_page);
					$('.magazine-lists').append(response.output);
					if(response.output == 'NO MORE POSTS'){
						load_posts.hide();
						stop_loadmore = true;
						return false;
					}
					stop_loadmore = false;
				}

			});

			
		}

	});
});