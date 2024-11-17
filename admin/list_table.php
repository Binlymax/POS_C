<?php
// Include necessary files and database connection
include("header.php");

// Fetch table information from the database
$query_table = "SELECT * FROM tbl_table";
$rs_table = mysqli_query($condb, $query_table);

// Check for any errors
if (!$rs_table) {
    die("Error: " . mysqli_error($condb));
}
?>


<!-- Table order -->

<!-- <?php 
$query_my_order = "SELECT o.* ,m.mem_name
FROM tbl_order as o
INNER JOIN tbl_member as m ON o.mem_id=m.mem_id

WHERE o.order_status=4
ORDER BY o.order_id DESC
"  
or die
("Error : ".mysqlierror($query_my_order));
$rs_my_order = mysqli_query($condb, $query_my_order);
//echo ($query_my_order);//test query

?> -->


<!-- HTML content -->
<section class="content-header">
    <div class="container-fluid">
        <h1>Table</h1>
    </div>
</section>
<section class="content">
    <div class="card card-gray">
        <div class="card-header ">
          <h3 class="card-title">TABLE LIST</h3>
          <div align="right">
          
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add table</button>
          
        </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr class="danger">
                                <th width="5%"><center>No.</center></th>
                                <th width="20%">Table Name</th>
                                <th width="10%">Capacity</th>
                                <th width="20%">Detail</th>
                                <th width="10%">Date</th>
                                <th width="10%">List</th>
                                <th width="10%">edit</th>
                                <th width="10%">del</th>
                                <!-- <th width="10%">Order</th> -->

                                <!-- <th width="10%">Menu</th> -->
                                <!-- Add more columns as needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Counter variable for table number
                            $table_number = 1;
                            while ($row_table = mysqli_fetch_assoc($rs_table)) {
                            ?>
                            <tr>
                                <td><?php echo $table_number++; ?></td>
                                <td><?php echo $row_table['tb_name']; ?></td>
                                <td><?php echo $row_table['tb_capacity']; ?></td>
                                <td><?php echo $row_table['tb_detail']; ?></td>
                                <td><?php echo $row_table['tb_date']; ?></td>
                                <!-- <td><?php echo $row_table['tb_date']; ?></td> -->
                                <td><a href="list_l.php?" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Make list</a></td>

                                <!-- Add more columns as needed -->

                                <td>
                                  <p style="margin-bottom: 10px;">
                                  

                                  <a href="table_edit.php?table_id=<?php echo $row_table['table_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>
                                  </p>
                    
                                  <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_table['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->
                                  </td>
                                  <!-- <td><a href="table_db.php?table_id=<?php echo $row_table['table_id']; ?> " class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i> Del</a></td> -->
                                  <td><a href="table_db.php?table_id=<?php echo $row_table['table_id']; ?>&&table=del" class="del-btn btn btn-danger" onclick = "return confirm('Do you want to delete data?')"><i class="fas fas fa-trash"></i> Del</a></td> 
                                  <!-- <?php foreach ($rs_my_order as $rs_order) {}?>
                                  <td><a href="index.php?order_id=<?php echo $rs_order['order_id'];?>&act=view" target="_blank" class="btn btn-success btn-xs"><i class="nav-icon fas fa-clipboard-list"></i> Open order</a></td> -->

                                                                    
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="table_db.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title" id="exampleModalLabel">Add Table</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Table Name</label>
                        <div class="col-sm-10"><div class="col-sm-10">
                            <select name="tb_name" required class="form-control">
                                <option value="Table No.01">Table No.01</option>
                                <option value="Table No.02">Table No.02</option>
                                <option value="Table No.03">Table No.03</option>
                                <option value="Table No.04">Table No.04</option>
                                <option value="Table No.05">Table No.05</option>

                            </select>
                            <!-- <input name="tb_name" type="text" required class="form-control" placeholder="Table Name" minlength="3" /> -->
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"> Capacity </label>
                        <div class="col-sm-10">
                            <input name="tb_capacity" type="number" min="1" required class="form-control" placeholder="Capacity" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Detail</label>
                        <div class="col-sm-10">
                            <input name="tb_detail" type="text"  required class="form-control" placeholder="Detail" />
                        </div>
                    </div>
                   
                    
                    <!-- You can add more fields for table details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>
