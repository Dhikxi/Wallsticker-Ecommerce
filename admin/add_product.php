<?php
    include '../components/connect.php';

    if (isset($_COOKIE['seller_id'])) {
    	$seller_id = $_COOKIE['seller_id'];
    }else{
    	$seller_id = '';
    	header('location:login.php');
    }

    if (isset($_POST['publish'])) {
    	$id = unique_id();

    	$name = $_POST['title'];
    	
    	$price = $_POST['price'];
    	
        $content = $_POST['content'];
     

        $stock = $_POST['stock'];
        
        $staus = 'active';

        $image = $_FILES['image']['name'];
       
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$image;

        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ? AND seller_id = ?");
        $select_image->execute([$image, $seller_id]);

        if (isset($image)) {
        	if ($select_image->rowCount() > 0) {
        		$warning_msg[] = 'image name repeated';
        	}elseif($image_size > 2000000){
        		$warning_msg[] = 'image size is too large';
        	}else{
        		move_uploaded_file($image_tmp_name, $image_folder);
        	}
        }else{
        	$image = '';
        }
        if ($select_image->rowCount() > 0 AND $image != '') {
        	$warning_msg[] = 'please rename your image';
        }else{
        	$insert_product = $conn->prepare("INSERT INTO `products`(id, seller_id, name, price, image, stock, product_detail, staus) VALUES(?,?,?,?,?,?,?,?)");
        	$insert_product->execute([$id, $seller_id, $name,$price, $image, $stock, $content, $staus]);
        	$success_msg[] = 'product added successfully';
        }


    }

    // sav product as draft

    if (isset($_POST['draft'])) {
    	$id = unique_id();

    	$name = $_POST['title'];
    	
    	$price = $_POST['price'];
    	
        $content = $_POST['content'];
     

        $stock = $_POST['stock'];
        
        $staus = 'deactive';

        $image = $_FILES['image']['name'];
       
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = '../uploaded_files/'.$image;

        $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ? AND seller_id = ?");
        $select_image->execute([$image, $seller_id]);

        if (isset($image)) {
        	if ($select_image->rowCount() > 0) {
        		$warning_msg[] = 'image name repeated';
        	}elseif($image_size > 2000000){
        		$warning_msg[] = 'image size is too large';
        	}else{
        		move_uploaded_file($image_tmp_name, $image_folder);
        	}
        }else{
        	$image = '';
        }
        if ($select_image->rowCount() > 0 AND $image != '') {
        	$warning_msg[] = 'please rename your image';
        }else{
        	$insert_product = $conn->prepare("INSERT INTO `products`(id, seller_id, name, price, image, stock, product_detail, staus) VALUES(?,?,?,?,?,?,?,?)");
        	$insert_product->execute([$id, $seller_id, $name,$price, $image, $stock, $content, $staus]);
        	$success_msg[] = 'product save as draft successfully';
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
	<title>Add product page</title>
</head>
<body>

	<?php include '../components/admin_header.php'; ?>
	<div class="banner">
		<div class="detail">
			<h1>add profile</h1>
			<p>loremsv bfeiurhghaerggj jgbsuiehgoekgndf fnbndhgaenejgh daerihgienkke<br>nuihfvdnbdubsjuhogsjknbuhjnuethgjfnbjdbuehiejnbdsbsjfndjgjueg</p>
			<span><a href="dashboard.php">admin</a><i class="fas fa-arrow-right"></i>add product</span>	
		</div>
	</div>
    <section class="add_product">
    	<div class="heading">
    		<h1>add product</h1>
            <img src="../image/sep.png" width="100">
    	</div>
    	<div class="form-container">
    		<form action="" method="post" enctype="multipart/form-data" class="register">
    			<div class="input-field">
    				<p>product name <span>*</span></p>
    				<input type="text" name="title" maxlength="100" placeholder="add product title" required class="box">
    			</div>
    			<div class="input-field">
    				<p>product price <span>*</span></p>
    				<input type="number" name="price" maxlength="100" placeholder="add product price" required class="box">
    			</div>
    			<div class="input-field">
    				<p>product description <span>*</span></p>
    				<textarea type="content" name="title" maxlength="1000" placeholder="product description" required class="box"></textarea>
    			</div>
    			<div class="input-field">
    				<p>total stock <span>*</span></p>
    				<input type="number" name="stock" maxlength="10" placeholder="total products available" min="0" max="9999999999" required class="box">
    			</div>
    			<div class="input-field">
    				<p>product image <span>*</span></p>
    				<input type="file" name="image" accept="image/*" required class="box">
    			</div>
    			<div class="flex-btn">
    				<input type="submit" name="publish" value="publish now" class="btn">
    				<input type="submit" name="draft" value="save draft" class="btn">
    			</div>
    		</form>
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