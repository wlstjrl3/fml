//데이터테이블을 지정한다.
var mytbl = new hr_tbl({
    xhr:{
        url:'/admin/sys/rsvList.php',
        columXHR: '',
        key : psnlKey.value, //api 호출할 보안 개인인증키 테스트 기간동안은 id로 대체한다.
        where: {
            nothing : '', //filter의 값 변동이 생기면 여기에 즉시 추가 값을 더하고 xhr을 호출한다.
        },
        order: {
            column : '0',
            direction : 'desc',
        },
        page : 0, //표시되는 페이지에서 1이 빠진 값이다 즉 page:0 = 1페이지
        limit : 10, //만약 리미트가 0이라면 리미트 없이 전체 조회하는 것으로 처리 excel down등에서 0 처리해야 함!
    },
    columns: [
        //반드시 첫열이 key값이되는 열이 와야한다. 숨김여부는 class로 추가 지정
        {title: "일련번호", data: "EF_NO", className: "colSeq hidden"}
        ,{title: "교육일", data: "EDU_DT", className: "colEduDt"}
        ,{title: "혼인예정일", data: "MRG_DT", className: "colMrgDt"}
        ,{title: "혼인장소", data: "PLC_TYPE_KOR", className: "colPlcType"}
        ,{title: "장소타입", data: "MRG_PLACE", className: "colMrgPlace"}
        ,{title: "이메일주소", data: "EMAIL", className: "colEmail"}

        ,{title: "신랑종교", data: "M_RELIGION_KOR", className: "colReligion"}
        ,{title: "신랑성명", data: "M_NAME", className: "colName"}
        ,{title: "신랑세례명", data: "M_BAPT", className: "colBapt"}
        ,{title: "신랑본당", data: "M_ORG_NM", className: "colOrgNm"}
        ,{title: "신랑생년월일", data: "M_BIRTH", className: "colBirth"}
        ,{title: "신랑견진여부", data: "M_CONFIRM", className: "colConfirm"}
        ,{title: "신랑전화번호", data: "M_TEL_NO", className: "colTelNo"}
        
        ,{title: "신부종교", data: "F_RELIGION_KOR", className: "colReligion"}
        ,{title: "신부성명", data: "F_NAME", className: "colName"}
        ,{title: "신부세례명", data: "F_BAPT", className: "colBapt"}
        ,{title: "신부본당", data: "F_ORG_NM", className: "colOrgNm"}
        ,{title: "신부생년월일", data: "F_BIRTH", className: "colBirth"}
        ,{title: "신부견진여부", data: "F_CONFIRM", className: "colConfirm"}
        ,{title: "신부전화번호", data: "F_TEL_NO", className: "colTelNo"}
    ],
});
mytbl.show('myTbl'); //테이블의 아이디에 렌더링 한다(갱신도 가능)
mytbl.xportBind();

