<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    include "../dbconn/dbconn.php";
    if(mysqli_num_rows(mysqli_query($conn,"SELECT 1 FROM EDU_FAMILY.EDU_USER WHERE USER_PASS = '".@$_REQUEST['key']."' LIMIT 1"))<1){die;} //보안 검증
    
    if($_REQUEST['CRUD']=='C'){
        if($_REQUEST['EF_NO']=="0"||$_REQUEST['EF_NO']==""){ //신규 작성
            $sql = "INSERT INTO EDU_FAMILY.EDU_FAMILY(EDU_DT,MRG_DT,MRG_PLACE,EMAIL,M_NAME,M_BAPT,M_ORG_NM,M_BIRTH,M_TEL_NO,F_NAME,F_BAPT,F_ORG_NM,F_BIRTH,F_TEL_NO,PLC_TYPE,M_RELIGION,M_CONFIRM,F_RELIGION,F_CONFIRM,REG_DT) VALUES ('";
            $sql = $sql.$_REQUEST['EDU_DT']."','".$_REQUEST['MRG_DT']."','".$_REQUEST['MRG_PLACE']."','".$_REQUEST['EMAIL']."','".$_REQUEST['M_NAME']."','".$_REQUEST['M_BAPT']."','".$_REQUEST['M_ORG_NM']."','".$_REQUEST['M_BIRTH']."','".$_REQUEST['M_TEL_NO']."','".$_REQUEST['F_NAME']."','".$_REQUEST['F_BAPT']."','".$_REQUEST['F_ORG_NM']."','".$_REQUEST['F_BIRTH']."','".$_REQUEST['F_TEL_NO']."','".$_REQUEST['PLC_TYPE']."','".$_REQUEST['M_RELIGION']."','".$_REQUEST['M_CONFIRM']."','".$_REQUEST['F_RELIGION']."','".$_REQUEST['F_CONFIRM']."','".date("Y-m-d h:m:s");
            $sql = $sql."')";
            echo $sql; //오류 점검용 쿼리

        }else{ //기존 데이터 UPDATE
            $sql = "UPDATE EDU_FAMILY.EDU_FAMILY SET 
                EDU_DT='".$_REQUEST['EDU_DT']."'
                ,MRG_DT='".$_REQUEST['MRG_DT']."'
                ,MRG_PLACE='".$_REQUEST['MRG_PLACE']."'
                ,EMAIL='".$_REQUEST['EMAIL']."'
                ,M_NAME='".$_REQUEST['M_NAME']."'
                ,M_BAPT='".$_REQUEST['M_BAPT']."'
                ,M_ORG_NM='".$_REQUEST['M_ORG_NM']."'
                ,M_BIRTH='".$_REQUEST['M_BIRTH']."'
                ,M_TEL_NO='".$_REQUEST['M_TEL_NO']."'
                ,F_NAME='".$_REQUEST['F_NAME']."'
                ,F_BAPT='".$_REQUEST['F_BAPT']."'
                ,F_ORG_NM='".$_REQUEST['F_ORG_NM']."'
                ,F_BIRTH='".$_REQUEST['F_BIRTH']."'
                ,F_TEL_NO='".$_REQUEST['F_TEL_NO']."'
                ,PLC_TYPE='".$_REQUEST['PLC_TYPE']."'
                ,M_RELIGION='".$_REQUEST['M_RELIGION']."'
                ,M_CONFIRM='".$_REQUEST['M_CONFIRM']."'
                ,F_RELIGION='".$_REQUEST['F_RELIGION']."'
                ,F_CONFIRM='".$_REQUEST['F_CONFIRM']."'
                WHERE EF_NO = '".$_REQUEST['EF_NO']."'";
            echo $sql; //오류 점검용 쿼리
        }
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }else if($_REQUEST['CRUD']=='R'){
        //기본 쿼리
        $sql = "SELECT * FROM EDU_FAMILY.EDU_FAMILY";
        //조건문 지정
        $whereSql = " WHERE 1=1 ";
        if(@$_REQUEST['EF_NO']){
            $whereSql=$whereSql." AND EF_NO = '".$_REQUEST['EF_NO']."'";
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
        $sql = "DELETE FROM EDU_FAMILY.EDU_FAMILY WHERE EF_NO = '".$_REQUEST['EF_NO']."'";
        echo $sql; //오류 점검용 쿼리
        $result = mysqli_query($conn,$sql);
        mysqli_close($conn);
    }else{
        echo 'rsvConfig 잘못된 접근방식입니다.';
    }

?>