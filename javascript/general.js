$( document ).ready(function() {
	function phonenumber(inputtxt) {
  		var phoneno = '^(\([0-9]{3}\)\s*|[0-9]{3}\-)[0-9]{3}-[0-9]{4}$';
	  	if(inputtxt.value.match(phoneno)) {
	    	return true;
	  	} else {  
	    	alert("message");
	    	return false;
		}
	}
});



