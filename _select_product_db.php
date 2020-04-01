<?php
include '_connect_db.php';
$sql = "SELECT * FROM welle_ko LIMIT 1000";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
if ($result === false) {
    echo 'error :(';
}

// while ($row = mysqli_fetch_assoc($result)) {
//     // echo '<p>' . $row['C1'] . ', ' . $row['C2'] . '</p>';
//     echo '<p>' . $row['model_name'] . ', ' . $row['description'] . ', ' . $row['thumbnail_url'] . '</p>';
// }
