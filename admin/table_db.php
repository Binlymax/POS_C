<?php
include('../condb.php');

if (isset($_POST['action']) && $_POST['action'] == "add") {
    $table_name = mysqli_real_escape_string($condb, $_POST["tb_name"]);
    $capacity = mysqli_real_escape_string($condb, $_POST["tb_capacity"]);
    $detail = mysqli_real_escape_string($condb, $_POST["tb_detail"]);
    $status = mysqli_real_escape_string($condb, $_POST["tb_status"]);

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($condb, "INSERT INTO tbl_table (tb_name, tb_capacity, tb_detail, tb_status) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "siss", $table_name, $capacity, $detail, $status);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_table.php?table_add=table_add'; ";
    echo "</script>";
    } else {
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_table.php?table_add_error=table_add_error'; ";
    echo "</script>";
    }



} elseif (isset($_POST['table']) && $_POST['table'] == "edit") {
    // Code for editing an existing table
    $table_id = mysqli_real_escape_string($condb, $_POST["table_id"]);
    $table_name = mysqli_real_escape_string($condb, $_POST["tb_name"]);
    $capacity = mysqli_real_escape_string($condb, $_POST["tb_capacity"]);
    $detail = mysqli_real_escape_string($condb, $_POST["tb_detail"]);
    $status = mysqli_real_escape_string($condb, $_POST["tb_status"]);
    // $ref_l_id = mysqli_real_escape_string($condb,$_POST["ref_l_id"]);


    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($condb, "UPDATE tbl_table SET tb_name = ?, tb_capacity = ?, tb_detail = ?, tb_status = ? WHERE table_id = ?");
    mysqli_stmt_bind_param($stmt, "sissi", $table_name, $capacity, $detail, $status, $table_id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "<script type='text/javascript'>";
        echo "window.location = 'list_table.php?table_edit=table_edit'; ";
        echo "</script>";
        } else {
        echo "<script type='text/javascript'>";
        echo "window.location = 'list_table.php?table_edit_error=table_edit_error'; ";
        echo "</script>";
        }
} 


elseif (isset($_GET['table']) && $_GET['table'] == "del") {

    $table_id = mysqli_real_escape_string($condb, $_GET["table_id"]);
    $sql = "DELETE FROM tbl_table WHERE table_id = $table_id";
    $result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_table.php?table_del=table_del'; ";
    echo "</script>";
} else {
    echo "<script type= 'text/javascript'>"; 
    echo "window.location = 'list_table.php?table_no=table_no';";
    echo "</script>";
}



?>