<div class="view_product_box">

<h2>View Category</h2>
<div class="border_bottom"></div>

<form action="" method="post" enctype="multipart/form-data"/>

<table width ="100%">
<thead>
   <tr>
     <th><input type="checkbox" id="checkAll">Check</th>
     <th>ID</th>
     <th>Category Title</th>
     <th>Status</th>
     <th>Delete</th>
     <th>Edit</th>
    </tr>    

</thead>

<?php

$all_categories=mysqli_query($con,"select * from categories order by cat_id DESC");
$i=1;

while($row=mysqli_fetch_array($all_categories)){

?>

 <tbody>
   <tr>
  <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['cat_id'];  ?>"></td>
  <td><?php echo $i;  ?></td>
  <td><?php echo $row['cat_title'];  ?></td>
  
  <td>
  <?php
  if($row['visible'] == 1){
    echo"approved";
  }else{
    echo"pending";
  }
  ?>
  </td>
  <td><a href="index.php?action=view_cat&delete_cat=<?php echo $row['cat_id']; ?>">Delete</a></td>
  <td><a href="index.php?action=edit_cat&cat_id=<?php echo $row['cat_id']; ?>">Edit</a></td>
   </tr>
</tbody>

<?php $i++; } ?>
<tr>
  <td><input type="submit" name="delete_all" value="Remove"></td>
<tr>  
</table>
</form>    

</div>

<?php

// Delete Product from admin panel

if(isset($_GET['delete_cat'])) {
   $delete_cat = mysqli_query($con,"delete from categories where cat_id='$_GET[delete_cat]' ");

  if($delete_cat){
    echo"<script>alert('Product category has been deleted succesfully!')</script>";
    echo"<script>window.open('index.php?action=view_cat','_self')</script>";
 }
}


// this will work when use checkbox and then press the remove button
if(isset($_POST['deleteAll'])){
  $remove = $_POST['deleteAll'];

  foreach($remove as $key){

  $run_remove=mysqli_query($con,"delete from categories where cat_id='$key'");  
  
  if($run_remove){
  
  echo"<script>alert('Items selected has been removed succesfully!')</script>";
  echo"<script>window.open('index.php?action=view_cat','_self')</script>";
  
  }else{
  
  echo"<script>alert('Mysqli Failed: mysqli_error($con)!')</script>";  
  }
}
}



?>