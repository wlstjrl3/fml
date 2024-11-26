document.querySelector("input[name=M_BIRTH]").addEventListener('change',(e)=>{
    let age = calculateAge(new Date(e.currentTarget.value));
    document.querySelector("#M_BIRTH_CALC").innerHTML="만 "+age+"세";
});
document.querySelector("input[name=F_BIRTH]").addEventListener('change',(e)=>{
    let age = calculateAge(new Date(e.currentTarget.value));
    document.querySelector("#F_BIRTH_CALC").innerHTML="만 "+age+"세";
});
document.querySelectorAll("input[name=M_RELIGION]").forEach((mR,key)=>{
    mR.addEventListener("change",(e)=>{
        if(e.currentTarget.value=="0"){
            document.querySelectorAll(".mRLink").forEach((mRL,key)=>{
                mRL.style.display="block";
            });
        }else{
            document.querySelectorAll(".mRLink").forEach((mRL,key)=>{
                mRL.style.display="none";
            });
        }
    });
});
document.querySelectorAll("input[name=F_RELIGION]").forEach((fR,key)=>{
    fR.addEventListener("change",(e)=>{
        if(e.currentTarget.value=="0"){
            document.querySelectorAll(".fRLink").forEach((fRL,key)=>{
                fRL.style.display="block";
            });
        }else{
            document.querySelectorAll(".fRLink").forEach((fRL,key)=>{
                fRL.style.display="none";
            });
        }
    });
});

document.querySelectorAll(".phoneInput").forEach(ph=>{
    ph.onkeyup = function(event){
        event = event || window.event;
        var _val = this.value.trim();
        this.value = autoHypenPhone(_val) ;
    }
});


function calculateAge(birthDate) {
    var birthYear = birthDate.getFullYear();    // 생년월일을 '년', '월', '일'로 분리합니다.
    var birthMonth = birthDate.getMonth();
    var birthDay = birthDate.getDate();

    var currentDate = new Date();    // 현재 날짜를 가져옵니다.
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth();
    var currentDay = currentDate.getDate();
  
    var age = currentYear - birthYear;    // 만 나이를 계산합니다.
  
    if (currentMonth < birthMonth) {    // 현재 월과 생일의 월을 비교합니다.
      age--;
    }
    else if (currentMonth === birthMonth && currentDay < birthDay) {    // 현재 월과 생일의 월이 같은 경우, 현재 일과 생일의 일을 비교합니다.
      age--;
    }
    return age;
}


document.querySelector("#reqSend").addEventListener('click',()=>{
    if (document.querySelector("input[name=MRG_DT]").value == "") 
    {
        alert("혼인일/예정일을 입력하세요.");
        document.querySelector("input[name=MRG_DT").focus();
        return false;
    }
    if (document.querySelector("select[name=EDU_DT]").value == "") 
    {
        alert("교육일을 선택하세요.");
        document.querySelector("select[name=EDU_DT").focus();
        return false;
    }
    if (document.querySelector("input[name=EMAIL]").value == "") 
    {
        alert("이메일 주소를 입력하세요.");
        document.querySelector("input[name=EMAIL").focus();
        return false;
    }
    if (document.querySelector("input[name=M_NAME]").value == "") 
    {
        alert("신랑 성명을 입력하세요.");
        document.querySelector("input[name=M_NAME").focus();
        return false;
    }
    if (document.querySelector("input[name=M_RELIGION]:checked").value == "0") {
        if (document.querySelector("input[name=M_BAPT]").value == "") 
        {
            alert("신랑 세례명을 입력하세요.");
            document.querySelector("input[name=M_BAPT").focus();
            return false;
        }
        if (document.querySelector("input[name=M_ORG_NM]").value == "") 
        {
            alert("신랑 본당을 입력하세요.");
            document.querySelector("input[name=M_ORG_NM").focus();
            return false;
        }
    }
    if (document.querySelector("input[name=M_BIRTH]").value == "") 
    {
        alert("신랑 나이를 입력하세요.");
        document.querySelector("input[name=M_BIRTH").focus();
        return false;
    }
    if (document.querySelector("input[name=M_TEL_NO]").value == "" || document.querySelector("input[name=M_TEL_NO]").value.length<12 || document.querySelector("input[name=M_TEL_NO]").value.substr(0,2)!='01')
    {
        alert("신랑 개인 연락처를 확인하세요.");
        document.querySelector("input[name=M_TEL_NO").focus();
        return false;
    }

    if (document.querySelector("input[name=M_TEL_NO2]").value == "" || document.querySelector("input[name=M_TEL_NO2]").value.length<12 || document.querySelector("input[name=M_TEL_NO2]").value.substr(0,2)!='01')
    {
        alert("신랑 부모님 연락처를 확인하세요.");
        document.querySelector("input[name=M_TEL_NO2").focus();
        return false;
    }
    if (document.querySelector("input[name=F_NAME]").value == "") 
    {
        alert("신부 성명을 입력하세요.");
        document.querySelector("input[name=F_NAME").focus();
        return false;
    }

    if (document.querySelector("input[name=F_RELIGION]:checked").value == "0") {
        if (document.querySelector("input[name=F_BAPT]").value == "") 
        {
            alert("신부 세례명을 입력하세요.");
            document.querySelector("input[name=F_BAPT").focus();
            return false;
        }
        if (document.querySelector("input[name=F_ORG_NM]").value == "") 
        {
            alert("신부 본당을 입력하세요.");
            document.querySelector("input[name=F_ORG_NM").focus();
            return false;
        }
    }
    if (document.querySelector("input[name=F_BIRTH]").value == "") 
    {
        alert("신부 나이를 입력하세요.");
        document.querySelector("input[name=F_BIRTH").focus();
        return false;
    }
    if (document.querySelector("input[name=F_TEL_NO]").value == "" || document.querySelector("input[name=F_TEL_NO]").value.length<12 || document.querySelector("input[name=F_TEL_NO]").value.substr(0,2)!='01')
    {
        alert("신부 개인 연락처를 입력하세요.");
        document.querySelector("input[name=F_TEL_NO").focus();
        return false;
    }
    if (document.querySelector("input[name=F_TEL_NO2]").value == "" || document.querySelector("input[name=F_TEL_NO2]").value.length<12 || document.querySelector("input[name=F_TEL_NO2]").value.substr(0,2)!='01')
    {
        alert("신부 부모님 연락처를 입력하세요.");
        document.querySelector("input[name=F_TEL_NO2").focus();
        return false;
    }
    if(document.querySelector("input[name=accept1]").checked == false){
        alert("환불 규정 동의가 필요합니다.");
        document.querySelector("input[name=accept1]").focus();
        return false;
    }
    if(document.querySelector("input[name=accept2]").checked == false){
        alert("개인정보 수집 동의가 필요합니다.");
        document.querySelector("input[name=accept2]").focus();
        return false;
    }

    document.querySelector("#reqForm").submit();
});

document.querySelector("#backSend").addEventListener('click',()=>{
    location.href="/";
});