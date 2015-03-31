<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Request a Quote</title>
<link rel="stylesheet" href="webDesign.css" />
<script type="text/javascript" src="javascript/jquery.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<script type="text/javascript" src="javascript/mobile.js"></script>
<?php

$id = $_GET['id'];
$fname = $_POST['fname'];
$lname= $_POST['lname'];
$bname= $_POST['bname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$contactMethod = $_POST['contactMethod'];
$websiteNotes = $_POST['websiteNotes'];

    if($_POST['action']=="insert"){
        $query="INSERT INTO requestQuote (fname,lname,bname,email,phone,contactMethod,websiteNotes) VALUES ('$fname','$lname','$bname','$email','$phone','$contactMethod','$websiteNotes')";
        echo $query;
    } else if ($_POST['action']=="update") {
        $query="UPDATE requestQuote SET fname='$fname',lname='$lname',bname='$bname',email='$email',phone='$phone',contactMethod='$contactMethod',websiteNotes='$websiteNotes' WHERE id='$id'";
        echo $query;
    }
   // if(isset($_GET['id'])){
        $query="SELECT * FROM requestQuote WHERE id='$id'";
        echo $query;

        /*while ($r=mysql_fetch_array($result)) {
            $id = $r['id'];
            $fname = $r['fname'];
            $lname= $r['lname'];
            $bname= $r['bname'];
            $email = $r['email'];
            $phone = $r['phone'];
            $contactMethod = $r['contactMethod'];
            $websiteNotes = $r['websiteNotes'];
        }*/
//    }
?>

</head>
<header>
	<?php include('includes/header.php');?>
</header>
<body>
    <div id="container">
        <div id="content">
        	<form method="post" action="quote.php">
                <?php 
                if(isset($id)){
                    echo '<input type="hidden" name="action" value="update"/>';
                } else{
                    echo '<input type="hidden" name="action" value="insert"/>';
                }
                ?>
            	<div class="inputForm">
                	<h2>Contact Information</h2>
               		<div class="halfDiv">
                        <label class="inputLabel">First Name: </label>
                        	<input type="text" name="fname" id="fname" value="<?php echo $fname;?>" />
                        <label class="inputLabel">Last Name: </label>
                        	<input type="text" name="lname" id="lname" value="<?php echo $lname;?>"/>
                        <label class="inputLabel">Business Name: </label>
                        	<input type="text" name="bname" id="bname" value="<?php echo $bname;?>" />
                    </div>
                    <div class="halfDiv">
                        <label class="inputLabel" for="email">Email: </label>
                        	<input type="email" name="email" id="email" value="<?php echo $email;?>" />
                        <label class="inputLabel" for ="phone">Phone Number: </label>
                            <input type="tel" name="phone" id="phone" value="<?php echo $phone;?>"/>
                        <label for="contactMethod">Prefered Contact Method</label></br>
                            <select name="contactMethod">
                                <option value=""> -- Select Option -- </option>
                                <option value="Email">Email</option>
                                <option value="Phone">Phone</option>
                            </select>   
                    </div>
                    <div class="fullDiv"> 
                    	<label class="inputLabel">Describe Your Ideal Website:</label>
                    		<textarea name="websiteNotes"><?php echo $websiteNotes;?></textarea>
                        <input type="submit" name="submit" value="Request Quote"/>
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