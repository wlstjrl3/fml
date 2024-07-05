<?php
    include "./dbconn.php";
    $sql = "SELECT * FROM EDU_FAMILY
        WHERE (M_NAME='".@$_REQUEST['name']."' AND M_TEL_NO = '".@$_REQUEST['telNo']."') OR (F_NAME='".@$_REQUEST['name']."' AND F_TEL_NO = '".@$_REQUEST['telNo']."') LIMIT 1";
    $result = mysqli_query($conn,$sql);

    echo json_encode(mysqli_fetch_assoc($result), JSON_UNESCAPED_UNICODE);
?>