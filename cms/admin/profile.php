<?php include "includes/admin_header.php"; ?>

<?php

if(isset($_SESSION['username'])) {

	$username = $_SESSION['username'];

	$query = "SELECT * FROM users WHERE username = '{$username}' ";

	$select_user_profile = mysqli_query($connection, $query);

	while($row = mysqli_fetch_array($select_user_profile)) {

		$user_id = $row['user_id'];
		$username = $row['username'];
		$user_password = $row['user_password'];
		$user_firstname = $row['user_firstname'];
		$user_lastname = $row['user_lastname'];
		$user_email = $row['user_email'];
		$user_image = $row['user_image'];
		$user_role = $row['user_role'];

	}
}

?>

<?php

	if(isset($_POST['edit_user'])) {

		$user_firstname = escape($_POST['user_firstname']);
		$user_lastname = escape($_POST['user_lastname']);
		$username= escape($_POST['username']);
		$user_email = escape($_POST['user_email']);
		$user_password = escape($_POST['user_password']);
		//$post_date = date('d-m-y');

		$query = "UPDATE users SET ";
		$query .= "user_firstname = '{$user_firstname}', ";
		$query .= "user_lastname = '{$user_lastname}', ";
		$query .= "username = '{$username}', ";
		$query .= "user_email = '{$user_email}', ";
		$query .= "user_password = '{$user_password}' ";
		$query .= "WHERE username = '{$username}' ";

		$edit_user_query = mysqli_query($connection, $query);

		confirmQuery($edit_user_query);

	}

?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO ADMIN
                            <small>Author</small>
                        </h1>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="firtsname">Firstname</label>
		<input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="lastname">Lastname</label>
		<input type="text" class="form-control"  value="<?php echo $user_lastname ?>"name="user_lastname">
	</div>

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" value="<?php echo $username ?>" name="username">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" value="<?php echo $user_email?>" name="user_email">
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input autocomplete="off" type="password" class="form-control" name="user_password">
	</div>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
	</div>

</form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php"; ?>
