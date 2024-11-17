<?php
$order_id = mysqli_real_escape_string($condb, $_GET['order_id']);

$sqlpay = "SELECT d.*, p.*, m.mem_name, m.mem_address,m.mem_phone, o.order_date, o.order_status, o.pay_amount2
            FROM tbl_order_detail AS d
            INNER JOIN tbl_product AS p ON d.p_id=p.p_id
            INNER JOIN tbl_order AS o ON d.order_id=o.order_id
            INNER JOIN tbl_member as m ON o.mem_id=m.mem_id
            WHERE o.order_id=$order_id";

$querypay = mysqli_query($condb, $sqlpay) 
            or die("Error : ".mysqli_error($sqlpay));

$rowmember = mysqli_fetch_array($querypay);
$st = $rowmember['order_status'];
?>

<center>
  <h4>List order<br>
    Order Id: <?php echo $order_id; ?><br>
    D/M/Y: <?php echo date('d/m/y', strtotime($rowmember['order_date'])); ?><br>
    Transaction maker: <?php echo $rowmember['mem_name']; ?><br>
    Address: <?php echo $rowmember['mem_address']; ?><br>
    Phone: <?php echo $rowmember['mem_phone']; ?><br>

    <br/>Status :
    <?php include('mystatus.php'); ?>
  </h4>
</center>

<table border="0" align="center" class="table table-hover table-bordered table-striped">
  <tr>
    <td width="5%" align="center">No.product</td>
    <td width="10%" align="center">img</td>
    <td width="35%" align="center">Product</td>
    <td width="10%" align="center">Price/ea</td>
    <td width="10%" align="center">Quantity</td>
    <td width="15%" align="center">Total(Đong)</td>
  </tr>
  <?php
  $total = 0;
  $i = 0;
  foreach ($querypay as $rspay) {
    $total += $rspay['total']; //ราคารวม ทั้ง ตระกร้า
    echo "<tr>";
    echo "<td>" . ++$i . "</td>";
    echo "<td>" . "<img src='../p_img/" . $rspay['p_img'] . "' width='100%'>" . "</td>";
    echo "<td>" . $rspay["p_name"] . "</td>";
    echo "<td align='right'>" . number_format($rspay["p_price"], 2) . "</td>";
    echo "<td align='right'>"; 
    echo "<input type='number' name='p_c_qty' value='$rspay[p_c_qty]' size='2'class='form-control' disabled/></td>";
    echo "<td align='right'>" . number_format($rspay['total'], 2) . "</td>";
  }
  include('../convertnumtothai.php');
  ?>
  <tr>
    <td></td>
    <td  align='right' colspan="3">
      <b>Total price ( <?php echo Convert($total);?> )</b><br>
      <b>Amount received ( <?php echo Convert($rowmember['pay_amount2']);?> )</b><br>
      <?php 
      $pay_amount3 = $rowmember['pay_amount2'] - $total;
      ?>
      <b>Change ( <?php echo Convert($pay_amount3);?> )</b>
    </td>
    <td align='right'colspan='2'>
      <b><?php echo number_format($total, 2);?> Đong</b><br>
      <b><?php echo number_format($rowmember['pay_amount2'], 2);?> Đong</b><br>
      <b><?php echo number_format($pay_amount3, 2);?> Đong</b>
    </td>
  </tr>
</table>
<br>
<a href="#" target="" class="btn btn-success" onclick="window.print()">Print</a>
