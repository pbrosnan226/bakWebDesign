<?php include('includes/sqlConnection.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Request a Quote</title>
<link href="javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/webDesign.css" />
<script type="text/javascript">//////AUTO JUMP CODE////////
var downStrokeField;
function autojump(fieldName,nextFieldName,fakeMaxLength)
{
var myForm=document.forms[document.forms.length - 1];
var myField=myForm.elements[fieldName];
myField.nextField=myForm.elements[nextFieldName];

if (myField.maxLength == null)
   myField.maxLength=fakeMaxLength;

myField.onkeydown=autojump_keyDown;
myField.onkeyup=autojump_keyUp;
}

function autojump_keyDown()
{
this.beforeLength=this.value.length;
downStrokeField=this;
}

function autojump_keyUp()
{
if (
   (this == downStrokeField) && 
   (this.value.length > this.beforeLength) && 
   (this.value.length >= this.maxLength)
   )
   this.nextField.focus();
downStrokeField=null;
}
//////END AUTO JUMP CODE////////</script>
<?php

$id = $_GET['id'];
$fname = $_POST['fname'];
$lname= $_POST['lname'];
$bname= $_POST['bname'];
$email = $_POST['email'];
$areaCode=$_POST['areaCode'];
$firstDigits=$_POST['firstDigits'];
$secondDigits=$_POST['secondDigits'];
$contactMethod = $_POST['contactMethod'];
$websiteNotes = $_POST['websiteNotes'];

    if($_POST['action']=="insert"){
        $query="INSERT INTO requestQuote (fname,lname,bname,email,areaCode,firstDigits,secondDigits,contactMethod,websiteNotes) VALUES ('" . $fname . "','" . $lname . "','" . $bname . "','" . $email . "','" . $areaCode . "','" . $firstDigits . "','" . $secondDigits . "','" . $contactMethod . "','" . $websiteNotes . "')";
        $result=mysqli_query($conn, $query);
        if($result){
            echo "IT WORKED";
            mail('pbrosnan622@me.com', "Website Request", 'message', 'From: pbrosnan622@me.com','-f pbrosnan622@me.com');
        }
        echo $query;
    } else if ($_POST['action']=="update") {
        $query = "UPDATE requestQuote SET fname='" . $fname . "',lname='" . $lname . "',bname='" . $bname . "',email='" . $email . "',areaCode='" . $areaCode . "',firstDigits='" . $firstDigits  . "',secondDigits='" . $secondDigits . "',contactMethod='" . $contactMethod . "',websiteNotes='" . $websiteNotes . "' WHERE id='".$_POST['id']."'";
        $result = mysqli_query($conn, $query);
        echo $query;
    }
    if(isset($_GET['id'])){
        $query = "SELECT * FROM requestQuote WHERE id = '" . $id . "'";
        echo $query; 
        $result = mysqli_query($conn,$query);
        while ($r = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $fname = $r['fname'];
            $lname = $r['lname'];
            $bname = $r['bname'];
            $email = $r['email'];
            $areaCode = $r['areaCode'];
            $firstDigits = $r['firstDigits'];
            $secondDigits = $r['secondDigits'];
            $contactMethod = $r['contactMethod'];
            $websiteNotes = $r['websiteNotes'];
        }
    }
?>

</head>
<header>
	<?php include('includes/header.php');?>
</header>
<body>
    <div id="container">
        <div id="content">
        	<form method="post" name="form1" action="quote.php">
                <?php 
                if(isset($id)){
                    echo '<input type="hidden" name="action" value="update"/>
                          <input type="hidden" name="id" value="'. $id . '"/>';
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
                            (<input type="tel" name="areaCode" id="areaCode" maxlength=3 value="<?php echo $areaCode;?>">)-<input type="tel" name="firstDigits" id="firstDigits" maxlength=3 value="<?php echo $firstDigits;?>">-<input type="tel" name="secondDigits" id="secondDigits" maxlength=4 value="<?php echo $secondDigits;?>">
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
            <SCRIPT TYPE="text/javascript">
                autojump('areaCode', 'firstDigits', 3);
                autojump('firstDigits', 'secondDigits', 3);
                autojump('secondDigits', 'contactMethod', 4);
            </SCRIPT>
        </div>
    </div>
</body>

<footer>
    <?php include('includes/footer.php');?>
</footer>
</html>