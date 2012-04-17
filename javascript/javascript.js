//document.getElementbyId('myOutput').innerHTML;
		$(document).ready(function(){
			  $(".button").click(function(){
			  	$('#lodingimg').show();
			  	$('.button').hide();
				txt="textarea1="+$(".textarea").val();
				    $.post("compair.php",txt,function(result){
				    $(".result1").html(result);
				    $(".level4_content").hide();
				    });
			  });
		
		
		 $("#moreapp").click(function(){
		$(".result2").load('displayData/moreapp.txt');
		$(".level4_content").hide();
		$(".result1").hide();
			});
			
		 $("#contact").click(function(){
		$(".result2").load('displayData/contact.txt');
		$(".level4_content").hide();
		$(".result1").hide();
			  });
			  
		
		$("#termofuse").click(function(){
		$(".result2").load('displayData/termofuse.txt');
		$(".level4_content").hide();
		$(".result1").hide();
			  });
		
		$(".suggestionbox_heading").click(function(){
		$(".box").slideToggle("slow");
			});		
		
		 $("#submit").click(function(){
			  	
			  	$('.box_input').hide();
				txt="name="+$("#name").val()+"&email="+$("#email").val()+"&comm="+$("#comm").val();
				//alert(txt);
				    $.post("suggestion.php",txt,function(result){
			  	$('#boxresult').show();
				    });
			  });
		
		});
