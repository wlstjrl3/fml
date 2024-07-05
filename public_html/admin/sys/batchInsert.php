<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    include "../dbconn/dbconn.php";
    if(mysqli_num_rows(mysqli_query($conn,"SELECT 1 FROM EDU_FAMILY.EDU_USER WHERE USER_PASS = '".@$_REQUEST['key']."' LIMIT 1"))<1){echo "인증에러"; die;} //보안 검증

    $req = file_get_contents("php://input");
    $param = json_decode(json_encode(json_decode($req)),true); //json 디코드로 껍질을 풀어도 속에 Object형이 남아있어서 다시 인코드 후 디코드를 하여 array형태로 변환

    $sql = "INSERT INTO EDU_FAMILY.EDU_CLASS(EDU_DT,END_DT,EDU_PAY,TEAM_CNT,ONLINE) VALUES ";
    foreach($param as $key => $row){
        //교육일	마감일	교육비	참가팀수	온라인수강
        $sql=$sql."('".$row['교육일']."','".$row['마감일']."','".$row['교육비']."','".$row['참가팀수']."','".$row['온라인수강']."'),";
    }
    $sql = substr($sql, 0, -1); //마지막 자리 , 삭제
    
    //echo $sql;
    //echo json_encode($row, JSON_UNESCAPED_UNICODE);
    mysqli_query($conn,$sql);
    mysqli_close($conn);
?>