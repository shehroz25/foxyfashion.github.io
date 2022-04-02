<?php

include('includes/header.php');

?>
<html>
<head>
    <Title>
        Details
    </Title>
    
    <link rel="stylesheet" href="styles/style.css" media="all"/>
</head>

<body>
<!-- <div class="main-wrapper">
    
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
            
        </div>
     </div>
   </div>
   

   
            

  </div>
</div> -->
<!--------------Menu-Bar--------------->
   <!-- <div class="menu-bar">
  
    <ul>    
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="index.php">About</a></li>
        
        <li><a href="cart.php">Shopping-cart</a></li>
        <li><a href="index.php">Contact</a></li>
    </ul>
    </div>     -->








<div class="feature-products">
    <h2>Product</h2>
</div>    
    
    
<!--------------Dynamically add products from database to main-page--------------->
   <div id ="content_area">
       
        <div id="products_box">
            
            <?php
             if(isset($_GET['pro_id'])){
                $product_id = $_GET['pro_id'];

                $run_query_by_pro_id = mysqli_query($con,"select * from products where product_id='$product_id'");

                while($row_pro=mysqli_fetch_array($run_query_by_pro_id)){
                    $pro_id=$row_pro['product_id'];
                    $pro_cat=$row_pro['product_cat'];
                    $pro_title=$row_pro['product_title'];
                    $pro_price=$row_pro['product_price'];
                    $pro_image=$row_pro['product_image'];

                 echo"
                    <div id='single_product'>
                    <h3>$pro_title</h3>
                    <img src='admin_area/product_images/$pro_image'width='180'height='180'/>
                    <p><b>Price:$pro_price</b></p>
                    
                    <a href='index.php?add_cart=$pro_id'>
                    <input type='button' class='btns' value='Add to cart'>
                    </a>
                    </div>
                ";   
                }
             }
            
            
            ?>
        </div>
    </div>        

</div>
   














</body>
</html>