jQuery(document).ready(function($) {
	
	$('.commentlist li').each(function(i) {
		
		$(this).find('div.commentNumber').text('#' + (i + 1));
		
	});
	
	$('#commentform').on('click','#submit',function(e) {
		
		e.preventDefault();
		
		var comParent = $(this);
	
		$('.wrap_result').
		css('color','green').
		text('Сохранение комментария').
		fadeIn(500,function() {

			var data = $('#commentform').serializeArray();

			$.ajax({

				url:$('#commentform').attr('action'),
				data:data,
				headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				type:'POST',
				datatype:'JSON',
				success: function(html) {
					if(html.error){

					} else if(html.success){
						$('.wrap_result')
						.append('<br /><strong>Comment has been saved</strong>')
						.delay(500)
						.fadeOut(200, function() {

							if(html.data.parent_id > 0) {

								comParent.parents('div#respond').prev().after('<ul class="children">' + html.comment + '</ul>');
							}
							else {
								if($.contains('#comments','ol.commentlist')) {
									$('ol.commentlist').append(html.comment);
								}
								else {

									$('#respond').before('<ol class="commentlist group">' + html.comment + '</ol>');

								}
							}




							$('#cancel-comment-reply-link').click();
						});
					}

				},
				error:function() {

				}

			});
		});

		
	});


	// $('.comment').on('click', function(e) {

	// 	var id = e.target.id;

	// 	var parent = $('#comment_parent');
	// 	parent.attr('value', id);
		
	// });
	
});

// END
