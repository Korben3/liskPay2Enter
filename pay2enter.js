// "lisk pay 2 enter - key in reference" by korben3, released under the MIT license

$(document).ready(function() {
  init();
});

//Removes the trailing space when amount is copied by user, else it will generate an invalid amount warning in lisk hub.
$(document).on('copy', '#amount', function(e){
	e.preventDefault();
	e.originalEvent.clipboardData.setData('text/plain', $("#amount").text());  
});
//same for the address
$(document).on('copy', '#address', function(e){
	e.preventDefault();
	e.originalEvent.clipboardData.setData('text/plain', $("#address").text());  
});
//and the reference field
$(document).on('copy', '#refKey', function(e){
	e.preventDefault();
	e.originalEvent.clipboardData.setData('text/plain', $("#refKey").text());  
});

function verifyTransaction(){
	$.ajax({
	  type:"post",
	  url:"check.php",
	  datatype:"html",
	  success:function(data)
	  {
		if(data=="access granted"){ 
			  window.location.replace("/content.php");
		}else if(data){
			$("#refKey").text(data);
			
			//update hub link
			var s=($("#hubLinkUrl").attr('href')).replace("reference=","reference="+data);
			$("#hubLinkUrl").attr("href", s);			
		}
	  }
	});
}

function init(){		
	verifyTransaction();	
	setInterval(verifyTransaction, 5000);//Time in milliseconds between calls to API.
}