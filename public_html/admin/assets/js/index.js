//데이터테이블을 지정한다.
var mytbl = new hr_tbl({
    xhr:{
        url:'/admin/sys/eduList.php',
        columXHR: '',
        key : psnlKey.value, //api 호출할 보안 개인인증키
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
        {title: "idx", data: "CLASS_NO", className: "hidden"}
        ,{title: "교육일", data: "EDU_DT", className: ""}
        ,{title: "마감일", data: "END_DT", className: ""}
        ,{title: "교육비", data: "EDU_PAY", className: ""}
        ,{title: "참가팀수", data: "TEAM_CNT", className: ""}
        ,{title: "온라인수강", data: "ONLINE", className: ""}
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
});
//행을 클릭했을때 xhr로 다시 끌어올 데이터는 각 페이지마다 다르기에 여기에서 지정
function trDataXHR(idx){ 
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/admin/sys/eduConfig.php?key="+psnlKey.value+"&CLASS_NO="+idx+"&CRUD=R"); xhr.send(); //XHR을 즉시 호출한다. psnlKey는 추후 암호화 하여 재적용 예정
    console.log("/admin/sys/eduConfig.php?key="+psnlKey.value+"&CLASS_NO="+idx+"&CRUD=R");
    xhr.onload = () => {
        if (xhr.status === 200) { //XHR 응답이 존재한다면
            var res = JSON.parse(xhr.response)['data']; //응답 받은 JSON데이터를 파싱한다.
            if(res!=null){
                document.querySelector(".modalBody").querySelectorAll("input").forEach((input,key)=>{
                    switch(key){
                        case 0 :
                            input.value=res[0].CLASS_NO
                            break;
                        case 1 :
                            input.value=res[0].EDU_DT
                            break;
                        case 2 :
                            input.value=res[0].END_DT
                            break;
                        case 3 :
                            input.value=res[0].EDU_PAY
                            break;
                        case 4 :
                            input.value=res[0].TEAM_CNT
                            break;
                    }
                });
                document.querySelector(".modalBody").querySelector("select").value=res[0].ONLINE; //대면 비대면은 셀렉트박스에서 구분
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
        if(key==0){writeUrl+="&CLASS_NO="+input.value}
        else if(key==1){writeUrl+="&EDU_DT="+input.value}
        else if(key==2){writeUrl+="&END_DT="+input.value}
        else if(key==3){writeUrl+="&EDU_PAY="+input.value}
        else if(key==4){writeUrl+="&TEAM_CNT="+input.value}
    });
    writeUrl+="&ONLINE="+document.querySelector(".modalBody").querySelector("select").value;
    console.log("/admin/sys/eduConfig.php?key="+psnlKey.value+writeUrl+"&CRUD=C");
    xhr.open("GET", "/admin/sys/eduConfig.php?key="+psnlKey.value+writeUrl+"&CRUD=C"); xhr.send(); //XHR을 즉시 호출한다. psnlKey는 추후 암호화 하여 재적용 예정
    xhr.onload = () => {
        if (xhr.status === 200) { //XHR 응답이 존재한다면
            //var res = JSON.parse(xhr.response)['data']; //응답 받은 JSON데이터를 파싱한다.
            console.log("eduConfig 정보 기록 완료");
            //alert("기록 되었습니다.");
            //mytbl.hrDt.xhr.where.USER_ID="7"; //이런 형식으로 조건문 위치를 싹 스캔하여 전체 필터 적용할것
            mytbl.show('myTbl'); //테이블의 아이디
            modalClose();

        }else{
            console.log("eduConfig 정보 기록 에러!!!");
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
        if(key==0){deleteUrl+="&CLASS_NO="+input.value}
    });
    console.log("/admin/sys/eduConfig.php?key="+psnlKey.value+deleteUrl+"&CRUD=D");
    xhr.open("GET", "/admin/sys/eduConfig.php?key="+psnlKey.value+deleteUrl+"&CRUD=D"); xhr.send(); //XHR을 즉시 호출한다. psnlKey는 추후 암호화 하여 재적용 예정
    xhr.onload = () => {
        if (xhr.status === 200) { //XHR 응답이 존재한다면
            //var res = JSON.parse(xhr.response)['data']; //응답 받은 JSON데이터를 파싱한다.
            console.log("psnl 정보 삭제 완료");
            mytbl.show('myTbl'); //테이블의 아이디
            modalClose();
        }else{
            console.log("psnl 정보 제거 에러!!!");
        }
    }    
});

//엑셀 업로드를 위한 코드
document.querySelector("#file").addEventListener('change',target=>{
    let fileName = target.currentTarget.value;
    document.querySelector(".upload-name").value=fileName; //파일명 표시
    // [input 태그에 파일이 선텍 된 경우 로직 수행]
    if(fileName.slice(-4)=='xlsx'||fileName.slice(-4)=='.xls'){
        let input = target.currentTarget; //??? 사용되는 코드인가?
        let reader = new FileReader();
        reader.onload = function () {
            let data = reader.result;
            let workBook = XLSX.read(data, { type: 'binary' });
            workBook.SheetNames.forEach(function (sheetName) {
                let rows = XLSX.utils.sheet_to_json(workBook.Sheets[sheetName]);
                debugger;
                if(rows[0]['EDU_DT']){
                    if (!confirm("교육일:"+rows[0]['EDU_DT']+"[교육비:"+rows[0]['EDU_PAY']+"] 제한팀수:"+rows[0]['TEAM_CNT']+" 외 "+(rows.length-1)+"건 의 정보를 일괄등록 하시겠습니까?")) {
                        // 취소(아니오) 버튼 클릭 시 이벤트
                        return false;
                    }                     
                }else{
                    alert("파일 구조가 잘못되었습니다.");
                    return false;
                }
                var xhr = new XMLHttpRequest();//XMLHttpRequest 객체 생성
                xhr.open('POST', '/admin/sys/eduBatchInsert.php?key='+psnlKey.value, true);//요청을 보낼 방식, 주소, 비동기여부 설정                
                xhr.setRequestHeader('Content-type', 'application/json;charset=UTF-8');//HTTP 요청 헤더 설정
                xhr.send(JSON.stringify(rows));  //JSON,stringify를 이용하여 json으로 변환해야만 php상에서 엑셀 텍스트가 json으로 인식됨
                xhr.onload = () => {//통신후 작업
                    if (xhr.status == 200) {//통신 성공
                        //console.log(xhr.response); 
                        debugger; //로그인 아이디 지정이 안되어서 실제 DB등록이 안된다는 res 응답이 있으니 확인해서 추가할것
                        mytbl.show("myTbl");
                    }else{
                        console.log("통신 실패 type1");//통신 실패
                    }
                }
                xhr.onloadend = () => {}
            })
        };

        // [input 태그 파일 읽음]
        reader.readAsBinaryString(input.files[0]);
    }else{
        alert("엑셀 파일형식이 아닙니다.");
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