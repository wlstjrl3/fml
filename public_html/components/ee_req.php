<div class="container" id="req">
    <h1><br></h1>
    <h3 class="clB fontWExtr">약혼자주말 신청</h3>
    <h6><br></h6>
    <form autocomplete="off" name="reqForm" id="reqForm" action="/dbconn/ee_req_ok.php" method="post">
        <div class="reqForm">
            <input type="hidden" name="EF_NO" value="<?php echo @$_REQUEST['EF_NO'];?>">
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">혼인일<br>(예정일)</span></div>
                <div class="reqTd"><input type="date" min="2024-01-01" class="fs6 pddS" placeholder="2024-01-01" name="MRG_DT" style="background:#FFF;" value="<?php echo @$_REQUEST['MRG_DT'];?>"></div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">참가일정</span></div>
                <div class="reqTd">
                    <?php
                        $limitDt = date("Y-m-d", strtotime("+6 Day"));
                        @$eduDt = @date(@$_REQUEST['EDU_DT']);
                        if(@$eduDt>'2020-01-01'&&$limitDt>=@$eduDt){
                            echo '<span style="position:absolute;color:red;">교육일 6일 전부터 취소 수수료가 있습니다.전화 문의 바랍니다.</span>';
                            echo '<select class="eduDT" name="EDU_DT" readonly>';
                        }else{
                            echo '<select class="eduDT" name="EDU_DT" style="background:#FFF;">';
                        }
                    ?>
                        <option value="">선택</option>
                    <?php
                        $sql = "
                        SELECT EDU_DT,TEAM_CNT FROM EDU_CLASS
                            WHERE GRP_CD = 'WEEK_END' AND EDU_DT >= '".$limitDt."' 
                            ORDER BY EDU_DT ASC
                        ";
                        
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<option value='".$row['EDU_DT']."' ";
                                if($row['EDU_DT']==@$_REQUEST['EDU_DT']){
                                    echo "selected ";
                                }
                                echo ">".$row['EDU_DT']." (".$row['TEAM_CNT']."차)</option>";
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="reqTr" id="onlineDisplay">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">이메일주소</span></div>
                <div class="reqTd"><input class="fs6 pddS" name="EMAIL" value="<?php echo @$_REQUEST['EMAIL'];?>"></div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">신청<br>하시는분</span></div>
                <div class="reqTd" style="height:auto;">       
                    <div class="radioBoxs">
                        <label>
                            <input type="radio" name="PLC_TYPE" value="0" <?php if(@$_REQUEST['PLC_TYPE']==0) echo 'checked';?>/><span>예비신랑</span>
                        </label>
                        <label>
                            <input type="radio" name="PLC_TYPE" value="1" <?php if(@$_REQUEST['PLC_TYPE']==1) echo 'checked';?>/><span>예비신부</span>
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
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">생년월일</span></div>
                <div class="reqTd">
                    <input type="date" min="<?php echo date('Y-m-d',strtotime(date('Y-m-d')."-80 year"));?>" max="<?php echo date('Y-m-d',strtotime(date('Y-m-d')."-19 year"));?>" class="fs6 pddS" style="width:calc(100% - 70px);background:#FFF;" placeholder="1999-01-01" name="M_BIRTH" value="<?php echo @$_REQUEST['M_BIRTH'];?>">
                    <span id="M_BIRTH_CALC"> 만 00세</span>
                </div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">개인연락처</span></div>
                <div class="reqTd"><input class="fs6 pddS phoneInput" name="M_TEL_NO" value="<?php echo @$_REQUEST['M_TEL_NO'];?>"></div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">부모님<br>연락처</span></div>
                <div class="reqTd"><input class="fs6 pddS phoneInput" name="M_TEL_NO2" value="<?php echo @$_REQUEST['M_TEL_NO2'];?>"></div>
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
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">생년월일</span></div>
                <div class="reqTd">
                    <input type="date" min="<?php echo date('Y-m-d',strtotime(date('Y-m-d')."-80 year"));?>" max="<?php echo date('Y-m-d',strtotime(date('Y-m-d')."-19 year"));?>" class="fs6 pddS" style="width:calc(100% - 70px);background:#FFF;" placeholder="1999-01-01" name="F_BIRTH" value="<?php echo @$_REQUEST['F_BIRTH'];?>">
                    <span id="F_BIRTH_CALC"> 만 00세</span>
                </div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">개인연락처</span></div>
                <div class="reqTd"><input class="fs6 pddS phoneInput" name="F_TEL_NO" value="<?php echo @$_REQUEST['F_TEL_NO'];?>"></div>
            </div>
            <div class="reqTr">
                <div class="reqTh"><span class="cl2 fs6 fontWBold">부모님<br>연락처</span></div>
                <div class="reqTd"><input class="fs6 pddS phoneInput" name="F_TEL_NO2" value="<?php echo @$_REQUEST['F_TEL_NO2'];?>"></div>
            </div>
            <div class="clearB"></div>         
        </div>
        <div class="clearB"></div>
    </form>
    <div>
        <h5></h5>
        <div class="txtCenter">
            <h4><br></h4>
            <span class="fs4 fontWExtr lineHE">약혼자 주말 참가비 안내</span><br>
            <span class="fs6 lineHW">참가비는 커플당 28만원입니다.</span><br>
            <span class="fs6 lineHW">* 신협 03227-12-006546 천주교수원교구 ME약혼자</span><br>
            <span class="fs6 lineHW">입금시 '○월 ○○○' 로 신청하시는 분을 기재해 주세요.</span><br><br>
            <label><input type="checkbox" name="accept1"><span>환불 규정을 확인하고 동의합니다.</span></label><br>
            <span class="cl7">*6일 전 취소 100%, 5일~전일 50%, 당일 이후 0%</span><br><br>
            <label><input type="checkbox" name="accept2"><span>개인 정보 수집 및 이용에 동의합니다.</span></label><br>
            <span class="cl7">*약혼자 주말 운영과 홍보를 위해 활용하며 제3자에게 제공하지 않습니다.</span><br><br>
            <span class="fs6" style="color:#777;">
            * 저희 두사람은 행복한 가정을 준비하기 위하여 약혼자주말을 신청합니다.
            </span> <br>
            <h4><br></h4>
            <button class="clBg3 clW rndCorner pddL pointer" style="border:0;" id="reqSend"><span class="fs5"><?php if(@$_REQUEST['EF_NO']>0){echo "정보수정";}else{echo "약혼자주말 신청";}?></span></button>
            <button class="clBg3 clW rndCorner pddL pointer" style="border:0;" id="backSend"><span class="fs5">안내페이지</span></button>
        </div>
    </div>
</div>
<link href="/assets/css/req.css?ver=0.001" rel="stylesheet" />
<link href="/assets/css/radioBtn.css?ver=0.001" rel="stylesheet" />