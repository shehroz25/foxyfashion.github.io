<?php
session_start();
include("includes/db.php");
include("functions/functions.php");   
?>


<html>
<head>
    <meta charset="utf-8">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dongle&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <script src="js/jquery.js"></script>
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
</head>

<body>


<div class="main-wrapper">
    
 <div class ="header-wrapper">
   <div class="header-logo">
       <a href= "index.php">
       <img id="logo" src="images/logo.png" width="250" height="50">
      </a>
      <div class="cart">
        <ul>
        <img src="images/cart.png" id="cart_image"> 
        </ul> 
        <div class ="noti_cart_number">
            <?php
            
            total_items();
            ?>
        </div>
     </div> 
    </div>  
    
  


    

  <?php if(!isset($_SESSION['user_id'])){ ?>

  <div class="register_login">
    <div class="login"><a href="index.php?action=login">Login</a></div>
    <div class="register"><a href="register.php">Register</a></div> 
  </div>
  <?php }else{ ?> 

    <?php
    $select_user=mysqli_query($con,"select * from users where id='$_SESSION[user_id]'");
    $data_user=mysqli_fetch_array($select_user);
    
    ?>
  
    <!-- <div id ="profile">
      <ul>
        <li class="dropdown_header">
        <a>
          <?php if($data_user['image'] !='') {?>
          
            <span><img src="customer/customer_images/<?php echo $data_user['image']?>"></span>
            
            <?php }else{ ?>
            
            <span><img src="images/profile.png"></span> 
            
            <?php } ?> 
          </a>
          
          <ul class="dropdown_header_menu">
            <li><a href="my_account.php">Account Setting</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>  
        
        </li>
      </ul>  



    </div> -->
     
  
   <?php }?>          

  
             
  </div> 
  
  <div class="menu-bar">
  
  <ul>    
   <li><a href="index.php">Home</a></li>
   <li><a href="products.php">Products</a></li>
   <li><a href="index.php">About</a></li>
   
   <li><a href="cart.php">Shopping-cart</a></li>
   <li><a href="contact.php">Contact</a></li>
   <li><a href="logout.php">Logout</a></li>
   <li><a href="my_account.php?action=edit_account">Account Setting</a></li>
  </ul>
  </div>
</div>





<!-- code for toggle menu on profile icon -->
<script>
    $(document).ready(function(){
    $(".dropdown_header").click(function(){
        $(this).find(".dropdown_header_menu").slideToggle("fast");
        });    
    });
</script>