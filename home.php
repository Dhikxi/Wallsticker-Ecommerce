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
	<title>Asian chromas - home page</title>
</head>
<body>

	
    <?php include 'components/user_header.php'; ?>
      

    <div class="slid">
    	<div class="item">
            <img src="image/d4.png" alt="">
        </div>
    </div>
    

    <!--------services------------>

    <div class="services">
    	<div class="box-container">
    		<div class="box">
    			<div class="icon">
    				<img src="image/y.png">
    			</div>
    			<div class="detail">
    				<h4>online shopping</h4>
    				<span>100% secure</span>
    			</div>
    		</div>
    		<div class="box">
    			<div class="icon">
    				<img src="image/y1.png">
    			</div>
    			<div class="detail">
    				<h4>quality products</h4>
    				<span>100% secure</span>
    			</div>
    		</div>
    		<div class="box">
    			<div class="icon">
    				<img src="image/y2.png">
    			</div>
    			<div class="detail">
    				<h4>delivery</h4>
    				<span>24 * 7 hours</span>
    			</div>
    		</div>
    		<div class="box">
    			<div class="icon">
    				<img src="image/y3.png">
    			</div>
    			<div class="detail">
    				<h4> well organized</h4>
    				<spa>24 * 7 free returns</span>
    			</div>
    		</div>
    		<div class="box">
    			<div class="icon">
    				<img src="image/y4.png">
    			</div>
    			<div class="detail">
    				<h4>customer service</h4>
    				<span>100% secure</span>
    			</div>
    		</div>
    		<div class="box">
    			<div class="icon">
    				<img src="image/y.png">
    			</div>
    			<div class="detail">
    				<h4>much more</h4>
    				<span>100% secure</span>
    			</div>
    		</div>
    	</div>
    	
    </div>


    <!--------services end-------->


    <!-------- about start-------->
    <div class="about-us">
    	<div class="box-container">
    		<div class="img-box">
    			<img src="image/cus2.jpg" class="img">
    			<img src="image/cus.jpg" class="img1">
    		</div>
    		<div class="box">
    			<div class="heading">
    				<span>why choose us?</span>
    				<h1>why asian chromas decals?</h1>
    				<p>jnejknv awbvhbbvjbcx bKDSfbvcxjv dnvbhdb aurenvjd iohwrjgbdn ejhrvkznd zdnvrehvk,vnb zsf vhiwrbbdmbnvjvbzdknbn znbnfkbnzdbn znfgdb zjbzknm, dfhgugieireotyklmwkltyuw nethjkknbj bjdghsenjsehgsinm nzjfdjvnzmnz djfgnj svjkb jbgjrt trto rtwoit twtwitwiottuuwhiwngjv xjfhgoushdnbbdjnjnj  hsbjw sgbejrtb </p>
    				<a href="about.php" class="btn">know more</a>
    				<a href="contact.php" class="btn">contact us</a>
    			</div>
    		</div>
    	</div>
    </div>

    <!-------- about end---------->
     
    <div class="categories">
    	<div class="heading">
    		<h1>categories features<h1>
    			<img src="image/sep.png">
    	</div>
    	<div class="box-container">
    		<div class="box">
    			<img src="image/81.png">
    			<div class="detail">
    				<span>ajfwet shfiywrhJW</span>
    				<h1>birds</h1><br><br>
    				<a href="shop.php" class="btn">shop now</a>
    		    </div>
    		</div> 
    		<div class="box">
    			<img src="image/80.png">
    			<div class="detail">
    				<span>ajfwet shfiywrhJW</span>
    				<h1>animals</h1><br><br>
    				<a href="shop.php" class="btn">shop now</a>
    		    </div>
    		</div> 
    		<div class="box">
    			<img src="image/etti.jpg">
    			<div class="detail">
    				<span>ajfwet shfiywrhJW</span>
    				<h1>trees</h1><br><br>
    				<a href="shop.php" class="btn">shop now</a>
    		    </div>
    		</div> 
    		<div class="box">
    			<img src="image/83.png">
    			<div class="detail">
    				<span>ajfwet shfiywrhJW</span>
    				<h1>mandala</h1><br><br>
    				<a href="shop.php" class="btn">shop now</a>
    		    </div>
    		</div> 
    		<div class="box">
    			<img src="image/29.jpg">
    			<div class="detail">
    				<span>ajfwet shfiywrhJW</span>
    				<h1>cartoons</h1><br><br>
    				<a href="shop.php" class="btn">shop now</a>
    		    </div>
    		</div> 
    		<div class="box">
    			<img src="image/20.jpg">
    			<div class="detail">
    				<span>ajfwet shfiywrhJW</span>
    				<h1>lords</h1><br><br>
    				<a href="shop.php" class="btn">shop now</a>
    		    </div>
    		</div>    
    	</div>
    </div> 
    <!-------- sub-banner section end------->
   
    <div class="offer-1">
        <div class="detail">
        	<h1>𝑬𝒑𝒊𝒄 𝑫𝒐𝒐𝒓 𝑩𝒖𝒔𝒕𝒆𝒓 𝑺𝒂𝒍𝒆𝒔...</h1>
        	<p>𝑯𝒆𝒍𝒍𝒐! 𝒇𝒓𝒐𝒎 𝒚𝒐𝒖𝒓 𝒇𝒓𝒊𝒆𝒏𝒅𝒔 𝒂𝒕 𝑨𝒔𝒊𝒂𝒏 𝑪𝒉𝒓𝒐𝒎𝒂𝒔. 𝑾𝒆'𝒓𝒆 𝒐𝒇𝒇𝒆𝒓𝒊𝒏𝒈 𝒂 𝒔𝒑𝒆𝒄𝒊𝒂𝒍 30% 𝒅𝒊𝒔𝒄𝒐𝒖𝒏𝒕.<br>
            𝑫𝒐𝒏'𝒕 𝒎𝒊𝒔𝒔 𝒐𝒖𝒓 𝑴𝑬𝑮𝑨 𝑺𝑨𝑳𝑬 : 𝑺𝒂𝒗𝒆 𝒖𝒑 𝒕𝒐 30% 𝒐𝒏 𝒔𝒆𝒍𝒆𝒄𝒕 𝒊𝒕𝒆𝒎𝒔! 𝑻𝒉𝒊𝒔 𝒐𝒇𝒇𝒆𝒓 𝒊𝒔 𝒇𝒐𝒓 𝒂 𝒍𝒊𝒎𝒊𝒕𝒆𝒅 𝒕𝒊𝒎𝒆 𝒐𝒏𝒍𝒚. 𝑯𝒖𝒓𝒓𝒚 𝒖𝒑 ,𝑺𝒉𝒐𝒑 𝒚𝒐𝒖𝒓 𝒇𝒂𝒗𝒐𝒖𝒓𝒊𝒕𝒆𝒔.</p>
            <div class="container">
                <div id="countdown" style="color: #fff;">
            	    <ul>
            		    <li><span id="days"></span>days</li>
            		    <li><span id="hours"></span>hours</li>
            		    <li><span id="minutes"></span>minutes</li>
            		    <li><span id="seconds"></span>seconds</li>
            	    </ul>
                </div>
            </div>
            <a href="shop.php" class="btn">buy now</a>
        </div> 
    </div> <br><br><br><br>
    <!-----offer-1 section end------>
    <div class="products">
    	<div class="heading">
    		<h1>our products</h1>
    	</div>
    	<?php include 'components/shop.php'; ?>
    </div>





    <!------products ection ends----->

    <?php include 'components/user_footer.php'; ?>



	<!--sweetalert cdn link -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<!-- custom js link -->
	<script type="text/javascript" src="user_script.js"></script>
	<?php include 'components/alert.php'; ?>
</body>	 
</html>