<?php include('./components/header.php'); ?>
<div class="modalForm">
    <div class="modalBg"></div>
    <div class="modalWindow">
        <div class="modalHeader">
            <b>신청정보 관리 </b>
            <button></button>
        </div>
        <div class="modalBody">
            <div class="modalGrpFrame">
                <div class="modalGrp">
                    <div class="modalHd">일련번호</div>
                    <div class="modalBd"><input style="background:#EEE;" autocomplete='off' readonly></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">교육일</div>
                    <div class="modalBd"><input type="date" autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">혼인예정일</div>
                    <div class="modalBd"><input type="date" autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">혼인장소명칭</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">혼인장소타입</div>
                    <div class="modalBd"><select>
                        <option value="0">성당</option>
                        <option value="1">예식장</option>
                    </select></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">이메일주소</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div class="clearB"></div>
            </div>
            <div class="modalGrpFrame">
                <div class="modalGrp">
                    <div class="modalHd">신랑 종교</div>
                    <div class="modalBd"><select>
                        <option value="0">가톨릭</option>
                        <option value="1">예비신자</option>
                        <option value="2">개신교</option>
                        <option value="3">불교</option>
                        <option value="4">기타</option>
                        <option value="5">무교</option>
                    </select></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신랑성명</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신랑세례명</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신랑본당</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신랑견진</div>
                    <div class="modalBd"><select>
                        <option value="0">받음</option>
                        <option value="1">받지않음</option>
                    </select></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신랑생년월일</div>
                    <div class="modalBd"><input type="date" autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신랑연락처</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div style="clear:both;"></div>                
            </div>
            <div class="modalGrpFrame">
                <div class="modalGrp">
                    <div class="modalHd">신부 종교</div>
                    <div class="modalBd"><select>
                        <option value="0">가톨릭</option>
                        <option value="1">예비신자</option>
                        <option value="2">개신교</option>
                        <option value="3">불교</option>
                        <option value="4">기타</option>
                        <option value="5">무교</option>
                    </select></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신부성명</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신부세례명</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신부본당</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신부견진</div>
                    <div class="modalBd"><select>
                        <option value="0">받음</option>
                        <option value="1">받지않음</option>
                    </select></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신부생년월일</div>
                    <div class="modalBd"><input type="date" autocomplete='off'></div>
                </div>
                <div class="modalGrp">
                    <div class="modalHd">신부연락처</div>
                    <div class="modalBd"><input autocomplete='off'></div>
                </div>             
                <div style="clear:both;"></div>
            </div>
        </div>    
        <div class="modalFooter">
            <button id="modalEdtBtn" style="padding:5px 9px;">저장</button>
            <button id="modalDelBtn" style="padding:5px 9px;">삭제</button>
        </div>
    </div>
</div>
<br><!--이 위로는 모달 팝업영역, 아래로는 페이지 코드-->
<div class="container">

    <h4 class="cl3 pddS">
        신청자 관리
    </h4>

    <div class="searchArea">    
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>교육일</b></span></div>
            <div class="colBd"><input class="dualDateBox filter" id="EDU_DT_From"><span>~</span><input class="dualDateBox filter" id="EDU_DT_To"></div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>혼인예정일</b></span></div>
            <div class="colBd"><input class="dualDateBox filter" id="MRG_DT_From"><span>~</span><input class="dualDateBox filter" id="MRG_DT_To"></div>
        </div>
        <div class="colGrp">
            <div class="colHd2L clBg5 cl2"><span><b>혼인장소<br>명칭</b></span></div>
            <div class="colBd"><input id="MRG_PLACE" class="filter"></div>
        </div>
        <div class="colGrp">
            <div class="colHd2L clBg5 cl2"><span><b>혼인장소<br>타입</b></span></div>
            <div class="colBd">
                <select id="PLC_TYPE" class="filter">
                    <option value="2">전체</option>
                    <option value="0">성당</option>
                    <option value="1">예식장</option>
                </select>
            </div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>성명</b></span></div>
            <div class="colBd"><input id="NAME" class="filter"></div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>세례명</b></span></div>
            <div class="colBd"><input id="BAPT" class="filter"></div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>본당</b></span></div>
            <div class="colBd"><input id="ORG_NM" class="filter"></div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>생년월일</b></span></div>
            <div class="colBd"><input id="BIRTH" class="filter"></div>
        </div>        
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>견진여부</b></span></div>
            <div class="colBd">
                <select id="CONFIRM" class="filter">
                    <option value="2">전체</option>
                    <option value="0">받음</option>
                    <option value="1">받지않음</option>
                </select>
            </div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>전화번호</b></span></div>
            <div class="colBd"><input id="TEL_NO" class="filter"></div>
        </div>
    </div>
    <div class="clearB"></div>

    <br>
    <div class="tableOutFrm">
        <div class="pddS floatL">
            <a id="newCol" class="pddS clBg3 clW rndCorner pointer">신규</a>
            <a id="xport" class="pddS clBg3 clW rndCorner pointer">엑셀 다운로드</a>
        </div>
        <div class="pddS floatR">
            <span>페이지당</span>
            <select class="tblLimit fs7 pddSS rndCorner clBrC">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select> 
            <span>개씩 보기</span>
        </div>
        <div class="xScroll">
            <table id="myTbl" class="width2500"></table>
        </div>
        <div id="tblPagination"></div>
    </div>
    <br>
</div>

<link href="/admin/assets/css/hr_tbl.css?ver=0" rel="stylesheet" />
<link href="/admin/assets/css/modal.css?ver=0" rel="stylesheet" />
<link href="/admin/assets/css/searchArea.css?ver=0" rel="stylesheet" />
<script type='text/javascript' src='/admin/assets/js/hr_tbl.js'></script>
<script type='text/javascript' src='/admin/assets/js/modal.js'></script>
<script type='text/javascript' src='/admin/assets/js/library/xlsx.mini.min.js'></script>
<script type='text/javascript' src='/admin/assets/js/reserve.js'></script>

<?php include('components/footer.php'); ?>

<script>

</script>