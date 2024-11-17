<?php 
$menu = "table"
?>
<?php include("header.php"); ?>

<?php 

$table_id = $_GET['table_id'];

$query_table = "SELECT * FROM tbl_table 
WHERE table_id = $table_id"  
or die("Error : ".mysqlierror($query_table));
$rs_table = mysqli_query($condb, $query_table);
$row=mysqli_fetch_array($rs_table);
//echo $row['mem_name'];
//echo ($query_member);//test query




?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
      <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>Table</h1>
      </div><!-- /.container-fluid -->
    </section>


<!-- Main content -->
<section class="content">

<div class="card card-gray">
        <div class="card-header ">
          <h3 class="card-title">Edit table</h3>
          
        </div>
        <br>
        <div class="card-body">

          <div class="row">
             
             <div class="col-md-8">
               <form action="table_db.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="table" value="edit">
                <input type="hidden" name="table_id" value="<?php echo $row['table_id'];?>">

              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Name table </label>
                <div class="col-sm-10">
                  <input  name="tb_name" type="text" required class="form-control"  placeholder="" value="<?php echo $row['tb_name']; ?>"  minlength="3"/>
                </div>
              </div>

              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Capacity </label>
                <div class="col-sm-10">
                  <input  name="tb_capacity" type="number" min="0" required class="form-control" value="<?php echo $row['tb_table']; ?>"  minlength="3"/>
                </div>
              </div>


              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Detail </label>
                <div class="col-sm-10">
                  <textarea name="tb_detail" class="form-control"><?php echo $row['tb_detail']; ?></textarea>
                </div>
              </div>

              <!-- <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Status </label>
                    <div class="col-sm-10">
                      <select class="form-control select2" name="ref_l_id" id="ref_l_id" required>
                        <option value="<?php echo $row['ref_l_id'];?>">-- <?php if ($row['ref_l_id']==1) {
                          echo "Table";
                        }else ?> </option>
                        
                          <option value="1">Available</option>
                          <option value="2">Occupied </option>
                          <option value="3">Reserved </option>

                        </select>
                    </div>
                  </div> -->

              <button type="submit" class="btn btn-danger btn-block">Update</button>
              </form>
             </div>
          </div>
        </div>
        <div class="card-footer"> 
        </div> 
</div>
</section>
<!-- /.content -->
<?php include('footer.php'); ?>

<script>
$(function () {
$(".datatable").DataTable();
// $('#example2').DataTable({
//   "paging": true,
//   "lengthChange": false,
//   "searching": false,
//   "ordering": true,
//   "info": true,
//   "autoWidth": false,
// });
});
</script>

</body>
</html>
