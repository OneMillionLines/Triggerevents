<?php
session_start();
$mysql_hostname = "mysql.csmit.org";
$mysql_user = "prayatna_user";
$mysql_password = "qd5egqd5";
$mysql_database = "prayatna_db";
$prefix = "";
$bd = @mysqli_connect($mysql_hostname, $mysql_user,$mysql_password) or die("Could not connect database");
mysqli_select_db($bd,$mysql_database) or die("<h1>Could not select database<h1>");
	$ans=$_POST['re'];
	$un=$_SESSION['us'];
	$ans=strtolower($ans);
	$ans=preg_replace('/\s+/','',$ans);
	    if(!empty($ans) && $ans=="anushkasharma")
        {
						header('Location:correct.php');
				$r=mysqli_query($bd,"Select level from triggeruser where rno='$un'");
				$row=mysqli_fetch_assoc($r);
				$lev=$row['level']+1;
				if($lev==$_SESSION['lev']+1)
				{			
					$_SESSION['lev']=$lev;
					$da=date("Y-m-d H:i:s");
					$qry="Update triggeruser set level='$lev',time='$da' where rno='$un'";
					$r=mysqli_query($bd,$qry);
				}
				else 
					$_SESSION['lev']=$lev-1;
	    }
        else
		{
			header('Location:wrong.php');
		}
?>	
<html>
	<head>
		<style>
		body
			{
				background-image: url("images/processing.gif");
    height: 50%; 

    background-position: center;
    background-repeat: no-repeat;
			}
		</style>
	</head>
	<body>
		
	</body>
</html>
