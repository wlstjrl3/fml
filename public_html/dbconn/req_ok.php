<!DOCTYPE HTML>
<HTML>
	<HEAD>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</HEAD>
	<BODY>
<?php
    if ($_POST['MRG_DT']=="")
    {
        echo "<script> 
            alert('정상적인 접근이 아닙니다.[Err_Code:0]');
            document.location.href='/req.php'; 
        </script>"; 
        die('정상적인 접근이 아닙니다.');
    }
    include "./dbconn.php";
    $overlapChk = mysqli_query($conn, "SELECT * FROM EDU_FAMILY WHERE (M_NAME='".$_POST['M_NAME']."' AND M_TEL_NO='".$_POST['M_TEL_NO']."') OR (F_NAME='".$_POST['F_NAME']."' AND F_TEL_NO='".$_POST['F_TEL_NO']."')");
    $teamCntChk = mysqli_query($conn, "SELECT * FROM EDU_FAMILY WHERE EDU_DT ='".$_POST['EDU_DT']."'");
    $teamCntMax = "SELECT TEAM_CNT FROM EDU_CLASS WHERE EDU_DT='".$_POST['EDU_DT']."'";
    if($stmt = mysqli_prepare($conn, $teamCntMax)){
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $TEAM_CNT);
        mysqli_stmt_store_result($stmt);
        while(mysqli_stmt_fetch($stmt)){
            $myCnt = $TEAM_CNT;
        }
    }

    if ($_POST['EF_NO']<1 && mysqli_num_rows($overlapChk) > 0)
    {
        echo "<script> 
        alert('이미 등록된 정보가 있습니다.\n혼인강좌 담당자에게 문의 주세요.[Err_Code:1]');
        document.location.href='/req.php'; 
        </script>"; 
        die('이미 등록된 정보가 있습니다.<br>혼인강좌 담당자에게 문의 주세요.[Err_Code:1]');//신랑이나 신부의 중복정보가 존재
    }
    else if(mysqli_num_rows($teamCntChk)>=$myCnt){
        echo "<script> 
        alert('마감 인원이 초과 되었습니다. 혼인강좌 담당자에게 문의 주세요.[Err_Code:2]');
        document.location.href='/req.php'; 
        </script>"; 
        die('잔여 교육팀 없음');
    }
    else if($_POST['EF_NO']>1){
        $updatesql = "UPDATE EDU_FAMILY SET 
            MRG_DT = '".$_POST['MRG_DT']."'
            ,EDU_DT = '".$_POST['EDU_DT']."'
            ,PLC_TYPE = '".$_POST['PLC_TYPE']."'
            ,MRG_PLACE = '".$_POST['MRG_PLACE']."'
            ,M_RELIGION = '".$_POST['M_RELIGION']."'
            ,M_NAME = '".$_POST['M_NAME']."'
            ,M_BAPT = '".$_POST['M_BAPT']."'
            ,M_ORG_NM = '".$_POST['M_ORG_NM']."'
            ,M_CONFIRM = '".$_POST['M_CONFIRM']."'
            ,M_BIRTH = '".$_POST['M_BIRTH']."'
            ,M_TEL_NO = '".$_POST['M_TEL_NO']."'
            ,F_RELIGION = '".$_POST['F_RELIGION']."'
            ,F_NAME = '".$_POST['F_NAME']."'
            ,F_BAPT = '".$_POST['F_BAPT']."'
            ,F_ORG_NM = '".$_POST['F_ORG_NM']."'
            ,F_CONFIRM = '".$_POST['F_CONFIRM']."'
            ,F_BIRTH = '".$_POST['F_BIRTH']."'
            ,F_TEL_NO = '".$_POST['F_TEL_NO']."'
            ,REG_DT = '".date("Y-m-d h:m:s")."'
            ,EMAIL = '".$_POST['EMAIL']."'
            WHERE EF_NO = ".$_POST['EF_NO'];
        mysqli_query($conn, $updatesql);
        mysqli_close($conn);

        echo "<script> 
            alert('수정 되었습니다.');
            document.location.href='/res.php'; 
        </script>"; 
    }else{
        $insertsql = "INSERT INTO EDU_FAMILY (DT_TYPE,MRG_DT,EDU_DT,PLC_TYPE,MRG_PLACE,M_RELIGION,M_NAME,M_BAPT,M_ORG_NM,M_CONFIRM,M_BIRTH,M_TEL_NO,F_RELIGION,F_NAME,F_BAPT,F_ORG_NM,F_CONFIRM,F_BIRTH,F_TEL_NO,REG_DT,EMAIL)";
        $insertsql = $insertsql." VALUES('MRG_EDU','".$_POST['MRG_DT']."','".$_POST['EDU_DT']."','".$_POST['PLC_TYPE']."','".$_POST['MRG_PLACE']."','".$_POST['M_RELIGION']."','".$_POST['M_NAME']."','".$_POST['M_BAPT']."','".$_POST['M_ORG_NM']."','".$_POST['M_CONFIRM']."','".$_POST['M_BIRTH']."','".$_POST['M_TEL_NO']."','".$_POST['F_RELIGION']."','".$_POST['F_NAME']."','".$_POST['F_BAPT']."','".$_POST['F_ORG_NM']."','".$_POST['F_CONFIRM']."','".$_POST['F_BIRTH']."','".$_POST['F_TEL_NO']."','".date("Y-m-d h:m:s")."','".$_POST['EMAIL']."')";
        mysqli_query($conn, $insertsql);
        mysqli_close($conn);

        echo "<script> 
            alert('등록 되었습니다.');
            document.location.href='/res.php'; 
        </script>"; 
    }
?>
    </BODY>
</HTML>