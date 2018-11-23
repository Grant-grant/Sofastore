	  	function clear_field_edit()  {  
			var edit_product=$(".edit_product");	
			edit_product.find("input[name=edit_id]").val('');
			edit_product.find("input[name=edit_name]").val('');
			edit_product.find("input[name=edit_code]").val('');
			edit_product.find("#edit_preview").html('');
			edit_product.find("input[name=edit_price]").val('');
			edit_product.find("input[name=edit_old_price]").val('');
			edit_product.find("textarea[name=edit_description]").val('');	
			
			edit_product.find("input[name=edit_color]").val('');
			edit_product.find("input[name=edit_size]").val('');
			edit_product.find("input[name=edit_color_legs]").val('');
			edit_product.find("input[name=edit_sleep_size]").val('');		
			edit_product.find("input[name=edit_set_size]").val('');
			edit_product.find("input[name=edit_fasad_karkas]").val('');	
			edit_product.find("input[name=edit_mechanism]").val('');	
			edit_product.find("input[name=edit_filling]").val('');	
			edit_product.find("input[name=edit_drawer]").val('');	
			edit_product.find("input[name=edit_removable_cover]").val('');	
			
			edit_product.find("input[name=edit_complekt]").val('');
			$('input[name=edit_photoimg]').val('');				
        }  
		
		function clear_field_new_product()  {  
			var creat_product=$(".creat_product");		
			creat_product.find("input[name=name]").val('');
			creat_product.find("input[name=code]").val('');
			creat_product.find("#preview").html('');
			creat_product.find("input[name=price]").val('');
			creat_product.find("input[name=old_price]").val('');
			creat_product.find("textarea[name=description]").val('');
			creat_product.find("input[name=color]").val('');
			creat_product.find("input[name=size]").val('');
			
			creat_product.find("input[name=color_legs]").val('');
			creat_product.find("input[name=sleep_size]").val('');		
			creat_product.find("input[name=set_size]").val('');			
			creat_product.find("input[name=fasad_karkas]").val('');
			creat_product.find("input[name=mechanism]").val('');
			creat_product.find("input[name=filling]").val('');
			creat_product.find("input[name=drawer]").val('');		
			creat_product.find("input[name=removable_cover]").val('');
			
			creat_product.find("input[name=complekt]").val('');		
			$('input[name=photoimg]').val('');
        }  
				
		$('#category_select').live("change", function(){    
			var page= 1;
			var category_id=$(this).val();	
			$.ajax({                
					type:"POST",
					url: "ajax.php",
					data: { url: "catalog.php",page:page,category_id:category_id},
					cache: false,  
					success: function(data){
						$("#content").html(data);  
					}  				
			}); 			
		});	
		
		$('a[rel=pagination]').live("click", function(){	
			var  page=$(this).attr('page');
			var category_id=$('#category_select').val();
			$.ajax({                
					type:"POST",
					url: "ajax.php",
					data: { url: "catalog.php",page:page,category_id:category_id},
					cache: false,  
					success: function(data){
						$("#content").html(data);  
					}  				
			}); 			
		});	
		
		$('a[rel=creat_new_product]').live("click", function(){
			$(".edit_product").hide();
			centerPosition($(".creat_product"));  
			$(".creat_product").animate({ opacity: "show" }, 500 ); 
		}); 
		
		$('a[rel=save_new_product]').live("click", function(){		
			var filepath=$('input[type=file]').val();
			var arr= filepath.split('\\');
			var filename=arr[arr.length-1];	
			var name=$.trim($(".creat_product").find('input[name=name]').val());
			var code=$.trim($(".creat_product").find('input[name=code]').val());
			var price=$.trim($(".creat_product").find('input[name=price]').val())-0;
			var old_price=$.trim($(".creat_product").find('input[name=old_price]').val())-0;
			var cat_id=$("#new_prod_category").val();
			var desc=$.trim($(".creat_product").find('textarea[name=description]').val());			
			var color=$.trim($(".creat_product").find('input[name=color]').val());
			var size=$.trim($(".creat_product").find('input[name=size]').val());
			
			var color_legs=$.trim($(".creat_product").find('input[name=color_legs]').val());
			var sleep_size=$.trim($(".creat_product").find('input[name=sleep_size]').val());			
			var set_size=$.trim($(".creat_product").find('input[name=set_size]').val());
			var fasad_karkas=$.trim($(".creat_product").find('input[name=fasad_karkas]').val());			
			var mechanism=$.trim($(".creat_product").find('input[name=mechanism]').val());
			var filling=$.trim($(".creat_product").find('input[name=filling]').val());			
			var drawer=$.trim($(".creat_product").find('input[name=drawer]').val());
			var removable_cover=$.trim($(".creat_product").find('input[name=removable_cover]').val());
			
			var complekt=$.trim($(".creat_product").find('input[name=complekt]').val());
			
			var err=0;			
			if(!code||!desc||!name){err="Все поля должны быть заполнены!";}
			else if((typeof price)!="number"||!price){err="Введите правильную цену!";}
			if(err!=0)
			{
				indication($("#message"),err, false);
			}
			else		
			$.ajax({                
					type:"POST",
					url: "ajax.php",
					data: {url: "action/add_product.php",
					name:name,cat_id:cat_id,code:code,price:price,
					old_price:old_price,desc:desc,color:color,size:size,color_legs:color_legs,
					sleep_size:sleep_size,set_size:set_size,
					fasad_karkas:fasad_karkas,mechanism:mechanism,
					filling:filling,drawer:drawer,
					removable_cover:removable_cover, complekt:complekt,
					image_url:filename},
					cache: false,  
					success: function(data){
		
					var response = eval("(" + data + ")");		
					indication($("#message"),response.msg, response.status);
					$(".creat_product").hide();
						
					var  page=1;
					$.ajax({                
						type:"POST",
						url: "ajax.php",
						data: { url: "catalog.php",page:page,category_id:cat_id},
						cache: false,  
						success: function(data){
						$("#content").html(data);  
						}							
						});						
						}				
					}); 
		});
		
		$('a[rel=cancel_creat_new_product]').live("click", function(){	
				clear_field_new_product();
				$(".creat_product").animate({ opacity: "hide" }, 500 );
		}); 
	
		$('a[rel=edit]').live("click", function(){
			var edit_product=$(".edit_product");
			$(".edit_btn_cansel_load_img").css('display','none');
			$(".creat_product").hide();
			centerPosition(edit_product);  
			edit_product.animate({ opacity: "show" }, 500 );			
			var id=$(this).attr('id');
			var code_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=code]").text();	
			var name_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=name]").text();			
			var desc_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=desc]").text();
			var price_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=price]").text();	
			var old_price_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=old_price]").text();	
			var color_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=color]").text();
			var size_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=size]").text();
			
			var color_legs_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=color_legs]").text();
			var sleep_size_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=sleep_size]").text();	
			var set_size_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=set_size]").text();
			var fasad_karkas_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=fasad_karkas]").text();
			var mechanism_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=mechanism]").text();
			var filling_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=filling]").text();
			var drawer_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=drawer]").text();
			var removable_cover_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=removable_cover]").text();
			
			var complekt_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=complekt]").text();
			
			var category_product = $("tr[id="+$(this).attr('id')+"]").find("td[class=cat_id]").attr('id');
			var image_url_product = $("tr[id="+$(this).attr('id')+"]").find("img[class=uploads]").attr('src');
			edit_product.find("input[name=edit_id]").val(id);
			edit_product.find("input[name=edit_name]").val(name_product);
			edit_product.find("input[name=edit_code]").val(code_product);
		
			edit_product.find("#edit_category [value='"+category_product+"']").attr("selected", "selected");
			
			$(".edit_btn_load_img").css('display','block');
			
			if(image_url_product!="../uploads/none.png"){		
			$(".edit_btn_load_img").css('display','none');
			edit_product.find("#edit_preview").html("<img src='"+image_url_product+"' width='100' height='100'/>");
			edit_product.find(".edit_btn_cansel_load_img").css('display','block');	}
		
			edit_product.find("input[name=edit_price]").val(price_product);	
			edit_product.find("input[name=edit_old_price]").val(old_price_product);				
			edit_product.find("input[name=edit_color]").val(color_product);
			edit_product.find("input[name=edit_size]").val(size_product);
			
			edit_product.find("input[name=edit_color_legs]").val(color_legs_product);
			edit_product.find("input[name=edit_sleep_size]").val(sleep_size_product);
			edit_product.find("input[name=edit_set_size]").val(set_size_product);
			edit_product.find("input[name=edit_fasad_karkas]").val(fasad_karkas_product);
			edit_product.find("input[name=edit_mechanism]").val(mechanism_product);
			edit_product.find("input[name=edit_filling]").val(filling_product);
			
			edit_product.find("input[name=edit_drawer]").val(drawer_product);
			edit_product.find("input[name=edit_removable_cover]").val(removable_cover_product);
			edit_product.find("input[name=edit_complekt]").val(complekt_product);
			
			edit_product.find("textarea[name=edit_description]").val(desc_product);			
		}); 			

		$('a[rel=save_edit_product]').live("click", function(){   
		var id=$.trim($('input[name=edit_id]').val());			
		var filepath=$('input[name=edit_photoimg]').val();			
			
			if(filepath!=""){
			var arr=filepath.split('\\');
			var image_url_product=arr[arr.length-1];				
			}
			else{
			var image_url_product = $("tr[id="+id+"]").find("img[class=uploads]").attr('src');	
			var arr=image_url_product.split('/');
			image_url_product=arr[arr.length-1];	
			}
		
			var name=$.trim($('input[name=edit_name]').val());
			var code=$.trim($('input[name=edit_code]').val());
			var price=$.trim($('input[name=edit_price]').val())-0;
			var old_price=$.trim($('input[name=edit_old_price]').val())-0;
			var cat_id=$("#edit_category").val();
			var desc=$.trim($('textarea[name=edit_description]').val());
			var err=0;
			
			var color=$.trim($('input[name=edit_color]').val());
			var size=$.trim($('input[name=edit_size]').val());			
			var color_legs=$.trim($('input[name=edit_color_legs]').val());
			var sleep_size=$.trim($('input[name=edit_sleep_size]').val());	
			var set_size=$.trim($('input[name=edit_set_size]').val());
			var fasad_karkas=$.trim($('input[name=edit_fasad_karkas]').val());
			var mechanism=$.trim($('input[name=edit_mechanism]').val());
			var filling=$.trim($('input[name=edit_filling]').val());
			var drawer=$.trim($('input[name=edit_drawer]').val());
			var removable_cover=$.trim($('input[name=edit_removable_cover]').val());
			
			var complekt=$.trim($('input[name=edit_complekt]').val());
			
			if(!name||!code||!desc){err="Все поля должны быть заполнены!";}
			else if((typeof price)!="number"||!price){err="Введите правильную цену!";}
			
			if(err!=0)	{
				$("#message").animate({ opacity: "show" }, "slow" );
				$("#message").html(err); 
				$("#message").css('background','#fab0ab');
				$("#message").css('border-color','#fc6f64');			
				$("#message").animate({ opacity: "hide" }, 3000 );
			}
		else		
			$.ajax({                
					type:"POST",
					url: "ajax.php",
					data: {url: "action/edit_product.php",
					id:id,
					name:name,
					code:code,
					cat_id:cat_id,
					price:price,
					old_price:old_price,
					
					color:color,
					size:size,					
					color_legs:color_legs,
					sleep_size:sleep_size,
					set_size:set_size,
					fasad_karkas:fasad_karkas,
					mechanism:mechanism,
					filling:filling,
					drawer:drawer,
					removable_cover:removable_cover,
					complekt:complekt,
					
					desc:desc,
					image_url:image_url_product
					},
					cache: false,  
					success: function(data){				
							var response = eval("(" + data + ")");									
							indication($("#message"),response.msg, response.status);
							$(".edit_product").animate({ opacity: "hide" }, 500 );								
							$("tr[id="+id+"]").find("td[class=code]").text(code);	
							$("tr[id="+id+"]").find("td[class=cat_id]").text($("#edit_category :selected").text());	
							$("tr[id="+id+"]").find("td[class=name]").text(name);			
							$("tr[id="+id+"]").find("td[class=desc]").text(desc);
							
							$("tr[id="+id+"]").find("td[class=color]").text(color);
							$("tr[id="+id+"]").find("td[class=size]").text(size);
							
							$("tr[id="+id+"]").find("td[class=color_legs]").text(color_legs);
							$("tr[id="+id+"]").find("td[class=sleep_size]").text(sleep_size);
							$("tr[id="+id+"]").find("td[class=set_size]").text(set_size);
							$("tr[id="+id+"]").find("td[class=fasad_karkas]").text(fasad_karkas);
							$("tr[id="+id+"]").find("td[class=mechanism]").text(mechanism);
							$("tr[id="+id+"]").find("td[class=filling]").text(filling);
							$("tr[id="+id+"]").find("td[class=drawer]").text(drawer);
							$("tr[id="+id+"]").find("td[class=removable_cover]").text(removable_cover);		
							
							$("tr[id="+id+"]").find("td[class=complekt]").text(complekt);	
							
							$("tr[id="+id+"]").find("td[class=price]").text(price);
							$("tr[id="+id+"]").find("td[class=old_price]").text(old_price);
							$("tr[id="+id+"]").find("td[class=image_url]").html("");
							if(!image_url_product)image_url_product="none.png";
							$("tr[id="+id+"]").find("td[class=image_url]").html("<img class='uploads' src='../uploads/"+image_url_product+"' width='80' height='80'/>");
							clear_field_edit();  
					}				
			}); 
		});
			
		$('#edit_form_del_img').live('click', function(){ 
		var id=$.trim($('input[name=edit_id]').val());	
		$("tr[id="+id+"]").find("img[class=uploads]").attr('src', '');
			$.ajax({                
				type: "POST",
				url: "ajax.php",
				data: {url: "action/del_image.php",	 id: id },
                cache: false,  
                success: function(data){  
			        $("#edit_preview").html('');  	
					$(".edit_btn_load_img").css('display','block');
					$(".edit_btn_cansel_load_img").css('display','none');					
                }  
            }); 
		});
		
		$('#form_del_img').live('click', function(){
			    $("#preview").html('');  			
				$('input[name=photoimg]').val('');
				$(".btn_cansel_load_img").css('display', 'none');
				$(".btn_load_img").css('display',  'block');					
            }  
        );  
		
		$('a[rel=cancel_edit_product]').live("click", function(){	
				clear_field_edit();  
				$(".edit_product").animate({ opacity: "hide" }, 500 );
		}); 
		$('a[rel=del]').live("click", function(){		
			var page=$("div.pagination").find("a[class=activ]").attr('page');
			var category_id=$('#category_select').val();	
			$.ajax({                
						type:"POST",
						url: "ajax.php",
						data: {url: "action/delete_product.php",
						id:$(this).attr('id')			
						},
						cache: false,  
						success: function(data){						
							var response = eval("(" + data + ")");		
							indication($("#message"),response.msg, response.status);							
							$.ajax({                
							type:"POST",
							url: "ajax.php",
							data: { url: "catalog.php",page:page,category_id:category_id },
							cache: false,  
							success: function(data){
								$("#content").html(data);  
							}  
							}); 					
						}				
					}); 
		}); 