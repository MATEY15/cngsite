$(document).ready(function(){

    $(document).on( 'click','#load-btn', function(e) {
    	e.preventDefault();
		$(this).text('Loading...');
		var data = {
			'action': 'loadmore',
			'query': true_posts,
			'page' : current_page
		};
		$.ajax({
			url:ajaxurl,
			data:data, 
			type:'POST', 
			success:function(data){
				if( data ) { 
					$('#load').append(data);
					$('#load-btn').text('Show More');
					current_page++;
					if (current_page == max_pages) $("#load-btn").parent().remove();
				} else {
					$('#load-btn').parent().remove();
				}
			}
		});
	});

});