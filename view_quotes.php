<?php include('includes/sqlConnection.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Request a Quote</title>
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
        	<h1>View Quotes</h1>
        	<table>
        		<tr>
        			<th>Name</th>
        			<th>Business Name</th>
        			<th>Email</th>
        			<th>Phone</th>
        			<th>Prefered Contact Method</th>
        			<th>Contacted</th>
        			<th>View Request</th>
        		</tr>
        		<?php 
        			$query="SELECT * FROM requestQuote ORDER BY id";
        			$result=mysqli_query($conn,$query);
        			while($r=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        				echo '
        				<tr>
        					<td>' . $r['fname'] . ' ' . $r['lname'] . '</td>
        					<td>' . $r['bname'] . '</td>
        					<td>' . $r['email'] . '</td>
        					<td>' . phoneDisplay($r['phone']) . '</td>
        					<td>' . $r['contactMethod'] . '</td>
							<td>' . $r['replied'] . '</td>
							<td> <a href="quote.php?id='.$r["id"].'">View</a> </td>

        				</tr>';
        			}
        			?>
        	</table>
        </div>
    </div>
</body>
</html?