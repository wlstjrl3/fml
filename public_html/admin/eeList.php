<?php include('./components/header.php'); ?>
<div class="modalForm">
    <div class="modalBg"></div>
    <div class="modalWindow">
        <div class="modalHeader">
            <b>약혼자주말 설정 </b>
            <button></button>
        </div>
        <div class="modalBody">
            <div class="modalGrp">
                <div class="modalHd">일련번호</div>
                <div class="modalBd"><input style="background:#EEE;" autocomplete='off' readonly></div>
            </div>
            <div class="modalGrp">
                <div class="modalHd">교육차수</div>
                <div class="modalBd"><input autocomplete='off'></div>
            </div>
            <div class="modalGrp">
                <div class="modalHd">교육일</div>
                <div class="modalBd"><input class="dateBox" autocomplete='off'></div>
            </div>
            <div class="modalGrp">
                <div class="modalHd">마감일</div>
                <div class="modalBd"><input class="dateBox" autocomplete='off'></div>
            </div>
            <div class="modalGrp">
                <div class="modalHd">교육비</div>
                <div class="modalBd"><input autocomplete='off'></div>
            </div>
            <div class="modalGrp">
                <div class="modalHd">장소명</div>
                <div class="modalBd"><select>
                    <option>아론의집</option>
                    <option>가톨릭교육문화회관</option>
                </select></div>
            </div>
            <div style="clear:both;"></div>
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
        약혼자주말 설정
    </h4>

    <div class="searchArea">
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>교육회차</b></span></div>
            <div class="colBd"><input id="TEAM_CNT" class="filter"></div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>교육일</b></span></div>
            <div class="colBd"><input class="dualDateBox dateBox filter" maxlength="10" id="EDU_DT_From"><span>~</span><input class="dualDateBox dateBox filter" maxlength="10" id="EDU_DT_To"></div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>마감일</b></span></div>
            <div class="colBd"><input class="dualDateBox dateBox filter" maxlength="10" id="END_DT_From"><span>~</span><input class="dualDateBox dateBox filter" maxlength="10" id="END_DT_To"></div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>교육비</b></span></div>
            <div class="colBd"><input id="EDU_PAY" class="filter"></div>
        </div>
        <div class="colGrp">
            <div class="colHd clBg5 cl2"><span><b>교육장소</b></span></div>
            <div class="colBd"><select id="EDU_NAME" class="filter">
            <option value="">전체</option><option>아론의집</option><option>가톨릭교육문화회관</option>
            </select></div>
        </div>
    </div>
    <div class="clearB"></div>

    <br>
    <div class="tableOutFrm">
        <div class="pddS floatL">
            <a id="newCol" class="pddS clBg3 clW rndCorner pointer">신규</a>
            <a id="xport" class="pddS clBg3 clW rndCorner pointer">엑셀 다운로드</a>
            <label class="floatR crud_button pddS clBg3 clW rndCorner pointer" for="file">엑셀 업로드</label>
            <input class="floatR upload-name" value="" placeholder="첨부파일">
            <input class="hidden" type="file" id="file">
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
        <table id="myTbl"></table>
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
<script type='text/javascript' src='/admin/assets/js/eeList.js'></script>
<script type='text/javascript' src='/assets/js/dateForm.js'></script>

<?php include('components/footer.php'); ?>

<script>

</script>