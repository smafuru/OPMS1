<?php
include('inc/header.php');
?>

<title>SCHOOL-SYSTEM</title>
<?php include('include_files.php');?>
<?php include('inc/container.php');


session_start();
$user = $_SESSION['username'];
$log = $_SESSION['admin'];
if ($log != "log"){
	header ("Location: login.php");
}


?>






<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
    <div class="sidebar-wrapper" id="sideLinks">
            <div class="logo">
                <a href="dashboard.php" class="">
                    <img border = "none" src = "images/logo.jpg" alt="">></img> Main menu
                </a>
            </div>
            <ul class="nav">
              
                <li id="students">
                    <a href="admin.php" class="menu-link">
                        <i class="ti-user"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li id="classes">
                    <a href="manage_user.php" class="menu-link">
                        <i class="ti-crown"></i>
                        <p>Manage Task</p>
                    </a>
                </li>
				<li id="departments">
                                    <a href="group_task.php" class="menu-link">
                        <i class="ti-crown"></i>
                        <p>Group Task</p>
                    </a>
                </li>
                <li id="teacher">
                    <a href="messages.php" class="menu-link">
                        <i class="ti-home"></i>
                        <p>Messages</p>
                    </a>
                </li>
				<li id="subjects">
                    <a href="about_login.php"class="menu-link">
                        <i class="ti-home"></i>
                        <p>About</p>
                    </a>
                </li>
                
                   	<li id="attendance">
                            <a href="reg_user.php" class="menu-link">
                        <i class="ti-home"></i>
                        <p>Gold Ideas</p>
                    </a>
                </li>
                
                
                
                
				<li id="section">
                    <a href="index.php"class="menu-link">
                        <i class="ti-bar-chart-alt"></i>
                        <p>Log out</p>
                    </a>
                </li>  

             
            </ul>
    	</div>
    </div>

<div class="main-panel">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bar1"></span>
					<span class="icon-bar bar2"></span>
					<span class="icon-bar bar3"></span>
				</button>
				<a class="navbar-brand" href="#">School Management System</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="ti-user"></i>
						<p class="notification"></p>
						<p><strong><?php //echo $_SESSION["user"]; ?></strong></p>
						<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
						<li><a href="profile.php"><i class="fa fa-user"></i> <strong>Profile</strong> </a></li>
						<li>               
						<a href="settings.php"><i class="fa fa-cog"></i> <strong>Settings</strong></a>
						</li>
						<li>
						<a href="logout.php"><i class="fa fa-power-off"></i> <strong>Logout</strong></a>
						</li>
						</ul>
					</li>
				</ul>
				</li>
				</ul>
			</div>
		</div>
	</nav>
</div>
</div>