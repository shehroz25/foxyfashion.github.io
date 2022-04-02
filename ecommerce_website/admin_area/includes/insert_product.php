


<div class="form_box">
<form action="" method="post" enctype="multipart/form-data">
    <table align="center" width="100">
        <tr>
            <td colspan="7">
            <h2>Add Product</h2>
            <div class="border_bottom"></div>
            </td>
        </tr>    

        <tr>
            <td><b>Product Title</b></td>
            <td ><input type="text" name="product_title" size="60" required/></td>
        </tr>

        <tr>
            <td><b>Product Category</b></td>
            <td>
                <select name="product_cat">
                    <option>Select a category</option>
                <?php
               
                    $get_cats = "select * from categories";
                    $run_cats = mysqli_query($con,$get_cats);
                    while($row_cats=mysqli_fetch_array($run_cats)){
                    $cat_id=$row_cats['cat_id'];
                    $cat_title=$row_cats['cat_title'];
                    echo "<option value='$cat_id'>$cat_title</option>";    
                    
    
                }
                
                ?>
                </select>    
                
            
            </td>
        </tr>

        <tr>
            <td><b>Product Image</b></td>
            <td><input type="file" name="product_image" /></td>
        </tr>

        <tr>
            <td><b>Product Price</b></td>
            <td><input type="text" name="product_price"required/></td>
        </tr>

        <tr>
            <td valign="top"><b>Product Description</b></td>
            <td><textarea name="product_descp" rows="10"></textarea></td>
        </tr>
        
        <tr>
            <td></td>
            <td colspan="7"><input type="submit" name="insert_post" value="Add Product"/></td>
        </tr>    

    </table>
</form>

</div>

<?php

if(isset($_POST['insert_post'])){
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $product_price=$_POST['product_price'];
    $product_descp= trim(mysqli_real_escape_string($con,$_POST['product_descp']));

    // Extracting images from the admin panel
    $product_image  = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($product_image_tmp,"product_images/$product_image");

    $insert_product="insert into products(product_cat,product_title,product_price,product_descp,product_image) 
    values('$product_cat','$product_title','$product_price','$product_descp','$product_image')";

    $insert_pro=mysqli_query($con,$insert_product);
    if($insert_pro){
        echo"<script>alert('Product has been inserted succesfully!')</script>";
        //echo"<script>window.open('index.php?insert_product','_self')</script>";
    }



}






?>