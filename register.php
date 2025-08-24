<?php
    include 'components/connect.php';

    if (isset($_COOKIE['user_id'])) {
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = '';
    }

    if (isset($_POST['register'])) {

        $id = unique_id();
        $name = $_POST['name'];
        

        $email = $_POST['email'];
        

        $pass = $_POST['pass'];
    

        $cpass = $_POST['cpass'];
    

        $image = $_FILES['image']['name'];
        
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_files/'.$rename;

        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email=?");
        $select_user->execute([$email]);

        if ($select_user->rowCount() > 0) {
            $warning_msg[] = 'email already exist';
        }else{
            if ($pass != $cpass) {
                $warning_msg[] = 'confirm password not matched';
            }else{
                $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?,?,?,?,?)");
                $insert_user->execute([$id, $name, $email, $cpass, $rename]);
                move_uploaded_file($image_tmp_name, $image_folder);
                $success_msg[] = 'new user registered! please login now'; 
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
        <form action="" method="post" enctype="multipart/form-data" class="register">
            <h3>register now</h3>
            <div class="flex">
                <div class="col">
                    <div class="input-field">
                        <p>Your name <span>*</span></p>
                        <input type="text" name="name" placeholder="enter your name" maxlength="50" required class="box">
                    </div>
                    <div class="input-field">
                        <p>Your email <span>*</span></p>
                        <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
                    </div>
                </div>
                <div class="col">
                    <div class="input-field">
                        <p>Your password <span>*</span></p>
                        <input type="password" name="pass" placeholder="enter your password" maxlength="50" required class="box">
                    </div>
                    <div class="input-field">
                        <p>confirm password <span>*</span></p>
                        <input type="password" name="cpass" placeholder="enter your password" maxlength="50" required class="box">
                    </div>
                </div>
            </div>
            <div class="input-field">
                <p>select profile <span>*</span></p>
                <input type="file" name="image" accept="image/*" required class="box">
            </div>
            <p class="link">already have an account ? <a href="login.php">login now</p><br>
            <input type="submit" name="register" class="btn" value="register now">
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