//document.getElementbyId('myOutput').innerHTML;
		$(document).ready(function(){
			  $("input").click(function(){
			  	$('#lodingimg').show();
			  	$('.button').hide();
				txt="textarea1="+$("textarea").val();
				    $.post("compair.php",txt,function(result){
				    $(".result1").html(result);
				    $(".level4_content").hide();
				    });
			  });
		
		
		 $("#moreapp").click(function(){
		$(".result2").load('displayData/moreapp.txt');
		$(".level4_content").hide();
			});
			
		 $("#contact").click(function(){
		$(".result2").load('displayData/contact.txt');
		$(".level4_content").hide();
			  });
			  
		
		$("#termofuse").click(function(){
		$(".result2").load('displayData/termofuse.txt');
		$(".level4_content").hide();
			  });
		});
