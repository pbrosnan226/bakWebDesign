<?php include('includes/sqlConnection.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Name of Website - Home</title>
<link rel="stylesheet" href="css/webDesign.css" />
<?php
session_start();
    $action = $_POST['action'];
    if($action == 'submit'){
        $query = "SELECT * FROM users WHERE uname='" . $_POST['uname'] . "' AND pswd = '" . $_POST['password'] . "'";
        echo $query;
        $result = mysqli_query($conn,$query);
        if($result){
            while($r = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $uname = $r['uname'];
                //$password = $r['password'];
                $fname = $r['fname'];
                $lname = $r['lname'];

                

                $_SESSION['uname'] = $uname;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
            }
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
            <div class="halfDiv">
               <?php echo 'Username: ' . $_SESSION['uname'] . $uname;?>
                <form method="post" action="login.php" >
                    <?php if($notSet==true){
                        echo 'Not Correct';
                    }
                    ?>
                    <input type="hidden" name="action" value="submit">
                    <label for="uname">Username:</label>
                    <input type="text" name="uname" />
                    <label for="password">Password:</label>
                    <input type="password" name="password" >
                    <input type="submit" name="submit" value="Login">
                </form>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php include('includes/footer.php');?>
</footer>
</html>