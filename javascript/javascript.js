//document.getElementbyId('myOutput').innerHTML;
		$(document).ready(function(){
			$(".button").click(function(){
				if(!$(".textarea").val())
					{alert("You Forgot to Paste your data. Please Paste the data you copied"); return ;}
				//var UserSubmitedData= $(".textarea").val();
				var RegexForOrignalData = /payload/;
				var matchpos1 = $(".textarea").val().search(RegexForOrignalData);
				if(matchpos1==-1)
					{alert("Data you have entered is incorrect. Please read the instruction carefully"); return ;}					
				var n=$(".textarea").val().match(/payload/g);
				if(n.length>1)
					{alert("You entered the same data multiple times in textbox.\n Reenter the correct data only once."); return ;}
				var RegexForCompleteData = /display_ttl/;
				var matchpos1 = $(".textarea").val().search(RegexForCompleteData);
				if(matchpos1==-1)
					{alert("Data you have entered is incomplete.\nSelect the data using 'Ctrl+A' and copy and paste in box. Please read the instruction carefully"); return ;}
				$('.button').hide();
				$('#lodingimg').show();
				txt="textarea1="+$(".textarea").val().replace(/&/g, "and");
//				    $.post("compair.php",txt,function(result){
//				    $(".result1").html(result);
//				    $(".level4_content").hide();
//				    });
				$.ajax({
						url:'compair.php',
						data:txt,
						type:'post',
						success: function(data)
						{
						    //alert('Success');
						    $(".result1").html(data);
						    $(".level4_content").hide();
						},
						error: function(XMLHttpRequest, textStatus, errorThrown)
						{
						    alert('Error : Something wrong happened..\n Please Refresh your Page');
//						    alert(xhr.status);
//						       alert(thrownError);
//						       alert(textStatus);
						       $(".result1").html(" ");
						    $(".level4_content").show();
						    $('#lodingimg').hide();
						    $('.button').show();
						}
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
		

		$(".close").click(function(){
				$("#dim").fadeOut();
				return false;
			});
			
		if(!dispCookie()){ 
				//console.log('firsttime');
				setCookie();
				$("#dim").css("height", $(document).height());
				$("#dim").fadeIn();
			}
		
		
		$(window).bind("resize", function(){
		 	$("#dim").css("height", $(window).height());
			});
		
		
		$("#submit").click(function(){
				if(!($("#comm").val()))
					alert("You Forgot to give your Suggestion");
				else
				{
					$('.box_input').hide();
					txt="name="+$("#name").val()+"&email="+$("#email").val()+"&comm="+$("#comm").val();
					//alert(txt);
					$.post("suggestion.php",txt,function(result){
						$('#boxresult').show();
					});
				}
			  });
			  
				

});// end of on ready event


		function open_win(URL){
			window.open(URL,"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=300, height=300 top=100" );
			}
		
		
		function setCookie(){
			//console.log('SetCookies');
			document.cookie= "visit"+"="+"true";
			}
		

		function getCookies(){
			//console.log('getpCookies');
			var cks = new Object();
			var ckList = document.cookie.split("; ");
			for (var i=0; i < ckList.length; i++)
				{
					var ck = ckList[i].split("=");
					cks[ck[0]] = unescape(ck[1]);
				}
			return cks;
			}
		
		
		
		function dispCookie(){		
			//console.log('dispCookies');
			var cookies = getCookies();
			var value1 = cookies["visit"];
			//console.log(value1);
			if(value1) return 1;
			else return 0;
		}
		
		
			
