<?php include('includes/sqlConnection.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Request a Quote</title>
<link rel="stylesheet" href="css/webDesign.css" />
<?php
    $action = $_POST['action'];
    $id = $_GET['id'];
    $replied = $_POST['replied'];

    if($action=="update"){
        $query="UPDATE requestQuote SET replied = '" . $replied . "' WHERE id = '" . $id . "'";
        $result=mysqli_query($conn,$query);

        echo $query;
    }
?>
</head>
<body>
<header>
    <?php include('includes/header.php');?>
</header>
    <div id="container">
        <div id="content">
        	<h1>View Quotes</h1>
        	<table>
        		<tr>
        			<th>Name</th>
        			<th>Business Name</th>
        			<th>Email</th>
        			<th>Phone</th>
        			<th>Contact Method</th>
        			<th>Contacted</th>
                    <th>Update</th>
        		</tr>
        		<?php 
        			$query="SELECT * FROM requestQuote ORDER BY id";
        			$result=mysqli_query($conn,$query);
        			while($r=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        $areaCode = $r['areaCode'];
                        $firstDigits = $r['firstDigits'];
                        $secondDigits = $r['secondDigits'];
                        if(isset($areaCode) && isset($firstDigits) && isset($secondDigits)){
                            $phone = $areaCode . '-' . $firstDigits . '-' . $secondDigits;
                        } else {
                            $phone='';
                        }
        				echo '
                        <form name="viewQuotes" method="post" action="view_quotes.php?id='.$r['id'].'"">
                        <input type="hidden" value="update" name="action"/>
        				<tr>
        					<td class="pointer" onclick="window.location.href = \'quote.php?id='.$r['id'].'\'">' . $r['fname'] . ' ' . $r['lname'] . '</td>
        					<td>' . $r['bname'] . '</td>
        					<td><a href="mailto:' . $r['email'] . '">' . $r['email'] . '</a></td>
        					<td><a href="tel:' . $phone .  '">' . $phone . '</a></td>
                            <td>' . $r['contactMethod'] . '</td>
        					<td><select name="replied" id="replied">
                                    <option>' . $r['replied'] . '</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </td>
                            <td> <input type="submit" value="Submit" /> </td>

        				</tr>
                        </form>';
        			}
        			?>
        	</table>
        </div>
    </div>
    <footer>
        <?php include('includes/footer.php');?>
    </footer>
</body>


</html>
