<header class="header">
	<section class="flex">
		<a href="home.php"><i class="fas fa-leaf">𝕬𝖘𝖎𝖆𝖓 𝕮𝖍𝖗𝖔𝖒𝖆 𝕯𝖊𝖈𝖆𝖑𝖘</i></a>
		<nav class="navbar">
			<a href="home.php">home</a>
			<a href="about.php">about us</a>
			<a href="menu.php">shop</a>
			<a href="order.php">order</a>
			<a href="contact.php">contact</a>
		</nav>
		<form action="search_product.php" method="post" class="search-form">
			<input type="text" name="search_product" placeholder="search product.." required maxlength="100">
			<button type="submit" class="fas fa-search" name="search_product_btn"></button>
		</form>
		<div class="icons">
			<div id="menu-btn" class="fas fa-bars"></div>
			<div id="search-btn" class="fas fa-search"></div>

			<?php
			      $count_wishlist_item = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
			      $count_wishlist_item->execute([$user_id]);
			      $total_wishlist_item = $count_wishlist_item->rowCount();
			?>

			<a href="wishlist.php" class="cart-btn"><i class="fas fa-heart"></i><sup><?= $total_wishlist_item ?></sup></a>

                  <?php
			      $count_cart_item = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
			      $count_cart_item->execute([$user_id]);
			      $total_cart_item = $count_cart_item->rowCount();
			?>

			<a href="cart.php" class="cart-btn"><i class="fas fa-shopping-cart"></i><sup><?= $total_cart_item ?></sup></a>
			<div id="user-btn" class="fas fa-user"></div>
		</div>
		<div class="profile">
			<?php
			    $select_profile = $conn->prepare("SELECT * FROM `cart` WHERE id = ?");
			    $select_profile->execute([$user_id]);

			    if ($select_profile->rowCount() > 0) {
			    	$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
			?>
			<img src="uploaded_files/<?= $fetch_profile['image']; ?>">
			<h3 style="margin-bottom: 1rem"><?= $fetch_profile['name']; ?></h3>
			<div class="flex-btn">
				<a href="profile.php" class="btn">view profile</a>
				<a href="components/user_logout.php" onclick="return confirm('logout from this website');" class="btn">logout</a>
			</div>	
		    <?php }else{ ?>
		    	<img src="image/a15.jpg" alt="">
		    	<h3 style="margin-bottom: 1rem">please login or register</h3>
			    <div class="flex-btn">
				    <a href="login.php" class="btn">login</a>
				    <a href="register.php" class="btn">register</a>
			    </div>	
		    <?php } ?>	
		</div>
	</section>	
</header>