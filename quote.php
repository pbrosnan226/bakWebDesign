<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Name of Website</title>
<link rel="stylesheet" href="webDesign.css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript" src="javascript/mobile.js"></script>
</head>
<header>
	<?php include('includes/header.php');?>
</header>
<body>
    <div id="container">
        <div id="content">
        	<form method="post" action="quote_confirmation.php">
            	<div class="inputForm">
                	<h2>Contact Information</h2>
               		<div class="halfDiv">
                        <label class="inputLabel">First Name: </label>
                        	<input type="text" name="fname" id="fname" class="inputText" />
                        <label class="inputLabel">Last Name: </label>
                        	<input type="text" name="lname" id="lname" class="inputText" />
                        <label class="inputLabel">Business Name: </label>
                        	<input type="text" name="bname" id="bname" class="inputText" />
                    </div>
                    <div class="halfDiv">
                        <label class="inputLabel">Email: </label>
                        	<input type="text" name="email" id="fname" class="inputText" />
                        <label class="inputLabel" for ="phone">Phone Number: </label>
                            <input type="tel" name="phone" autocomplete="tel"/>
                        <label for="contactMethod">Prefered Contact Method</label></br>
                            <select>
                                <option value=""> -- Select Option -- </option>
                                <option value="Email">Email</option>
                                <option value="Phone">Phone</option>
                            </select>   
                    </div>
                    <div class="fullDiv"> 
                    	<label class="inputLabel">Describe Your Ideal Website:</label>
                    		<textarea></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<footer>
    <?php include('includes/footer.php');?>
</footer>
</html>