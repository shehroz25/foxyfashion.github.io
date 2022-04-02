<?php
include('includes/header.php');
?>


<html>
<head>
    <Title>
        Products
    </Title>
    
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="main-wrapper">
    
  <!-- <div class ="header-wrapper">
      
    <div class="header-logo">
       <a href= "index.php">
       <img id="logo" src="images/logo.png" width="250" height="50">
      </a>
      <div class="cart">
        <ul>
        <img src="images/cart.png" id="cart_image"> 
        </ul> 
        <div class ="noti_cart_number">
           // 
            
            //total_items();
            //
        </div>
     </div>
   </div> -->
   

   
            

  </div>
</div>

   
            

 
<!--------------Menu-Bar--------------->
       






<div class="content-wrapper"> 
    
<img id="header" src="images/header.png">
</div>

<div class="feature-products">
    <h2>Featured-Products</h2>
</div>    
    
    
<!--------------Dynamically add products from database to main-page--------------->
   <div id ="content_area">
    
    
        <div id="products_box">
            
<?php 

    $get_pro="select * from products";
$run_pro=mysqli_query($con,$get_pro);

while($row_pro= mysqli_fetch_array($run_pro)){

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
            <a href='details.php?pro_id=$pro_id'>Details</a>
            <a href='index.php?add_cart=$pro_id'>
            <input type='button' class='btns' value='Add to cart'>
            </a>
            </div>
        ";    


}

             ?>
            
            <?php get_pro_by_cat_id(); ?>
        </div>
    </div>        

</div>
<footer>

  
    Foxy-Fashion<br>
 


<!-- <hr width="100%"> -->
<ul class="list">
        <li>
        <a href="#">Home</a>
        </li>
        <li>
        <a href="#">Services</a>
        </li>
        <li>
        <a href="#">About</a>
        </li>
        <li>
        <a href="#">Terms</a>
        </li>
        <li>
        <a href="#">Contact</a>
        </li>
    </ul>
<p style="font-size: 30px; margin: 15px;">
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-youtube"></a>
<a href="#" class="fa fa-instagram"></a>
<a href="#" class="fa fa-twitter"></a>
</p> 
    <p class="copyright">
        Copyright @2022
    </p> 
</footer>
   














</body>
</html>