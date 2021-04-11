<?php
    require('top.inc.php');
    if(isset($_GET['type']) && $_GET['type']!=''){
      $type=get_safe_val($con,$_GET['type']);

      if($type=='delete')
      {
        $id=get_safe_val($con,$_GET['id']);
        $delete_sts = "delete from contact_us  where id='$id' ";
        mysqli_query($con,$delete_sts);
      }
    }
    $sql = "SELECT * FROM contact_us  order by id desc";
    $res = mysqli_query($con,$sql);
    ?>
        <div class="content pb-0 m-5 min-vh-100">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Customer's Contact List</h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="avatar">#</th>
                                       <th>Id</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Phone</th>
                                       <th>Message</th>
                                       <th>Time</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)) { ?>
                                      <tr>
                                       <td class="serial"><?php echo $i?></td>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['name']?></td>
                                       <td><?php echo $row['email']?></td>
                                       <td><?php echo $row['phone']?></td>
                                       <td><?php echo $row['message']?></td>
                                       <td><?php echo $row['time']?></td>
                                       <td><?php
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