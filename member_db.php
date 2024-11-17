<?php 
include('condb.php');

if (isset($_POST['member']) && $_POST['member']=="add") {
    // Escape and retrieve form data
    $ref_l_id = mysqli_real_escape_string($condb, $_POST["ref_l_id"]);
    $mem_name = mysqli_real_escape_string($condb,$_POST["mem_name"]);
    $mem_username = mysqli_real_escape_string($condb,$_POST["mem_username"]);
    $mem_password = mysqli_real_escape_string($condb,(sha1($_POST["mem_password"])));
    $mem_address = mysqli_real_escape_string($condb,$_POST["mem_address"]); // Add mem_address mem_phone
    $mem_phone = mysqli_real_escape_string($condb,$_POST["mem_phone"]);

    // Handle image upload
    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $mem_img = (isset($_POST['mem_img']) ? $_POST['mem_img'] : '');
    $upload=$_FILES['mem_img']['name'];
    if($upload !='') { 
        $path="../mem_img/";
        $type = strrchr($_FILES['mem_img']['name'],".");
        $newname =$numrand.$date1.$type;
        $path_copy=$path.$newname;
        move_uploaded_file($_FILES['mem_img']['tmp_name'],$path_copy);  
    } else {
        $newname='';
    }

    // Check if username already exists
    $check = "SELECT mem_username FROM tbl_member WHERE mem_username = '$mem_username'";
    $result1 = mysqli_query($condb, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0) {
        echo "<script>";
        echo "window.location = 'list_mem.php?mem_error=mem_error'; ";
        echo "</script>";
    } else {
        // Insert data into database
        $sql = "INSERT INTO tbl_member (ref_l_id, mem_name, mem_username, mem_password, mem_address,mem_phone, mem_img)
                VALUES ('$ref_l_id', '$mem_name', '$mem_username', '$mem_password', '$mem_address','$mem_phone','$newname')";
        $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
    }
   
    // Redirect based on result
    if($result) {
        echo "<script type='text/javascript'>";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "window.location = 'user_list.php'; ";
        echo "</script>";
    }
} elseif (isset($_POST['member']) && $_POST['member']=="edit") {
    // Handle edit logic here
} elseif (isset($_GET['member']) && $_GET['member']=="del") {
    // Handle delete logic here
}
?>
