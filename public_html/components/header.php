<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf8' />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link href="/assets/css/common.css?ver=0.02" rel="stylesheet" />
    <link href="/assets/css/header.css?ver=0.02" rel="stylesheet" />
    <script defer src="https://sinseiki.github.io/noIE.js/noIE.js" ></script><!--익스플로러 사용제한-->    
    <script type='text/javascript' src='/assets/js/header.js?ver=0.02'></script>

    <title>천주교 수원교구 혼인강좌</title>
</head>
<body>
    <div id="closeNav" style="width:0%;height:0%;background:rgba(100,100,100,0.5);position:absolute;z-index:2;" onclick="navClose()"></div>
    <header id="header">
        <!-- Sidebar navigation {{{ --> 
        <div class="hd-nav-margin" style="width:0%;height:100%;float:left;background-color:white;position:fixed;z-index:3;top:54px;"></div>
        <div class="side-nav side-nav1">
            <ul class="sideNavBlock">
				<li>
                    <br>
                    <a class="fs5"  href="/#intro">혼인강좌 소개</a>
                </li>
                <li>
                    <a class="fs5" href="/#eduInfo">안내사항</a>
                    <ul>
                        <li>
                            <a href="/#eduInfo">
                                └&nbsp;교육안내
                            </a>
                        </li>
                        <li>
                            <a href="/#schedule">
                                └&nbsp;일정안내
                            </a>
                        </li>
                        <li>
                            <a href="/#program">
                                └&nbsp;프로그램안내
                            </a>
                        </li>
                        <li>
                            <a href="/#map">
                                └&nbsp;오시는길
                            </a>
                        </li>
                    </ul>
                    <hr>
                </li>
                <li>
                    <a class="fs5" >신청 및 확인</a>
                    <ul>
                        <li>
                            <a href="/req.php">
                                └&nbsp;혼인강좌 신청
                            </a>
                        </li>
                        <li>
                            <a href="/res.php">
                                └&nbsp;신청 확인
                            </a>
                        </li>
                    </ul>
                    <hr>
                </li>             
            </ul>
        </div>
        <div class="side-nav side-nav2 clBg6">
            <ul class="sideNavBlock">
				<li>
                    <br>
                    <a class="fs5"  href="/ee_index.php">약혼자 주말 소개</a>
                </li>
                <li>
                    <a class="fs5" href="/ee_index.php#">안내사항</a>
                    <ul>
                        <li>
                            <a href="/ee_index.php#qa">
                                └&nbsp;Q & A
                            </a>
                        </li>
                        <li>
                            <a href="/ee_index.php#schedule">
                                └&nbsp;일정안내
                            </a>
                        </li>
                        <li>
                            <a href="/ee_index.php#map">
                                └&nbsp;오시는 길
                            </a>
                        </li>
                    </ul>
                    <hr>
                </li>
                <li>
                    <a class="fs5" >신청 및 확인</a>
                    <ul>
                        <li>
                            <a target="_blank" href="https://docs.google.com/forms/d/1RDMDquunT6HGiA8vZ2W59lu0pHKe8SGbd13DL_8Kuyk"><!--/ee_req.php-->
                                └&nbsp;약혼자 주말 신청
                            </a>
                        </li>
                        <!--li>
                            <a href="/ee_res.php">
                                └&nbsp;신청 확인
                            </a>
                        </li-->
                    </ul>
                    <hr>
                </li>             
            </ul>
        </div>        
        <!-- Sidebar navigation }}}-->  
        <div class="nav" style="box-shadow: inset 0px -1px 0px rgba(186, 186, 186, 0.25);">
            <div style="height:54px;max-width:1280px;margin:0 auto;width:100%;white-space:nowrap;">
                <div>
                    <!--img id="cswLogoBgBlue" src="/assets/img/svgs/cswLogoBgBlue.svg" alt="수원교구로고"/-->
                    <a href="http://casuwon.or.kr" style="float:left;">
                        <img style="height:50px;margin:2px;" src="https://www.casuwon.or.kr/assets/cas02/image/common/img_logo.png" alt="수원교구로고">
                    </a>
                </div>
                <div class="navToggle">
                    <a data-activates="slide-out" onclick="toggleNav1()">
                        <span class="fs5">카나혼인강좌</span>
                    </a>
                </div>
                <div class="navToggle">
                    <a data-activates="slide-out" onclick="toggleNav2()">
                        <span class="fs5">약혼자주말</span>
                    </a>
                </div>                
            </div>   
        </div>        
    </header>
    <br>
    <a id="MOVE_TOP_BTN" href="#"><img src="/assets/img/svgs/topBtn.svg" alt="스크롤 상단으로 올리기"></a>
