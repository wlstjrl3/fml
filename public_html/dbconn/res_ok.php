<?php
    include "./dbconn.php";
    $sql = "SELECT * FROM EDU_FAMILY
        WHERE GRP_CD='MRG_EDU' AND ((M_NAME='".@$_REQUEST['name']."' AND M_TEL_NO = '".@$_REQUEST['telNo']."') OR (F_NAME='".@$_REQUEST['name']."' AND F_TEL_NO = '".@$_REQUEST['telNo']."')) ORDER BY REG_DT DESC LIMIT 1";
    
    echo $sql;
    die;
    $result = mysqli_query($conn,$sql);

    echo json_encode(mysqli_fetch_assoc($result), JSON_UNESCAPED_UNICODE);
?>