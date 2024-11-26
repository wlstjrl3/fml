<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    include "../dbconn/dbconn.php";
    if(mysqli_num_rows(mysqli_query($conn,"SELECT 1 FROM EDU_FAMILY.EDU_USER WHERE USER_PASS = '".@$_REQUEST['key']."' LIMIT 1"))<1){die;} //보안 검증
    //갯수 카운트 쿼리
    $rowCntSql = "SELECT COUNT(*) AS ROW_CNT FROM EDU_FAMILY.EDU_FAMILY";

    //기본 쿼리
    $sql = "SELECT * ";
    //추가 조건
    $sql = $sql."
        ,CASE
        WHEN PLC_TYPE = 0 THEN '성당'
        WHEN PLC_TYPE = 1 THEN '예식장'
        END AS PLC_TYPE_KOR
        ,CASE
        WHEN M_RELIGION = 0 THEN '가톨릭'
        WHEN M_RELIGION = 1 THEN '예비신자'
        WHEN M_RELIGION = 2 THEN '개신교'
        WHEN M_RELIGION = 3 THEN '불교'
        WHEN M_RELIGION = 4 THEN '기타'
        WHEN M_RELIGION = 5 THEN '무교'
        END AS M_RELIGION_KOR
        ,CASE
        WHEN F_RELIGION = 0 THEN '가톨릭'
        WHEN F_RELIGION = 1 THEN '예비신자'
        WHEN F_RELIGION = 2 THEN '개신교'
        WHEN F_RELIGION = 3 THEN '불교'
        WHEN F_RELIGION = 4 THEN '기타'
        WHEN F_RELIGION = 5 THEN '무교'
        END AS F_RELIGION_KOR
        ";
    $sql = $sql." FROM EDU_FAMILY.EDU_FAMILY";
    //조건문 지정
    $whereSql = " WHERE GRP_CD='MRG_EDU' ";
    if(@$_REQUEST['EDU_DT_From']){
        $whereSql=$whereSql." AND EDU_DT >= '".$_REQUEST['EDU_DT_From']." 00:00:00'";
    }
    if(@$_REQUEST['EDU_DT_To']){
        $whereSql=$whereSql." AND EDU_DT <= '".$_REQUEST['EDU_DT_To']." 23:59:59'";
    }
    if(@$_REQUEST['MRG_DT_From']){
        $whereSql=$whereSql." AND MRG_DT >= '".$_REQUEST['MRG_DT_From']." 00:00:00'";
    }
    if(@$_REQUEST['MRG_DT_To']){
        $whereSql=$whereSql." AND MRG_DT <= '".$_REQUEST['MRG_DT_To']." 23:59:59'";
    }
    if(@$_REQUEST['MRG_PLACE']){
        $whereSql=$whereSql." AND MRG_PLACE LIKE '%".$_REQUEST['MRG_PLACE']."%'";
    }    
    if(@$_REQUEST['PLC_TYPE']==2){
        //2는 전체를 선택한것으로 건너뛰기한다.
    }else{
        $whereSql=$whereSql." AND PLC_TYPE LIKE '%".@$_REQUEST['PLC_TYPE']."%'";
    }
    if(@$_REQUEST['NAME']){
        $whereSql=$whereSql." AND (M_NAME LIKE '%".$_REQUEST['NAME']."%' OR F_NAME LIKE '%".$_REQUEST['NAME']."%')";
    }
    if(@$_REQUEST['BAPT']){
        $whereSql=$whereSql." AND (M_BAPT LIKE '%".$_REQUEST['BAPT']."%' OR F_BAPT LIKE '%".$_REQUEST['BAPT']."%')";
    }
    if(@$_REQUEST['ORG_NM']){
        $whereSql=$whereSql." AND (M_ORG_NM LIKE '%".$_REQUEST['ORG_NM']."%' OR F_ORG_NM LIKE '%".$_REQUEST['ORG_NM']."%')";
    }
    if(@$_REQUEST['BIRTH']){
        $whereSql=$whereSql." AND (M_BIRTH LIKE '%".$_REQUEST['BIRTH']."%' OR F_BIRTH LIKE '%".$_REQUEST['BIRTH']."%')";
    }
    if(@$_REQUEST['CONFIRM']==2 || @$_REQUEST['CONFIRM']==null){
        //2는 전체를 선택한것으로 건너뛰기한다.
    }else{
        $whereSql=$whereSql." AND (M_CONFIRM = '".$_REQUEST['CONFIRM']."' OR F_CONFIRM = '".$_REQUEST['CONFIRM']."')";
    }
    if(@$_REQUEST['TEL_NO']){
        $whereSql=$whereSql." AND (M_TEL_NO LIKE '%".$_REQUEST['TEL_NO']."%' OR F_TEL_NO LIKE '%".$_REQUEST['TEL_NO']."%')";
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
    
    $totalCnt = mysqli_fetch_assoc(mysqli_query($conn,$rowCntSql." WHERE GRP_CD='MRG_EDU'"));
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