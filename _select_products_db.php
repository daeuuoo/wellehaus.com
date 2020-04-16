<?php
include '_connect_db.php';
$sql = "SELECT * FROM welle_product_".$lang_array['this_lang']." LIMIT 1000";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
if ($result === false) {
    echo 'error :(';
}