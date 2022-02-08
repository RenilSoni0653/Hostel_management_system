<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="security-get_in.php"><i class="fa fa-user"></i> Get-In</a></li>
					<li><a href="security-get_out.php"><i class="fa fa-user"></i> Get-Out</a></li>
					<li><a href="security-access-log.php"><i class="fa fa-user"></i> Access Log</a></li>
					<li><a href="security-change_password.php"><i class="fa fa-files-o"></i>Change Password</a></li>
<?php } else { ?>
				
				<li><a href="registration.php"><i class="fa fa-files-o"></i> User Registration</a></li>
				<li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>
				<li><a href="index.php"><i class="fa fa-users"></i> User Login</a></li>
				<li><a href="security-index.php"><i class="fa fa-user"></i> Security Login</a></li>
				<?php } ?>

			</ul>
		</nav>