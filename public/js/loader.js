$('#photoimg').live('change', function(){ 
		$("#preview").html('');
		$("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
		$("#imageform").ajaxForm({
			target: '#preview'	}).submit();
		$(".btn_cansel_load_img").css('display', 'block');
		$(".btn_load_img").css('display',  'none');	
	});	
		
	$('#edit_photoimg').live('change', function(){ 
			   $("#edit_preview").html('');
			   $("#edit_preview").html('<img src="loader.gif" alt="Uploading...."/>');
			   $("#edit_imageform").ajaxForm({				
					target: '#edit_preview'
				}).submit();
	});
	$("#category_select [value='<?=$category_id?>']").attr("selected", "selected");