<?php
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
    	$seller_id = $_COOKIE['seller_id'];
    }else{
    	$seller_id = '';
    	header('location:login.php');
    }

    if (isset($_POST['delete'])) {

    	$p_id = $_POST['product_id'];
    	$p_id = filter_var($p_id, FILTER_SANITIZE_STRING);

    	$delete_product = $conn->prepare("DELETE FROM `products` WHERE id=?");
    	$delete_product->execute([$p_id]);

    	$success_msg[] = 'product deleted successfully';
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
	<title>view product page</title>
</head>
<body>

	<?php include '../components/admin_header.php'; ?>
	<div class="banner">
		<div class="detail">
			<h1>view products</h1>
			<p>loremsv bfeiurhghaerggj jgbsuiehgoekgndf fnbndhgaenejgh daerihgienkke<br>nuihfvdnbdubsjuhogsjknbuhjnuethgjfnbjdbuehiejnbdsbsjfndjgjueg</p>
			<span><a href="dashboard.php">admin</a><i class="fas fa-arrow-right"></i>view products</span>	
		</div>
	</div>

    <section class="show_products">
    	<div class="heading">
    		<h1>your products</h1>
    	</div>
    	<div class="box-container">
    		<?php
    	    $select_products = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ?");
    	    $select_products->execute([$seller_id]); 

    	    if($select_products->rowCount() > 0){
    		    while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {

    	    ?>
    	    <form action="" method="post" class="box">
    		    <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
    		    <?php if($fetch_products['image'] != ''){ ?>
    			    <img src="../uploaded_files/<?= $fetch_products['image']; ?>">
    		    <?php }	?>    		
    		    <div class="staus" style="color: <?php if($fetch_products['staus']=='active'){echo "limegreen";}else{echo "red";} ?>"><?= $fetch_products['staus']; ?></div>
    		    <p class="price">$<?= $fetch_products['price']; ?>/-</p>
    		    <div class="content">
    			    <div class="title"><?= $fetch_products['name']; ?></div>
    			    <div class="flex-btn">
    				    <a href="edit_product.php?id=<?= $fetch_products['id']; ?>" class="btn">edit</a>
    				    <button type="submit" name="delete" class="btn" onclick="confirm('delete this products');">delete</button>
    				    <a href="read_product.php?post_id=<?= $fetch_products['id']; ?>" class="btn">view product</a>
    				</div>
    		    </div>
    	    </form>	
    	    <?php
    		    }
    	    }else{
    	    	echo '
    	    	    <div class="empty">
    	    	        <p>no products added yet! <br> <a href="add_product.php" class="btn" style="margin_top: 1rem;">add product</a></p>
    	    	    </div>    

    	    	';
    	    }
            ?>  
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