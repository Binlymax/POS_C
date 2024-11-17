</div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Galaxy shop</b> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->



<script src="../assets/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="../assets/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../assets/jquery.dataTables.js"></script>
<script src="../assets/dataTables.bootstrap4.js"></script>
<script src="../assets/tagsinput.js?v=1"></script>

<script src="../assets/sweetalert2@9.js"></script>

<script src="../assets/adminlte.min.js"></script>

<!-- AdminLTE App -->
<script src="../assets/demo.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->


<script>
  $(document).ready(function () {
    //$('.sidebar-menu').tree();
    //$('.select2').select2();
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<script>
$(function() {

    // cb(start, end);
    // $('#createContactModal').modal('show')
    $('#example1').DataTable({
        "order": [
            [0, "desc"]
        ],
        "lengthMenu": [
            [10 ,25, 50, -1],
            [10 ,25, 50, "All"]
        ],

    });

    

});
</script>


<?php if(isset($_GET['save_ok'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Order successfully',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>


<?php if(isset($_GET['mem_editp'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Edit Profile | <?php echo $row['mem_name'];?>',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>

<?php if(isset($_GET['mem_error'])){ ?>
<script>
  Swal.fire({
  title: 'error',
  text: 'Duplicate username',
  icon: 'error',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>


<?php if(isset($_GET['mem_add'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Data saved',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>

<?php if(isset($_GET['mem_edit'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Edit | <?php echo $row['mem_name'];?> succeed',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>


<?php if(isset($_GET['mem_del'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Deleted',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>  


<?php if(isset($_GET['mem_no'])){ ?>
<script>
  Swal.fire({
  title: 'Error',
  text: 'Can not entry',
  icon: 'error',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>  


<?php if(isset($_GET['product_add'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Data saved',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>


<?php if(isset($_GET['product_edit'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Edit | <?php echo $row['p_name'];?> succeed',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>

<?php if(isset($_GET['product_del'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Deleted',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>  

<?php if(isset($_GET['product_no'])){ ?>
<script>
  Swal.fire({
  title: 'Error',
  text: 'Not accessible',
  icon: 'error',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>



<?php if(isset($_GET['table_add'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Data saved',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>


<?php if(isset($_GET['table_edit'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Edit | <?php echo $row['tb_name'];?> succeed',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>

<?php if(isset($_GET['table_del'])){ ?>
<script>
  Swal.fire({
  title: 'succeed',
  text: 'Deleted',
  icon: 'success',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>  

<?php if(isset($_GET['table_no'])){ ?>
<script>
  Swal.fire({
  title: 'Error',
  text: 'Not accessible',
  icon: 'error',
  confirmButtonText: 'Argree'
})
</script>
<?php } ?>