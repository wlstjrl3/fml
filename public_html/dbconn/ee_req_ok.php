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
    $overlapChk = mysqli_query($conn, "SELECT * FROM EDU_FAMILY WHERE GRP_CD='WEEK_END' AND (M_NAME='".$_POST['M_NAME']."' AND M_TEL_NO='".$_POST['M_TEL_NO']."') AND (F_NAME='".$_POST['F_NAME']."' AND F_TEL_NO='".$_POST['F_TEL_NO']."')");

    if ($_POST['EF_NO']<1 && mysqli_num_rows($overlapChk) > 0)
    {
        echo "<script> 
        alert('이미 등록된 정보가 있습니다.\n혼인강좌 담당자에게 문의 주세요.[Err_Code:1]');
        document.location.href='/req.php'; 
        </script>"; 
        die('이미 등록된 정보가 있습니다.<br>혼인강좌 담당자에게 문의 주세요.[Err_Code:1]');//신랑이나 신부의 중복정보가 존재
    }
    else if($_POST['EF_NO']>1){
        $updatesql = "UPDATE EDU_FAMILY SET 
            MRG_DT = '".$_POST['MRG_DT']."'
            ,EDU_DT = '".$_POST['EDU_DT']."'
            ,PLC_TYPE = '".$_POST['PLC_TYPE']."'
            ,M_RELIGION = '".$_POST['M_RELIGION']."'
            ,M_NAME = '".$_POST['M_NAME']."'
            ,M_BAPT = '".$_POST['M_BAPT']."'
            ,M_ORG_NM = '".$_POST['M_ORG_NM']."'
            ,M_BIRTH = '".$_POST['M_BIRTH']."'
            ,M_TEL_NO = '".$_POST['M_TEL_NO']."'
            ,M_TEL_NO2 = '".$_POST['M_TEL_NO2']."'
            ,F_RELIGION = '".$_POST['F_RELIGION']."'
            ,F_NAME = '".$_POST['F_NAME']."'
            ,F_BAPT = '".$_POST['F_BAPT']."'
            ,F_ORG_NM = '".$_POST['F_ORG_NM']."'
            ,F_BIRTH = '".$_POST['F_BIRTH']."'
            ,F_TEL_NO = '".$_POST['F_TEL_NO']."'
            ,F_TEL_NO2 = '".$_POST['F_TEL_NO2']."'
            ,REG_DT = '".date("Y-m-d h:m:s")."'
            ,EMAIL = '".$_POST['EMAIL']."'
            WHERE EF_NO = ".$_POST['EF_NO'];
        mysqli_query($conn, $updatesql);
        mysqli_close($conn);

        echo "<script> 
            alert('수정 되었습니다.');
            document.location.href='/ee_res.php'; 
        </script>"; 
    }else{
        $insertsql = "INSERT INTO EDU_FAMILY (GRP_CD,MRG_DT,EDU_DT,PLC_TYPE,M_RELIGION,M_NAME,M_BAPT,M_ORG_NM,M_BIRTH,M_TEL_NO,M_TEL_NO2,F_RELIGION,F_NAME,F_BAPT,F_ORG_NM,F_BIRTH,F_TEL_NO,F_TEL_NO2,REG_DT,EMAIL)";
        $insertsql = $insertsql." VALUES('WEEK_END','".$_POST['MRG_DT']."','".$_POST['EDU_DT']."','".$_POST['PLC_TYPE']."','".$_POST['M_RELIGION']."','".$_POST['M_NAME']."','".$_POST['M_BAPT']."','".$_POST['M_ORG_NM']."','".$_POST['M_BIRTH']."','".$_POST['M_TEL_NO']."','".$_POST['M_TEL_NO2']."','".$_POST['F_RELIGION']."','".$_POST['F_NAME']."','".$_POST['F_BAPT']."','".$_POST['F_ORG_NM']."','".$_POST['F_BIRTH']."','".$_POST['F_TEL_NO']."','".$_POST['F_TEL_NO2']."','".date("Y-m-d h:m:s")."','".$_POST['EMAIL']."')";
        mysqli_query($conn, $insertsql);
        mysqli_close($conn);

        echo "<script> 
            alert('등록 되었습니다.');
            document.location.href='/ee_res.php'; 
        </script>"; 
    }
?>
    </BODY>
</HTML>