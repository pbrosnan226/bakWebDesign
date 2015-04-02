$( document ).ready(function() {
	$( "#mobileMenu" ).click(function() {
		$("#navigationList").toggle();
		$("#navigationList").css("background-color",'#0268B7')
	});
	function checkwidth() {
        var width = $(window).width();
        if (width > 599) {
			$("#navigationList").css("background-color",'#1696FB')
            $('#navigationList').show();            
        } else if (width <= 599){
			$('#navigationList').hide();            
			$("#navigationList").css("background-color",'#0268B7')
        }
    }
    $(window).resize(checkwidth);

});