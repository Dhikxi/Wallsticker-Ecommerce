<?php
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
    	$seller_id = $_COOKIE['seller_id'];
    }else{
    	$seller_id = '';
    	header('location:login.php');
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
	<title>Admin - Dashboard</title>
</head>
<body>

	<?php include '../components/admin_header.php'; ?>
	<div class="banner">
		<div class="detail">
			<h1>dashboard</h1>
			<p>loremsv bfeiurhghaerggj jgbsuiehgoekgndf fnbndhgaenejgh daerihgienkke<br>nuihfvdnbdubsjuhogsjknbuhjnuethgjfnbjdbuehiejnbdsbsjfndjgjueg</p>
			<span><a href="dashboard.php">admin</a><i class="fas fa-arrow-right"></i>dashboard</span>	
		</div>
	</div>

    <section class="dashboard">
    	<div class="heading">
    		<h1>dashboard</h1>
    		<img src="../image/sep.png" width="100">
    	</div>

    	<div class="box-container">
    		<div class="box">
    			<h3>welcome</h3>
    			<p><?= $fetch_profile['name'];?></p>
    			<a href="update.php" class="btn">update profile</a>
    		</div>

    		<div class="box">
    			<?php
    			    $select_message = $conn->prepare("SELECT * FROM `message`");
    			    $select_message->execute();
    			    $number_of_msg = $select_message->rowCount();
    			?>    
    			<h3><?= $number_of_msg; ?></h3>
    			<p>unread messages</p>
    			<a href="admin_message.php" class="btn">see messages</a>
    		</div>
    		<div class="box">
    			<?php
    			    $select_product = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ?");
    			    $select_product->execute([$seller_id]);
    			    $num_of_product = $select_product->rowCount();
    			?>    
    			<h3><?= $num_of_product; ?></h3>
    			<p>products added</p>
    			<a href="add_product.php" class="btn">add new product</a>
    		</div>
    		<div class="box">
    			<?php
    			    $select_active_product = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ? AND staus = ?");
    			    $select_active_product->execute([$seller_id, 'active']);
    			    $num_of_active_product = $select_active_product->rowCount();
    			?>    
    			<h3><?= $num_of_active_product; ?></h3>
    			<p>total active products</p>
    			<a href="view_product.php" class="btn">view active product</a>
    		</div>
    		<div class="box">
    			<?php
    			    $select_deactive_product = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ? AND staus = ?");
    			    $select_deactive_product->execute([$seller_id, 'deactive']);
    			    $num_of_deactive_product = $select_deactive_product->rowCount();
    			?>    
    			<h3><?= $num_of_deactive_product; ?></h3>
    			<p>total deactive products</p>
    			<a href="view_product.php" class="btn">view deactive product</a>
    		</div>
    		<div class="box">
    			<?php
    			    $select_users = $conn->prepare("SELECT * FROM `users`");
    			    $select_users->execute();
    			    $num_of_users = $select_users->rowCount();
    			?>    
    			<h3><?= $num_of_users; ?></h3>
    			<p>total registered users</p>
    			<a href="user_accounts.php" class="btn">view users</a>
    		</div>
    		<div class="box">
    			<?php
    			    $select_sellers = $conn->prepare("SELECT * FROM `sellers`");
    			    $select_sellers->execute();
    			    $num_of_sellers = $select_sellers->rowCount();
    			?>    
    			<h3><?= $num_of_sellers; ?></h3>
    			<p>total sellers</p>
    			<a href="seller_accounts.php" class="btn">view sellers</a>
    		</div>
    		<div class="box">
    			<?php
    			    $select_canceled_orders = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ? AND status=?");
    			    $select_canceled_orders->execute([$seller_id, 'canceled']);
    			    $total_canceled_orders = $select_canceled_orders->rowCount();
    			?>    
    			<h3><?= $total_canceled_orders; ?></h3>
    			<p>canceled orders</p>
    			<a href="admin_order.php" class="btn">canceled orders</a>
    		</div>
    		<div class="box">
    			<?php
    			    $select_confirm_orders = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ? AND status=?");
    			    $select_confirm_orders->execute([$seller_id, 'in progress']);
    			    $total_confirm_orders = $select_confirm_orders->rowCount();
    			?>    
    			<h3><?= $total_confirm_orders; ?></h3>
    			<p>confirm orders</p>
    			<a href="admin_order.php" class="btn">confirm orders</a>
    		</div>
    		<div class="box">
    			<?php
    			    $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE seller_id = ?");
    			    $select_orders->execute([$seller_id]);
    			    $total_orders = $select_orders->rowCount();
    			?>    
    			<h3><?= $total_orders; ?></h3>
    			<p>total orders</p>
    			<a href="admin_order.php" class="btn">total orders</a>
    		</div>
    	</div>
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