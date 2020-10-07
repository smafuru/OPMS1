<?php
session_start();
session_destroy();
$user = "";
$pass = "";
$msg = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	include 'sql.php';

	$user = $_POST['uname'];
	$pass = $_POST['pword'];
		
	//unwanted HTML (scripting attacks)
	$user = htmlspecialchars($user);
	$pass = htmlspecialchars($pass);
	
	$SQL = "SELECT * FROM info";
	$result = mysqli_query($con,$SQL);
	while ($db_field = mysqli_fetch_assoc($result)) {
		$a = $db_field['username'];
		$b = $db_field['password'];
		$pos = $db_field['position'];
		if(($user == $a) AND ($pass == $b)){
			if($pos == "admin"){
				session_start();
				$_SESSION['username'] = $user;
				$_SESSION['admin'] = "log";
				mysqli_close($con,$db_handle);
				header("Location: admin.php");
				break;
			}
			else if($pos == "leader"){
				session_start();
				$_SESSION['username'] = $user;
				$_SESSION['leader'] = "log";
				mysqli_close($con,$db_handle);
				header("Location: leader.php");
				break;
			}
			else if($pos == "member"){
				session_start();
				$_SESSION['username'] = $user;
				$_SESSION['member'] = "log";
				mysqli_close($con,$db_handle);
				header("Location: member.php");
				break;
			}
		}
	}
	$msg = "Check username and/or password.";
	mysql_close($db_handle);
}
//$errorMessage =  $school->adminLogin();
include('inc/header.php');
?>

<title>SCHOOL-SYSTEM</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');?>
<div class="container">	
    <div class="row">
    <div class="col-md-4"> 
    <div style="top:150; left:20; position:absolute; z-index:1;">

<table div class="demo-table">
<tr><td>
<a href = "index.php"><img border = "none" src = "images/home.gif"></img></a>
</td></tr>

<tr><td>
<a href = "about.php"><img border = "none" src = "images/about.gif"></img></a>
</td></tr>
</table>
<div style="top:0; left:170; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>
</div>

</div>
    </div>
    
	<div class="col-md-4">                    
		<div class="panel panel-info">
			<div class="panel-heading" style="background:#000;color:white;">
				<div class="panel-title">Admin Login</div>                        
			</div> 
			<div style="padding-top:30px" class="panel-body">
				
					<div id="login-alert" class="alert alert-danger col-sm-12"></div>                            
				
                                        <form id="loginform" class="form-horizontal" role="form" method="POST" action="login.php">                                    
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" id="email" name="uname" placeholder="email" required>                                        
					</div>                                
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" id="password" name="pword" placeholder="password" required>
					</div>
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						  <input type="submit" name="login" value="Login" class="btn btn-success">						  
						</div>						
					</div>	
					<div style="margin-top:10px" class="form-group">                               
						<div class="col-sm-12 controls">
						eg: smawiyo<br>
						password:Any	<br><br>									
						</div>						
					</div>	
				</form>   
			</div>                     
		</div>  
	</div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-3">
            <div style="top:150; left:800; position:absolute; z-index:1;">
<img src = "images/image002.gif"></img>
            </div>
                </div><br/>
                <div class="col-md-3">
<div style="top:50; left:10; position:absolute; z-index:1;">
<a href = "verify.php"><img src = "images/verify.gif" border = "0"></img></a>
</div>
                </div>
                <br/><br/><br/>
                <div class="col-md-3">

<div style="top:100; left:10; position:absolute; z-index:1;">
<a href = "signup.php"><img src = "images/signup.gif" border = "0"></img></a>
</div>

</div>
                

        </div>
            </div>
</div>	
<?php include('inc/footer.php');?>
