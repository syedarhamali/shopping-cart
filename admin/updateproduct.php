<?php

include("../db.php");
include "sidenav.php";
include "topheader.php";
$product_id=$_REQUEST['product_id'];

$result=mysqli_query($con,"SELECT `product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords` FROM `products` WHERE product_id='$product_id'")or die ("query 1 incorrect.......");

list($product_id,$product_cat,$product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

  $product_name=$_POST['product_name'];
  $details=$_POST['details'];
  $price=$_POST['price'];
  $product_type=$_POST['product_type'];
  $brand=$_POST['brand'];
  $tags=$_POST['tags'];
  
  //picture coding
  $old_picture_name=$_POST['picture'];
  $new_picture_name=$_FILES['new_picture']['name'];
  
  if($new_picture_name != ''){
      $update_filename=$new_picture_name;
      $picture_name=$_FILES['new_picture']['name'];
      $picture_type=$_FILES['new_picture']['type'];
      $picture_tmp_name=$_FILES['new_picture']['tmp_name'];
      $picture_size=$_FILES['new_picture']['size'];

  if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
  {
	if($picture_size<=50000000){
	
		$pic_name=time()."_".$update_filename;
		move_uploaded_file($picture_tmp_name,"../product_images/".$pic_name);
		
    $a=mysqli_query($con,"UPDATE products SET product_cat='$product_type',product_brand='$brand',product_title='$product_name',product_price='$price',product_desc='$details',product_image='$pic_name',product_keywords='$tags' WHERE  product_id='$product_id'");
    if($a){
      echo "<script>window.location.href='productlist.php'</script>";
    }
    else{
      echo 'not run';}

    mysqli_close($con);
  }
    
  }
  
  }
  else{
    $update_filename=$old_picture_name;
    $a=mysqli_query($con,"UPDATE products SET product_cat='$product_type',product_brand='$brand',product_title='$product_name',product_price='$price',product_desc='$details',product_image='$update_filename',product_keywords='$tags' WHERE product_id='$product_id'");
    if($a){
      echo "<script>window.location.href='productlist.php'</script>"; 
    }
    else{
      echo 'not run';}

    mysqli_close($con);

}
} 


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        <form action="updateproduct.php" name="form" method="POST" enctype="multipart/form-data">
          <div class="row">          
          <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id;?>" />    
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Update Product</h5>
              </div>
              <div class="card-body">
              
                  <div class="row">
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Title</label>
                        <input type="text" id="product_name" value="<?php echo $product_title; ?>" name="product_name" class="form-control"  required>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="">
                        <label for="">Add Image</label>
                        <input type="hidden"  name="picture" value="<?php echo $product_image; ?>" class="btn btn-fill btn-success" id="picture" >
                        <input type="file"  name="new_picture"  class="btn btn-fill btn-success" id="picture">
                      </div>
                    </div>
                     <div class="col-md-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" cols="80" id="details"  name="details" class="form-control"  required ><?php echo $product_desc; ?></textarea>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Pricing</label>
                        <input type="text" id="price" value="<?php echo $product_price; ?>" name="price" required class="form-control" >
                      </div>
                    </div>
                  </div>
                 
                  
                
              </div>
              
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Categories</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Category   </label>
                        <br> <p style="color:grey;font-size: 11px;">1 electronic, 2 Ladies Wears, 3 Mens Wear, 4 Kids Wear, 5 Furnitures, 6 Home Appliances, 7 Electronics Gadgets</p>
                        <input type="number" id="product_type" value="<?php echo $product_cat; ?>" name="product_type" required="[1-6]" class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Product Brand</label>
                        <br> <p style="color:grey;font-size: 11px;">1 HP, 2 Samsung, 3 Apple, 4 Motorola, 5 LG, 6 Cloth Brand, 7 Electronics Gadgets</p>
                        <input type="number" id="brand" value="<?php echo $product_brand; ?>" name="brand" required class="form-control">
                      </div>
                    </div>
                     
                  
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Product Keywords</label>
                        <input type="text" id="tags" value="<?php echo $product_keywords; ?>" name="tags" required class="form-control" >
                      </div>
                    </div>
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
<?php
include "footer.php";
?>