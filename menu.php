<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])) {
    	$user_id = $_COOKIE['user_id'];
    }else{
    	$user_id = '';
    }

    include 'components/add_wishlist.php';
    include 'components/add_cart.php';


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- icon cdn link -->
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' rel='stylesheet'>
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css/user_style.css?v=<?php echo time(); ?>">
	<title>Asian chromas - shop page</title>
</head>
<body>

	
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>products</h1>
            <p>loremsv bfeiurhghaerggj jgbsuiehgoekgndf fnbndhgaenejgh daerihgienkke<br>nuihfvdnbdubsjuhogsjknbuhjnuethgjfnbjdbuehiejnbdsbsjfndjgjueg</p>
            <span><a href="home.php">home</a><i class="fas fa-arrow-right"></i>products</span>   
        </div>
    </div>

    <div class="products">
        <div class="box-container">
            <?php
                $select_products = $conn->prepare("SELECT * FROM `products` WHERE staus = ? " );
                $select_products->execute(['active']);

                if($select_products->rowCount() > 0) {
                while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
            ?>

            <form action="" method="post" class="box" <?php if($fetch_products['stock'] == 0){echo 'disabled';} ?>>
                <img src="uploaded_files/<?= $fetch_products['image']; ?>">
                <?php if($fetch_products['stock'] > 9){ ?>
                    <span class="stock" style="color: green;">In stock</span>
                <?php }elseif($fetch_products['stock'] == 0){ ?>
                    <span class="stock" style="color:red;">Out of stock</span>
                <?php }else{ ?> 
                    <span class="stock" style="color:red;">Hurry only <?= $fetch_products['stock']; ?> left</span>   
                <?php } ?>
                    <p class="price">Price $ <?= $fetch_products['price']; ?>/-</p>
                <div class="content">
                    <div class="button">
                        <div><h3><?= $fetch_products['name']; ?></h3></div>
                        <div>
                            <button type="submit" name = "add_to_cart"><i class="fas fa-shopping-cart"></i></button>
                            <button type="submit" name = "add_to_wishlist"><i class="fas fa-heart"></i></button>
                            <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                        </div>    
                    </div>
                    <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
                    <div class="flex-btn">
                        <a href="checkout.php?get_id=<?= $fetch_products['id']; ?>" class="btn">buy now</a>
                        <input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
                    </div>
                </div>
            </form>  
            <?php
            }
                }else{
                    echo '
                            <div class="empty">
                                <p>no products added yet!</p>
                            </div>    

                    ';
                }
            ?>  
          
        </div>   
    </div>
    

    
    <?php include 'components/user_footer.php'; ?>



	<!--sweetalert cdn link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- custom js link -->
	<script type="text/javascript" src="..js/user_script.js"></script>
	<?php include 'components/alert.php'; ?>
</body>	 
</html>