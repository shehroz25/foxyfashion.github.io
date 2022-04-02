<?php
include('includes/header.php');


?>


<html>
<head>
    <Title>
        cart
    </Title>
    
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<!--------------Dynamically add products to cart page--------------->
   <div id ="content_area">
       <div class="shopping_cart_container">

        <div id ="shopping_cart" align="right" style="padding:15px">
         
        <b style="color: navy">Your Cart-</b>Total Items:  <?php   total_items(); ?> Total Price:  <?php total_price(); ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width=100%>
            <tr align="center">
                <th>Remove</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr> 
        <?php 
        $total =0;
        $ip=get_ip();
        $run_cart=mysqli_query($con,"select * from cart where ip_address='$ip'");
        while($fetch_cart=mysqli_fetch_array($run_cart)){
        $product_id=$fetch_cart['product_id'];
        $result_product=mysqli_query($con,"select * from products where product_id='$product_id'");
        
        while($fetch_product=mysqli_fetch_array($result_product)){
            
            $product_price=array($fetch_product['product_price']);
            $product_title=$fetch_product['product_title'];
            $product_image=$fetch_product['product_image'];
            $sing_price=$fetch_product['product_price'];
            $values=array_sum($product_price);
            // this will tell us the quantity of product
            $run_qty=mysqli_query($con,"select * from cart where product_id='$product_id'");
            $row_qty=mysqli_fetch_array($run_qty);
            $qty=$row_qty['quantity'];
            $values_qty = $values * $qty; 

            $total += $values_qty;
            
       
    ?>
        
            <tr align="center">
                <td><input type="checkbox" name="remove[]" value="<?php echo $product_id;   ?>"/></td>
                <td><?php   echo $product_title;?> 
                <br>
                <img src="admin_area/product_images/<?php echo $product_image;?>"/ width="80" height="80">
                </td>
                <td><input type="number" id="qty"  name="qty" value="<?php echo $qty; ?>" min="1" max="5"></td>
                <td><?php echo "$".$sing_price;   ?></td>
            </tr>
            <?php }}  ?> 

                
            <tr align="center">
                <td colspan="1"><input type="submit" name="update_cart" value="update-cart"/></td>
                <td><input type="submit" name="continue" value="continue shopping"/></td>
                <td><button><a href="checkout.php">Checkout</a></td>
                
            </tr> 
            <tr>
                <td colspan="1" align="right"><b>Sub-Total:</b></td>
                <td><?php echo total_price();?></td>
            </tr>   
        </table> 
        </form>   
        <!--- this will delete the items from the cart--->
        <?php
            if(isset($_POST['remove'])){
                foreach($_POST['remove'] as $remove_id){
                    $run_delete=mysqli_query($con,"delete from cart where product_id='$remove_id'AND ip_address='$ip'");

                    if($run_delete){
                        echo"<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
            if(isset($_POST['continue'])){
                echo"<script>window.open('index.php','_self')</script>";
            }

        ?>
        </div>
        <div id="products_box">
            
            
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