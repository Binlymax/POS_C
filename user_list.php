<?php
$menu = "member"
?>
<link rel="icon" type="" href="t.png" />

<!-- <?php include("header.php"); ?> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
$query_member = "SELECT * FROM tbl_member" or die("Error : ".mysqlierror($query_member));
// $rs_member = mysqli_query($condb, $query_member);
// echo ($query_level);//test query
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Member Registration</h1>
  </div><!-- /.container-fluid -->
</section>

<!-- /.content -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="member_db.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="member" value="add">
      <div class="modal-content">          
        <div class="modal-body">
          <div class="form-group row">
            <div class="col-sm-10">
              <select class="form-control" name="ref_l_id" id="ref_l_id" required>
                <option value="1">-- Admin --</option>
                <option value="2">-- Member --</option>
                <!-- <option value="2">Member</option> -->
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="mem_name" class="col-sm-2 col-form-label">Name </label>
            <div class="col-sm-10">
              <input type="text" name="mem_name" class="form-control" id="mem_name" placeholder="Enter your name" value=""required>
            </div>
          </div>
          <div class="form-group row">
            <label for="mem_username" class="col-sm-2 col-form-label">Username </label>
            <div class="col-sm-10">
              <input type="text" name="mem_username" class="form-control" id="mem_username" placeholder="Enter your username" value=""required>
            </div>
          </div>
          <div class="form-group row">
            <label for="mem_password" class="col-sm-2 col-form-label">Password </label>
            <div class="col-sm-10">
              <input type="password" name="mem_password" class="form-control" id="mem_password" placeholder="Enter your password" value="" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="mem_address" class="col-sm-2 col-form-label">Adddress </label>
            <div class="col-sm-10">
              <input type="text" name="mem_address" class="form-control" id="mem_address" placeholder="Enter your adddress" value="" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="mem_phone" class="col-sm-2 col-form-label">Phone </label>
            <div class="col-sm-10">
              <input type="text" name="mem_phone" class="form-control" id="mem_phone" placeholder="Enter your phone" value="" required>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- <?php include('footer.php'); ?> -->

<!-- Add custom CSS -->
<style>
  body {

    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    background-image: url("2.jpg");
    background-repeat: no-repeat;
    background-size: 100% ;
    max-width:350px;
    margin-left: 36%;
    text-align: center;


  
  }

  .content-header h1 {
    margin-top: 20px;
    margin-bottom: 20px;
    font-size: 24px;
    color: #ffffff;
    text-align: center;
  }

  .modal-content {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  .modal-body {
    padding: 20px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-control {
    border-radius: 5px;
    padding: 10px;
  }

  .modal-footer {
    padding: 15px;
    border-top: none;
    background-color: #ffffff;
  }

  .btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;

  }

  .btn-primary:hover {
    background-color: #0056b3;
  }
</style>
<script>
$(function () {
  $(".datatable").DataTable();

  // Function to handle form submission
  $('#confirmButton').click(function() {
    Swal.fire({
      title: 'Are you sure?',
      text: 'Do you want to register this member?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, register!'
    }).then((result) => {
      if (result.isConfirmed) {
        $('#registrationForm').submit();
      }
    });
  });
});
</script>
</script>



</body>
</html>
