
	
	function zoom(e){
  $("#view").css('display','block')
var zoomed=document.getElementById('views')
zoomed.src=e.src
zoomed.style.width="600px"

}
$(".close").click(function(e){
$("#view").css("display","none")
})


function confirm_delete(event)
{

	var user=event
	if(confirm(user)){

	}

}
