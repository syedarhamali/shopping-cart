
    <?php
// session_start();
include("../db.php");

error_reporting(0);

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
  $order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($con,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Orders  / Page <?php echo $page;?> </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>Oreder ID</th><th>User ID</th><th>Name | Email</th><th>Address</th><th>ZIP Code</th><th>State</th><th>City</th>
                    <th>Delete</th></tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"SELECT order_id, user_id, f_name, email, address, city, state, zip FROM orders_info Limit $page1,12")or die ("query 1 incorrect.....");

                        while(list($order_id,$user_id,$f_name,$email,$address,$city,$state,$zip)=mysqli_fetch_array($result))
                        {	
                        echo "
                        <tr>
                          <td>$order_id</td>
                          <td>$user_id</td>
                          <td>$f_name<br>$email</td>
                          <td>$address</td>
                          <td>ZIP: $zip</td>
                          <td>$state</td>
                          <td>$city</td>
                          <td>
                          <a class=' btn btn-danger' href='deleteorders.php?id=$order_id'>Delete</a>
                          </td>
                        </tr>";
                        }
                        ?>
                        <!-- <a class=' btn btn-danger' href='deleteorders.php?id=$order_id&action=delete'>Delete</a>    <a class=' btn btn-danger' href='deleteorders.php?id=$order_id&action=delete'>Delete</a> -->
                    </tbody>
                  </table>
                  
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
              <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"SELECT order_id, user_id, f_name, email, address, city, state, zip FROM orders_info");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="orders.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
            </div>
          </div>
          
        </div>
      </div>
      <?php
include "footer.php";
?>