document.addEventListener("DOMContentLoaded", () => {
    noIE('이 웹사이트는 인터넷 익스플로러에서 작동하지 않습니다. 엣지 브라우저에서 다시 불러옵니다.');


    if(window.location.pathname=="/ee_index.php"){
        navClose();nav2Open();
    }else{
        navClose();navOpen();
    }

});

// {{{ 상단 헤버 네비게이션 조작
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = 64; //네비게이션 높이 체크용
var isNavOpen=0; //네비 토글 체크용
var isAccOpen=0; //개인정보 토글 체크용

window.addEventListener('scroll', (event)=>{
    didScroll = true;

});
setInterval(function() { //스크롤 사이의 딜레이를 주어 연속스크롤 인식 방지
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() { //스크롤이 발생하면
    var st = window.scrollY;
    if(Math.abs(lastScrollTop - st) <= delta) 
    return; 

    if (st > 500) { //하단에 위치한 TOP 올리기 버튼
        document.querySelector("#MOVE_TOP_BTN").style.opacity=".5";
    } else {
        document.querySelector("#MOVE_TOP_BTN").style.opacity="0";
    }
    
    if (st > lastScrollTop && st > navbarHeight && isNavOpen==0){ //최상단 네비게이션 자동 숨김,해제시 navOpen값을 확인하여 사이드 네비가 열려있다면 숨김을 건너뛴다.
        // Scroll Down
        document.querySelector("#header").classList.add('nav-up');
        document.querySelector("#header").classList.remove('nav-down');
    } else {
        document.querySelector("#header").classList.add('nav-down');
        document.querySelector("#header").classList.remove('nav-up');
    } 
    //debugger;
    
    lastScrollTop = st;
}
//}}}

// {{{ 사이드네비게이션 숨김/오픈
function toggleNav1() {
    if(window.location.pathname=="/ee_index.php"||window.location.pathname=="/req.php"){
        location.href="/index.php";
    }else{
        if(isNavOpen==1){navClose();}else{navOpen();}
    }
}
function toggleNav2() {
    if(window.location.pathname=="/"||window.location.pathname=="/index.php"||window.location.pathname=="/req.php"){
        location.href="/ee_index.php";
    }else{
        if(isNavOpen==2){navClose();}else{nav2Open();}
    }
}
function navOpen(){
    document.querySelector("#closeNav").style.width="100%";
    document.querySelector("#closeNav").style.height="9999%";
    //document.querySelector("#navToggle img").src="/assets/img/svgs/close.svg";
    isNavOpen = 1;
    document.querySelector('.side-nav1').classList.add('navOpen');
    document.querySelector('.side-nav2').classList.remove('navOpen');
    document.querySelector('html, body').style.overflow="hidden";
}
function nav2Open(){
    document.querySelector("#closeNav").style.width="100%";
    document.querySelector("#closeNav").style.height="9999%";
    //document.querySelector("#navToggle img").src="/assets/img/svgs/close.svg";
    isNavOpen = 2;
    document.querySelector('.side-nav1').classList.remove('navOpen');
    document.querySelector('.side-nav2').classList.add('navOpen');
    document.querySelector('html, body').style.overflow="hidden";
}
function navClose(){
    //if(window.innerWidth<1280){
    document.querySelector("#closeNav").style.width="0%";
    document.querySelector("#closeNav").style.height="0%";
        //document.querySelector("#navToggle img").src="/assets/img/svgs/menu.svg";
        isNavOpen = 0;
        document.querySelector('.side-nav1').classList.remove('navOpen');
        document.querySelector('.side-nav2').classList.remove('navOpen');
        document.querySelector('html, body').style.overflow="visible";
    //}
}
// }}}
// {{{ 방문자 IP, 접속URL, 방문시각, 브라우저 정보를 기록 기존 Ajax부분을 j쿼리 빼고 새로 작성할예정
{

}