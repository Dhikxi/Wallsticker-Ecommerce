<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = '';
    }

    if (isset($_POST['login'])) {

        
        $email = $_POST['email'];
        

        $pass = $_POST['pass'];
        


        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email=? AND password=? LIMIT 1");
        $select_user->execute([$email, $pass]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);

        if ($select_user->rowCount() > 0) {
            setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
            header('location:home.php');
        }else{
            $warning_msg[] = 'incorrect email or password!';
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
    <link rel="stylesheet" type="text/css" href="css/user_style.css?v=<?php echo time(); ?>">
    <title>Asian chromas - register page</title>
</head>
<body>

    
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>register</h1>
            <p>loremsv bfeiurhghaerggj jgbsuiehgoekgndf fnbndhgaenejgh daerihgienkke<br>nuihfvdnbdubsjuhogsjknbuhjnuethgjfnbjdbuehiejnbdsbsjfndjgjueg</p>
            <span><a href="home.php">home</a><i class="fas fa-arrow-right"></i>register</span>   
        </div>
    </div>
    <!-------- register form section end------->
    
    <div class="form-containers">
        <form action="" method="post" enctype="multipart/form-data" class="login">
            <h3>login now</h3>
            <div class="input-field">
                <p>Your email <span>*</span></p>
                <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
            </div>
            <div class="input-field">
                <p>Your password <span>*</span></p>
                <input type="password" name="pass" placeholder="enter your password" maxlength="50" required class="box">
            </div>
            
            <p class="link">do not have an account ? <a href="register.php">register now</p><br>
            <input type="submit" name="login" class="btn" value="login now">
        </form> 
    </div><br><br><br><br>

    
    

    
    <?php include 'components/user_footer.php'; ?>



    <!--sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- custom js link -->
    <script type="text/javascript" src="..js/user_script.js"></script>
    <?php include 'components/alert.php'; ?>
</body>  
</html>