//이 아래로는 페이지 개별 모달창 이벤트를 지정
//신규버튼을 눌렀을때
newCol.addEventListener("click",()=>{
    document.querySelector(".modalForm").style.visibility="visible"; //모달창이 나타나게 한다.
    document.querySelector(".modalForm").style.opacity="1";     //투명도 애니메이션 적용을 위해 opacity가 0에서 1로 변경된다.
    document.querySelector(".modalForm").querySelectorAll("input").forEach((input,key)=>{
        input.value="";
    });
    document.querySelector(".modalBody").querySelectorAll("input").forEach(input=>{
        input.disabled=false;
    });
    document.querySelector(".modalBody").querySelectorAll("select").forEach(select=>{
        select.disabled=false;
    });          
});
//행을 클릭했을때 xhr로 다시 끌어올 데이터는 각 페이지마다 다르기에 여기에서 지정
function trDataXHR(idx){ 
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/admin/sys/rsvConfig.php?key="+psnlKey.value+"&EF_NO="+idx+"&CRUD=R"); xhr.send(); //XHR을 즉시 호출한다. psnlKey는 추후 암호화 하여 재적용 예정
    console.log("/admin/sys/rsvConfig.php?key="+psnlKey.value+"&EF_NO="+idx+"&CRUD=R");
    xhr.onload = () => {
        if (xhr.status === 200) { //XHR 응답이 존재한다면
            var res = JSON.parse(xhr.response)['data']; //응답 받은 JSON데이터를 파싱한다.
            if(res!=null){
                document.querySelector(".modalBody").querySelectorAll("input").forEach(input=>{
                    input.disabled=false;
                });
                document.querySelector(".modalBody").querySelectorAll("select").forEach(select=>{
                    select.disabled=false;
                });                
                document.querySelector(".modalBody").querySelectorAll("input").forEach((input,key)=>{
                    switch(key){ //불러온 xhr자료를 인풋박스에 배치한다.
                        case 0 : input.value=res[0].EF_NO
                        break;
                        case 1 : input.value=res[0].EDU_DT
                        break;
                        case 2 : input.value=res[0].MRG_DT
                        break;
                        case 3 : input.value=res[0].MRG_PLACE
                        break;
                        case 4 : input.value=res[0].EMAIL
                        break;
                        case 5 : input.value=res[0].M_NAME
                        break;
                        case 6 : input.value=res[0].M_BAPT
                        break;
                        case 7 : input.value=res[0].M_ORG_NM
                        break;
                        case 8 : input.value=res[0].M_BIRTH
                        break;
                        case 9 : input.value=res[0].M_TEL_NO
                        break;
                        case 10 : input.value=res[0].F_NAME
                        break;
                        case 11 : input.value=res[0].F_BAPT
                        break;
                        case 12 : input.value=res[0].F_ORG_NM
                        break;
                        case 13 : input.value=res[0].F_BIRTH
                        break;
                        case 14 : input.value=res[0].F_TEL_NO
                        break;
                    }
                });
                document.querySelector(".modalBody").querySelectorAll("select").forEach((select,key)=>{
                    switch(key){
                        case 0 : select.value=res[0].PLC_TYPE
                        break;
                        case 1 : select.value=res[0].M_RELIGION;
                            if(res[0].M_RELIGION>0){//신랑이 비신자
                                document.querySelector(".modalForm").querySelectorAll("input").forEach((inputSub,key)=>{
                                    if(key==6||key==7){inputSub.disabled=true;}
                                });
                                document.querySelector(".modalForm").querySelectorAll("select").forEach((selectSub,key)=>{
                                    if(key==2){selectSub.disabled=true;}
                                });
                            }                         
                        break;
                        case 2 : select.value=res[0].M_CONFIRM
                        break;
                        case 3 : select.value=res[0].F_RELIGION;
                            if(res[0].F_RELIGION>0){//신부가 비신자
                                document.querySelector(".modalForm").querySelectorAll("input").forEach((inputSub,key)=>{
                                    if(key==11||key==12){inputSub.disabled=true;}
                                });
                                document.querySelector(".modalForm").querySelectorAll("select").forEach((selectSub,key)=>{
                                    if(key==4){selectSub.disabled=true;}
                                });
                            }
                        break;     
                        case 4 : select.value=res[0].F_CONFIRM
                        break;                         
                    }
                });
            }
        }else{
            console.log("eduConfigXhr 정보 로드 에러");
        }
    }
}
//저장을 클릭했을때 xhr로 데이터를 기록
modalEdtBtn.addEventListener("click",()=>{
    let xhr = new XMLHttpRequest();
    let writeUrl='';
    document.querySelector(".modalForm").querySelectorAll("input").forEach((input,key)=>{
        if(key==0){writeUrl+="&EF_NO="+input.value}
        else if(key==1){writeUrl+="&EDU_DT="+input.value}
        else if(key==2){writeUrl+="&MRG_DT="+input.value}
        else if(key==3){writeUrl+="&MRG_PLACE="+input.value}
        else if(key==4){writeUrl+="&EMAIL="+input.value}
        else if(key==5){writeUrl+="&M_NAME="+input.value}
        else if(key==6){writeUrl+="&M_BAPT="+input.value}
        else if(key==7){writeUrl+="&M_ORG_NM="+input.value}
        else if(key==8){writeUrl+="&M_BIRTH="+input.value}
        else if(key==9){writeUrl+="&M_TEL_NO="+input.value}
        else if(key==10){writeUrl+="&F_NAME="+input.value}
        else if(key==11){writeUrl+="&F_BAPT="+input.value}
        else if(key==12){writeUrl+="&F_ORG_NM="+input.value}
        else if(key==13){writeUrl+="&F_BIRTH="+input.value}
        else if(key==14){writeUrl+="&F_TEL_NO="+input.value}
    });
    document.querySelector(".modalBody").querySelectorAll("select").forEach((select,key)=>{
        if(key==0){writeUrl+="&PLC_TYPE="+select.value}
        else if(key==1){writeUrl+="&M_RELIGION="+select.value}
        else if(key==2){writeUrl+="&M_CONFIRM="+select.value}
        else if(key==3){writeUrl+="&F_RELIGION="+select.value}
        else if(key==4){writeUrl+="&F_CONFIRM="+select.value}
    });

    console.log("/admin/sys/rsvConfig.php?key="+psnlKey.value+writeUrl+"&CRUD=C");
    xhr.open("GET", "/admin/sys/rsvConfig.php?key="+psnlKey.value+writeUrl+"&CRUD=C"); xhr.send(); //XHR을 즉시 호출한다. psnlKey는 추후 암호화 하여 재적용 예정
    xhr.onload = () => {
        if (xhr.status === 200) { //XHR 응답이 존재한다면
            //var res = JSON.parse(xhr.response)['data']; //응답 받은 JSON데이터를 파싱한다.
            console.log("rsvConfig 정보 기록 완료");
            //alert("기록 되었습니다.");
            //mytbl.hrDt.xhr.where.USER_ID="7"; //이런 형식으로 조건문 위치를 싹 스캔하여 전체 필터 적용할것
            mytbl.show('myTbl'); //테이블의 아이디
            modalClose();

        }else{
            console.log("rsvConfig 정보 기록 에러!!!");
        }
    }    
});
//삭제를 클릭했을때 xhr로 데이터를 제거
modalDelBtn.addEventListener("click",()=>{
    if (!confirm("삭제 하시겠습니까?")) {
        return false;
    }                     
    let xhr = new XMLHttpRequest();
    let deleteUrl='';
    document.querySelector(".modalForm").querySelectorAll("input").forEach((input,key)=>{
        if(key==0){deleteUrl+="&EF_NO="+input.value}
    });
    console.log("/admin/sys/rsvConfig.php?key="+psnlKey.value+deleteUrl+"&CRUD=D");
    xhr.open("GET", "/admin/sys/rsvConfig.php?key="+psnlKey.value+deleteUrl+"&CRUD=D"); xhr.send(); //XHR을 즉시 호출한다. psnlKey는 추후 암호화 하여 재적용 예정
    xhr.onload = () => {
        if (xhr.status === 200) { //XHR 응답이 존재한다면
            //var res = JSON.parse(xhr.response)['data']; //응답 받은 JSON데이터를 파싱한다.
            console.log("신청 정보 삭제 완료");
            mytbl.show('myTbl'); //테이블의 아이디
            modalClose();
        }else{
            console.log("신청 정보 제거 에러!!!");
        }
    }    
});

//검색 필터링을 위한 코드
document.querySelectorAll(".filter").forEach((f,key)=>{
    f.addEventListener("change",() => {
        mytbl.hrDt.xhr.where[f.id]=f.value;
        mytbl.hrDt.xhr.page=0; //필터가 바뀌면 페이지 수도 바뀌므로 첫장으로 돌려보낸다.
        mytbl.show("myTbl");
    });
});

//날짜 형식 자동 하이픈 추가를 위한 코드
document.querySelectorAll(".dualDateBox").forEach(dtBox => {
    dtBox.onkeyup = function(event){
        event = event || window.event;
        var _val = this.value.trim();
        this.value = autoHypenDate(_val) ;
    }
});