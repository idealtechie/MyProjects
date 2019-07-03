<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
<li><a href="change-password.php"><i class="fa fa-files-o"></i>Change Password</a></li>
<li><a href="attendance_submission.php"><i class="fa fa-file-o"></i>Enter Attendance</a></li>
<li><a href="access-log.php"><i class="fa fa-file-o"></i>Access log</a></li>
<?php } else { ?>
				
				<li><a href="registration.php"><i class="fa fa-files-o"></i> User Registration</a></li>
				<li><a href="index.php"><i class="fa fa-users"></i> User Login</a></li>
				<li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>
				<?php } ?>

			</ul>
		</nav>