<?php
include("includes/db.php");
include("functions/functions.php");
?>


<html>
<head>
    <meta charset="utf-8">
    <Title>
        Foxy-Fashion
    </Title>
    
    <link rel="stylesheet" href="styles/style.css" media="all"/>
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
   

   
            

  </div>
</div>