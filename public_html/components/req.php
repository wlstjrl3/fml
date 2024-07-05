<div class="container" id="req">
    <h1><br></h1>
    <h3 class="clB fontWExtr">혼인강좌 신청</h3>
    <h6><br></h6>
    <form autocomplete="off" name="reqForm" id="reqForm" action="/dbconn/req_ok.php" method="post">
        <div class="reqForm">
            <input type="hidden" name="EF_NO" value="<?php echo @$_REQUEST['EF_NO'];?>">
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">혼인일<br>(예정일)</span></div>
                <div class="reqTd"><input type="date" min="2024-01-01" class="fs6 pddS" placeholder="2024-01-01" name="MRG_DT" style="background:#FFF;" value="<?php echo @$_REQUEST['MRG_DT'];?>"></div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">교육일</span></div>
                <div class="reqTd">
                    <select class="eduDT" name="EDU_DT" style="background:#FFF;">
                        <option value="">선택</option>
                    <?php
                        $sql = "
                        SELECT A.EDU_DT,TEAM_CNT, IFNULL(B.EDU_CNT,0) AS EDU_CNT, A.ONLINE FROM EDU_CLASS A 
                            LEFT OUTER JOIN (SELECT EDU_DT, COUNT(*) AS EDU_CNT FROM `EDU_FAMILY` GROUP BY EDU_DT) B ON A.EDU_DT = B.EDU_DT 
                            WHERE A.GRP_CD = 'MRG_EDU' AND A.END_DT >= '".date('Y-m-d')."' 
                            ORDER BY A.EDU_DT ASC
                        ";
                        
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['TEAM_CNT']-$row['EDU_CNT'] > 0){
                                    echo "<option value='".$row['EDU_DT']."' ";
                                    if($row['EDU_DT']==@$_REQUEST['EDU_DT']){
                                        echo "selected ";
                                    }
                                    if($row['ONLINE'] == 1){
                                        echo "data-online='y'>".$row['EDU_DT']."[비대면]";
                                    }else{
                                        echo "data-online='n'>".$row['EDU_DT'];
                                    }
                                    echo " (잔여 : ".($row['TEAM_CNT']-$row['EDU_CNT']).")</option>";
                                }
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="reqTr" id="onlineDisplay">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">이메일주소</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="EMAIL" placeholder="비대면 교육인 경우에만 작성" value="<?php if(@$_REQUEST['EMAIL']){echo @$_REQUEST['EMAIL'];}else{echo '';}?>"></div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">혼인장소</span></div>
                <div class="reqTd" style="height:auto;">
                        <input class="fs6 pddS" style="width:100%;border:1px solid #DDD;" name="MRG_PLACE" value="<?php echo @$_REQUEST['MRG_PLACE'];?>">             
                    <div class="radioBoxs">
                        <label>
                            <input type="radio" name="PLC_TYPE" value="0" <?php if(@$_REQUEST['PLC_TYPE']==0) echo 'checked';?>/><span>성당</span>
                        </label>
                        <label>
                            <input type="radio" name="PLC_TYPE" value="1" <?php if(@$_REQUEST['PLC_TYPE']==1) echo 'checked';?>/><span>예식장</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="clearB"></div>
        </div>
        <h3><br></h3>
        <hr style="border-top:1px solid #CCC;">
        <h3><br></h3>
        <h3 class="clB fontWExtr">예비신랑 항목</h3>
        <h6></h6>
        <div class="reqForm">
            <div class="reqTr" style="width:100%;">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">종교</span></div>
                <div class="reqTd" style="height:auto;">
                    <div class="radioBoxs">
                        <label>
                            <input type="radio" name="M_RELIGION" value="0" <?php if(@$_REQUEST['M_RELIGION']==0) echo 'checked';?>/><span>가톨릭</span>
                        </label>
                        <label>
                            <input type="radio" name="M_RELIGION" value="1" <?php if(@$_REQUEST['M_RELIGION']==1) echo 'checked';?>/><span>예비신자</span>
                        </label>
                        <label>
                            <input type="radio" name="M_RELIGION" value="2" <?php if(@$_REQUEST['M_RELIGION']==2) echo 'checked';?>/><span>개신교</span>
                        </label>
                        <label>
                            <input type="radio" name="M_RELIGION" value="3" <?php if(@$_REQUEST['M_RELIGION']==3) echo 'checked';?>/><span>불교</span>
                        </label>
                        <label>
                            <input type="radio" name="M_RELIGION" value="4" <?php if(@$_REQUEST['M_RELIGION']==4) echo 'checked';?>/><span>기타</span>
                        </label>
                        <label>
                            <input type="radio" name="M_RELIGION" value="5" <?php if(@$_REQUEST['M_RELIGION']==5) echo 'checked';?>/><span>무교</span>
                        </label>
                    </div>
                </div>
            </div><div class="clearB"></div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">성명</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="M_NAME" value="<?php echo @$_REQUEST['M_NAME'];?>"></div>
            </div>
            <div class="reqTr mRLink">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">세례명</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="M_BAPT" value="<?php echo @$_REQUEST['M_BAPT'];?>"></div>
            </div>
            <div class="reqTr mRLink">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">교적본당</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="M_ORG_NM" value="<?php echo @$_REQUEST['M_ORG_NM'];?>"></div>
            </div>
            <div class="reqTr mRLink">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">견진성사</span></div>
                <div class="reqTd" style="height:auto;">
                    <div class="radioBoxs">
                        <label>
                            <input type="radio" name="M_CONFIRM" value="0" <?php if(@$_REQUEST['M_CONFIRM']==0) echo 'checked';?>/><span>받음</span>
                        </label>
                        <label>
                            <input type="radio" name="M_CONFIRM" value="1" <?php if(@$_REQUEST['M_CONFIRM']==1) echo 'checked';?>/><span>받지않음</span>
                        </label>
                    </div>
                </div>
            </div><div class="clearB"></div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">생년월일</span></div>
                <div class="reqTd">
                    <input type="date" min="<?php echo date('Y-m-d',strtotime(date('Y-m-d')."-80 year"));?>" max="<?php echo date('Y-m-d',strtotime(date('Y-m-d')."-19 year"));?>" class="fs6 pddS" style="width:calc(100% - 70px);background:#FFF;" placeholder="1999-01-01" name="M_BIRTH" value="<?php echo @$_REQUEST['M_BIRTH'];?>">
                    <span id="M_BIRTH_CALC"> 만 00세</span>
                </div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">연락처</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="M_TEL_NO" maxlength="13" value="<?php echo @$_REQUEST['M_TEL_NO'];?>"></div>
            </div>
            <div class="clearB"></div>        
        </div>
        <div class="clearB"></div>
        <h3><br></h3>
        <hr style="border-top:1px solid #CCC;">
        <h3><br></h3>
        <h3 class="clB fontWExtr">예비신부 항목</h3>
        <h6></h6>
        <div class="reqForm">
            <div class="reqTr" style="width:100%;">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">종교</span></div>
                <div class="reqTd" style="height:auto;">
                    <div class="radioBoxs">
                    <label>
                            <input type="radio" name="F_RELIGION" value="0" <?php if(@$_REQUEST['F_RELIGION']==0) echo 'checked';?>/><span>가톨릭</span>
                        </label>
                        <label>
                            <input type="radio" name="F_RELIGION" value="1" <?php if(@$_REQUEST['F_RELIGION']==1) echo 'checked';?>/><span>예비신자</span>
                        </label>
                        <label>
                            <input type="radio" name="F_RELIGION" value="2" <?php if(@$_REQUEST['F_RELIGION']==2) echo 'checked';?>/><span>개신교</span>
                        </label>
                        <label>
                            <input type="radio" name="F_RELIGION" value="3" <?php if(@$_REQUEST['F_RELIGION']==3) echo 'checked';?>/><span>불교</span>
                        </label>
                        <label>
                            <input type="radio" name="F_RELIGION" value="4" <?php if(@$_REQUEST['F_RELIGION']==4) echo 'checked';?>/><span>기타</span>
                        </label>
                        <label>
                            <input type="radio" name="F_RELIGION" value="5" <?php if(@$_REQUEST['F_RELIGION']==5) echo 'checked';?>/><span>무교</span>
                        </label>
                    </div>
                </div>
                </div><div class="clearB"></div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">성명</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="F_NAME" value="<?php echo @$_REQUEST['F_NAME'];?>"></div>
            </div>
            <div class="reqTr fRLink">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">세례명</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="F_BAPT" value="<?php echo @$_REQUEST['F_BAPT'];?>"></div>
            </div>
            <div class="reqTr fRLink">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">교적본당</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="F_ORG_NM" value="<?php echo @$_REQUEST['F_ORG_NM'];?>"></div>
            </div>
            <div class="reqTr fRLink">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">견진성사</span></div>
                <div class="reqTd" style="height:auto;">
                    <div class="radioBoxs">
                        <label>
                            <input type="radio" name="F_CONFIRM" value="0" <?php if(@$_REQUEST['F_CONFIRM']==0) echo 'checked';?>/><span>받음</span>
                        </label>
                        <label>
                            <input type="radio" name="F_CONFIRM" value="1" <?php if(@$_REQUEST['F_CONFIRM']==1) echo 'checked';?>/><span>받지않음</span>
                        </label>
                    </div>
                </div>
            </div><div class="clearB"></div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">생년월일</span></div>
                <div class="reqTd">
                    <input type="date" min="<?php echo date('Y-m-d',strtotime(date('Y-m-d')."-80 year"));?>" max="<?php echo date('Y-m-d',strtotime(date('Y-m-d')."-19 year"));?>" class="fs6 pddS" style="width:calc(100% - 70px);background:#FFF;" placeholder="1999-01-01" name="F_BIRTH" value="<?php echo @$_REQUEST['F_BIRTH'];?>">
                    <span id="F_BIRTH_CALC"> 만 00세</span>
                </div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">연락처</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="F_TEL_NO" maxlength="13" value="<?php echo @$_REQUEST['F_TEL_NO'];?>"></div>
            </div>
            <div class="clearB"></div>         
        </div>
        <div class="clearB"></div>
    </form>
    <div>
        <h5></h5>
        <div class="txtCenter">
            <h4><br></h4>
            <span class="fs6" style="color:#777;">
            * 저희 두사람은 행복한 가정을 준비하기 위하여 혼인강좌를 신청합니다.
            </span> 
            <h4><br></h4>
            <button class="clBg3 clW rndCorner pddL pointer" style="border:0;" id="reqSend"><span class="fs5"><?php if(@$_REQUEST['EF_NO']>0){echo "정보수정";}else{echo "강좌신청";}?></span></button>
            <button class="clBg3 clW rndCorner pddL pointer" style="border:0;" id="backSend"><span class="fs5">안내페이지</span></button>
        </div>
    </div>
</div>
<link href="/assets/css/req.css?ver=0.001" rel="stylesheet" />
<link href="/assets/css/radioBtn.css?ver=0.001" rel="stylesheet" />