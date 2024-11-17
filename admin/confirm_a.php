<?php 
$menu = "sale";
?>

<?php include("header.php"); ?>

<?php

    // echo'<pre>';
	// print_r($_SESSION);
	// echo'</pre>';
 	//exit();



 	error_reporting( error_reporting() & ~E_NOTICE );
	session_start();
	$mem_id=$_SESSION['mem_id'];
	$mem_address=$_SESSION['mem_address'];
	?>

<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1>List of all ordered products</h1>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


    	<div class="card card-gray">
            <div class="card-header ">
              <h3 class="card-title">Order confirmation</h3>
            </div>
            <br>



              <div class="card-body">

                <div class="col-md-12">

                	<div class="container">
<div class="row">
<div class="col-12 col-sm-12 col-md-12">
<form id="frmcart" name="frmcart" method="post" action="saveorder_a.php">
<?php if ($_id != ''){?>

	<h4>Confirm order list<br>
	Name : <?php echo $row_member['mem_name']; ?> <br/>Address : <?php echo $row_member['mem_address'];?>Phone : <?php echo $row_member['mem_phone'];?>
	</h4>
<?php }?>

  <table border="0" align="center" class="table table-hover table-bordered table-striped">
    
    <tr>
      <td width="5%" align="center">Product order</td>
      <td width="10%" align="center">img</td>
      <td width="40%" align="center">product</td>
      <td width="10%" align="center">price</td>
      <td width="10%" align="center">quantity</td>
      <td width="15%" align="center">total(Đông)</td>
     
    </tr>
<?php

$total=0;
if(!empty($_SESSION['cart']))
{
	
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "SELECT * FROM tbl_product where p_id=$p_id";
		$query = mysqli_query($condb, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['p_price'] * $qty;//เอาราคาสินค้ามา * จำนวนในตระกร้า
		$total += $sum; //ราคารวม ทั้ง ตระกร้า
		echo "<tr>";
		echo "<td>" . $i+=1 . "</td>";
		echo "<td>"."<img src='../p_img/".$row['p_img']."' width='100%'>"."</td>";
		echo "<td>" 

		. $row["p_name"] 
		."<br>"
		."Stock "
		.$row['p_qty']
		." List"

		. "</td>";
		echo "<td align='right'>" .number_format($row["p_price"]) . "</td>";
		echo "<td align='right'>"; 



		$pqty = $row['p_qty'];//ประกาศตัวแปรจำนวนสินค้าใน stock
		echo "<input type='number' name='amount[$p_id]' value='$qty' size='2'class='form-control' min='0'max='$pqty' readonly/></td>";


		echo "<td align='right'>".number_format($sum)."</td>";
		//remove product
	
	}
	echo "<tr>";
	
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
  	echo "<td  align='center'><b>Total price</b></td>";
  	echo "<td align='right'colspan='2'>"."<b>".number_format($total)."</b>"."</td>";
  	
	echo "</tr>";
}
?>

</table>



<?php if ($mem_id != ''){?>

<div class="form-group row">
 <label for="" class="col-sm-2 col-form-label">Amount to be paid</label>
    <div class="col-sm-5">
    <input type="text" name="pay_amount" readonly class="form-control" id="" 
    value="<?php echo ($total); ?>" placeholder="">
    </div>
</div>



<div class="form-group row">
 <label for="" class="col-sm-2 col-form-label">Amount received as payment</label>
    <div class="col-sm-5">
    <input type="number" min="<?php echo $total; ?>" name="pay_amount2" required class="form-control" id="" 
     placeholder="">
    </div>
</div>


<div class="form-group row">
 <label for="" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-5">
    <input type="hidden" name="mem_id" value="<?php echo $mem_id;?>">

	<button type="submit" class="btn  btn-primary btn-block" >Order confirmation</button>
</div>
	

<?php }else{?>
	<a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a>

<?php }?>


</form>
		</div>
	</div>
</div>

                 
                 
              	</div>
              
              </div>

		<div class="card-footer">
             
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