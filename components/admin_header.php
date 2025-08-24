<header>
	<div class="logo">
		<i class="fas fa-leaf"></i><a> 𝕬𝖘𝖎𝖆𝖓 𝕮𝖍𝖗𝖔𝖒𝖆 𝕯𝖊𝖈𝖆𝖑𝖘 </a>
	</div>
	<div class="right">
	    <div class="fas fa-user" id="user-btn"></div>
	    <div class="toggle-btn"><i class="fas fa-bars"></i></div>
	</div>    	
	<div class="profile-detail">
		<?php
		    $select_profile = $conn->prepare("SELECT * FROM `sellers` WHERE id=?");
		    $select_profile->execute([$seller_id]);

		    if ($select_profile->rowCount() > 0) {
		    	$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
		?>
		<div class="profile">
		    <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" class="logo-img">
		    <p><?= $fetch_profile['name']; ?></p>
		</div>
		<div class="flex-btn"> 
		    <a href="profile.php" class="btn">profile</a>
		    <a href="../components/admin_logout.php" onclick="return confirm('logout from this website');" class="btn">logout</a>
		</div>       	
		<?php } ?>
		   
</header>

<div class="sidebar">
	

		<?php
		    $select_profile = $conn->prepare("SELECT * FROM `sellers` WHERE id=?");
		    $select_profile->execute([$seller_id]);

		    if ($select_profile->rowCount() > 0) {
		    	$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
		?>
		    <div class="profile">
		        <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" class="logo-img">
		        <p><?= $fetch_profile['name']; ?></p>
		    </div>    	
		<?php } ?>  
		<h3>menu</h3>
		<div class="navbar">
			<ul>
			    <li><a href="dashboard.php"><i class="fas fa-smile"></i>dashboard</a></li>	
			    <li><a href="add_product.php"><i class="fas fa-shopping-cart"></i>add products</a></li>	
			    <li><a href="view_products.php"><i class="fas fa-smile"></i>view products</a></li>	
			    <li><a href="user_account.php"><i class="fas fa-user-alt"></i>accounts</a></li>	
			    <li><a href="../components/admin_logout.php" onclick="return confirm('logout from this website');"><i class="fas fa-sign-out-alt"></i>log out</a></li>	
			</ul>
		</div>	
		<h3>find us</h3>
		<div class="social-links">
			<i class="fab fa-facebook"></i>
			<i class="fab fa-twitter"></i>
			<i class="fab fa-instagram"></i>
			<i class="fab fa-linkedin"></i>
			<i class="fab fa-pinterest"></i>
		</div>
	
</div>