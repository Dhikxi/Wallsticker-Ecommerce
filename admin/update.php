<?php
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
    	$seller_id = $_COOKIE['seller_id'];
    }else{
    	$seller_id = '';
    	header('location:login.php');
    }

    if (isset($_POST['update'])) {

    	$select_seller = $conn->prepare("SELECT * FROM `sellers` WHERE id = ? LIMIT 1");
    	$select_seller->execute([$seller_id]);
    	$fetch_seller = $select_seller->fetch(PDO::FETCH_ASSOC);

    	$prev_pass = $fetch_seller['password'];
    	$prev_image = $fetch_seller['image'];

    	$name = $_POST['name'];
    	
  

    	$email = $_POST['email'];
   
       

    	//update user name
    	if (!empty($name)) {
    		$update_name = $conn->prepare("UPDATE `sellers` SET name = ? WHERE id = ?");
    		$update_name->execute([$name, $seller_id]);
    		$success_msg[] = 'username updated successfully';
    	}
    	//update user mail address

    	if (!empty($email)) {
    		$select_email = $conn->prepare("SELECT email FROM `sellers` WHERE id = ?");
    		$select_email->execute([$seller_id, $email]);

    		if ($select_email->rowCount() > 0) {
    			$warning_msg[] = 'email already taken!';
    		}else{
    			$update_email = $conn->prepare("UPDATE `sellers` SET email = ? WHERE id = ?");
    			$update_email->execute([$email, $seller_id]);
    			$success_msg[] = 'email updated successfully';
    		}
    	}

    	//update profile

        $image = $_FILES['image']['name'];
        $image = filter_var($image, FILTER_SANITIZE_STRING);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$rename;

        if (!empty($image)) {
        	if ($image_size > 10000) {
        		$warning_msg[] = 'image size is too large';
        	}else{
        		$update_image = $conn->prepare("UPDATE `sellers` SET `image` = ? WHERE id = ?");
        		$update_image->execute([$rename, $seller_id]);
        		move_uploaded_file($image_tmp_name, $image_folder);

        		if ($prev_image != '' AND $prev_image != $rename) {
        			unlink('../uploaded_files/'.$prev_image);
        		}
        		$success_msg[] = 'image uploaded successfully';
        	}
        }

        //update password 

        $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
        $old_pass = sha1($_POST['old_pass']);
        
        $new_pass = sha1($_POST['new_pass']);
    
        $cpass = sha1($_POST['cpass']);
       

        if ($old_pass != $empty_pass) {
        	if ($old_pass != $prev_pass) {
        		$warning_msg[] = 'old password not matched';
        	}elseif ($new_pass != $cpass) {
        		$warning_msg[] = 'confirm password not matched';
        	}else{
        		if ($new_pass != $empty_pass) {
        			$update_pass = $conn->prepare("UPDATE `sellers` SET password = ? WHERE id = ?");
        			$update_pass->execute([$cpass, $seller_id]);
        		}else{
        			$warning_msg[] = 'please enter a new password';
        		}
        	}
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- icon cdn link -->
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' rel='stylesheet'>
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="../css/admin_style.css?v=<?php echo time(); ?>">
	<title>update profile page</title>
</head>
<body>
    <?php include '../components/admin_header.php'; ?>
	<div class="banner">
		<div class="detail">
			<h1>update profile</h1>
			<p>loremsv bfeiurhghaerggj jgbsuiehgoekgndf fnbndhgaenejgh daerihgienkke<br>nuihfvdnbdubsjuhogsjknbuhjnuethgjfnbjdbuehiejnbdsbsjfndjgjueg</p>
			<span><a href="dashboard.php">admin</a><i class="fas fa-arrow-right"></i>update profile</span>	
		</div>
	</div>

    <section class="form-container">
    	<form action="" method="post" enctype="multipart/form-data" class="register">
    		<div class="img-box">
    			<img src="../uploaded_files/<?= $fetch_profile['image']; ?>">
    		</div>
    		<h3>update profile</h3>
    		<div class="flex">
    			<div class="col">
    				<div class="input-field">
    					<p>your name</p>
    					<input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>"class="box">
    				</div>
    				<div class="input-field">
    					<p>your email</p>
    					<input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>"
    					class="box">
    				</div>
    				<div class="input-field">
    					<p>update profile</p>
    					<input type="file" name="image" accept="image/*" class="box">
    				</div>    				
    			</div>
    			<div class="col">
    				<div class="input-field">
    					<p>old password</p>
    					<input type="password" name="old_pass" placeholder="enter your old password" class="box">
    				</div>
    				<div class="input-field">
    					<p>new password</p>
    					<input type="password" name="new_pass" placeholder="enter your new password" class="box">
    				</div>
    				<div class="input-field">
    					<p>confirm password</p>
    					<input type="password" name="cpass" placeholder="confirm password" class="box">
    				</div>
    			</div>
    		</div>
    		<input type="submit" name="update" class="btn"  value="update profile">
    	</form>
    </section>


	<?php include '../components/admin_footer.php'; ?>
	
	<!--sweetalert cdn link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- custom js link -->
	<script type="text/javascript" src="../js/admin_script.js"></script>
	<!--alert--->
	<?php include '../components/alert.php'; ?>
</body>	 
</html>