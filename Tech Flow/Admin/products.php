<?php
    require('top.inc.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_val($con,$_GET['type']);
      if($type=='status')
      {
        $operation=get_safe_val($con,$_GET['operation']);
        $id=get_safe_val($con,$_GET['id']);
        if($operation=='active')
        {
          $status = 1;
        }else{
          $status = 0;
        }
        $update_sts = "update product set status='$status' where id='$id' ";
        mysqli_query($con,$update_sts);
      }
      if($type=='delete')
      {
        $id=get_safe_val($con,$_GET['id']);
        $delete_sts = "delete from product where id='$id' ";
        mysqli_query($con,$delete_sts);
      }
    }
    $sql = "SELECT product.* , catagories.catagories from product,catagories 
    where product.catagories_id = catagories.id order by product.id desc";
    $res = mysqli_query($con,$sql);
    ?>
        <div class="content pb-0 m-5 min-vh-100">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products</h4>
                           <h5 class="box-title"><a href="add_products.php">Add Products</a></h5>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                       <th>Id</th>
                                       <th>Categories</th>
                                       <th>Name</th>
                                       <th>Image</th>
                                       <th>MRP</th>
                                       <th>Price</th>
                                       <th>QTY</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)) { ?>
                                      <tr>
                                       <td class="serial"><?php echo $i?></td>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['catagories']?></td>
                                       <td><?php echo $row['name']?></td>
                                       <td><img class="img" src="../Media/Products<?php echo $row['image']?>"/></td>
                                       <td><?php echo $row['mrp']?></td>
                                       <td><?php echo $row['price']?></td>
                                       <td><?php echo $row['qty']?></td>
                                       <td><?php
                                       if($row['status']==1){
                                         echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp";
                                       }else{
                                         echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp";
                                       }
                                       echo "<span class='badge badge-edit'><a href='add_products.php?id=".$row['id']."'>Edit</a></span>&nbsp";
                                       echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                                       ?></td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
    require('footer.inc.php');
?>