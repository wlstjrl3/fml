<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    include "../dbconn/dbconn.php";
    if(mysqli_num_rows(mysqli_query($conn,"SELECT 1 FROM EDU_FAMILY.EDU_USER WHERE USER_PASS = '".@$_REQUEST['key']."' LIMIT 1"))<1){die;} //보안 검증
    //갯수 카운트 쿼리
    $rowCntSql = "SELECT COUNT(*) AS ROW_CNT FROM EDU_FAMILY.EDU_CLASS";
    //기본 쿼리
    $sql = "SELECT CLASS_NO,EDU_DT,END_DT,EDU_PAY,TEAM_CNT,EDU_NAME FROM EDU_FAMILY.EDU_CLASS";
    //조건문 지정
    $whereSql = " WHERE GRP_CD = 'WEEK_END' "; //약혼자 주말 분리하여 로드
    if(@$_REQUEST['EDU_DT_From']){
        $whereSql=$whereSql." AND EDU_DT >= '".$_REQUEST['EDU_DT_From']." 00:00:00'";
    }
    if(@$_REQUEST['EDU_DT_To']){
        $whereSql=$whereSql." AND EDU_DT <= '".$_REQUEST['EDU_DT_To']." 23:59:59'";
    }

    if(@$_REQUEST['END_DT_From']){
        $whereSql=$whereSql." AND END_DT >= '".$_REQUEST['END_DT_From']." 00:00:00'";
    }
    if(@$_REQUEST['END_DT_To']){
        $whereSql=$whereSql." AND END_DT <= '".$_REQUEST['END_DT_To']." 23:59:59'";
    }

    if(@$_REQUEST['EDU_PAY']){
        $whereSql=$whereSql." AND EDU_PAY LIKE '%".$_REQUEST['EDU_PAY']."%'";
    }

    if(@$_REQUEST['TEAM_CNT']){
        $whereSql=$whereSql." AND TEAM_CNT LIKE '%".$_REQUEST['TEAM_CNT']."%'";
    }
    
    if(@$_REQUEST['ONLINE']==2){
        //2는 전체를 선택한것으로 건너뛰기한다.
    }else{
        $whereSql=$whereSql." AND ONLINE LIKE '%".@$_REQUEST['ONLINE']."%'";
    }

    //정렬 기준 지정
    $orderSql = "";
    if(@$_REQUEST['ORDER']){
        $orderSql = $orderSql." ORDER BY ".$_REQUEST['ORDER'];
    }
    //리미트 지정
    $limitSql = "";
    if(@$_REQUEST['LIMIT']){
        $limitSql = $limitSql." LIMIT ".$_REQUEST['LIMIT'];
    }
    
    //echo $rowCntSql.$whereSql;
    //die;

    $totalCnt = mysqli_fetch_assoc(mysqli_query($conn,$rowCntSql));
    $filterCnt = mysqli_fetch_assoc(mysqli_query($conn,$rowCntSql.$whereSql));

    $result = mysqli_query($conn,$sql.$whereSql.$orderSql.$limitSql);
    mysqli_close($conn);

    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    $datas = array(
       "data" => @$data
       ,"date" => "2021-99-99"
       ,"totalCnt" => $totalCnt["ROW_CNT"]
       ,"filterCnt" => $filterCnt["ROW_CNT"]
    ); 

    echo json_encode($datas, JSON_UNESCAPED_UNICODE);

?>