<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    include "../dbconn/dbconn.php";
    if(mysqli_num_rows(mysqli_query($conn,"SELECT 1 FROM EDU_FAMILY.EDU_USER WHERE USER_PASS = '".@$_REQUEST['key']."' LIMIT 1"))<1){die;} //보안 검증
    
    if($_REQUEST['CRUD']=='C'){
        if($_REQUEST['preDate']=="0"){ //신규 작성
            $sql = "INSERT INTO EDU_FAMILY.EDU_CLASS(EDU_DT,END_DT,EDU_PAY,TEAM_CNT,ONLINE) VALUES ('";
            $sql = $sql.$_REQUEST['EDU_DT']."','".$_REQUEST['END_DT']."','".$_REQUEST['EDU_PAY']."','".$_REQUEST['TEAM_CNT']."','".$_REQUEST['ONLINE'];
            $sql = $sql."')";
            echo $sql; //오류 점검용 쿼리
        }else{ //기존 데이터 UPDATE
            $sql = "UPDATE EDU_FAMILY.EDU_CLASS SET 
                EDU_DT='".$_REQUEST['EDU_DT']."'
                ,END_DT='".$_REQUEST['END_DT']."'
                ,EDU_PAY='".$_REQUEST['EDU_PAY']."'
                ,TEAM_CNT='".$_REQUEST['TEAM_CNT']."'
                ,ONLINE='".$_REQUEST['ONLINE']."'
                WHERE EDU_DT = '".$_REQUEST['preDate']."'";
            echo $sql; //오류 점검용 쿼리
        }
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }else if($_REQUEST['CRUD']=='R'){
        //기본 쿼리
        $sql = "SELECT * FROM EDU_FAMILY.EDU_CLASS";
        //조건문 지정
        $whereSql = " WHERE 1=1 ";
        if(@$_REQUEST['EDU_DT']){
            $whereSql=$whereSql." AND EDU_DT = '".$_REQUEST['EDU_DT']."'";
        }
        //리미트 지정
        $limitSql = " LIMIT 1";
        $result = mysqli_query($conn,$sql.$whereSql.$limitSql);
        mysqli_close($conn);

        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        $datas = array(
        "data" => @$data,
        "date" => "2021-99-99"
        );
        echo json_encode($datas, JSON_UNESCAPED_UNICODE);
    }else if($_REQUEST['CRUD']=='D'){
        //기본 쿼리
        $sql = "DELETE FROM EDU_FAMILY.EDU_CLASS WHERE EDU_DT = '".$_REQUEST['EDU_DT']."'";
        echo $sql; //오류 점검용 쿼리
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }else{
        echo 'eduConfig 잘못된 접근방식입니다.';
    }

?>