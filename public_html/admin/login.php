<?php include('components/header.php'); ?>
<script type='text/javascript' src='/admin/assets/js/login.js'></script>
<link href="/admin/assets/css/login.css?ver=0.001" rel="stylesheet" />

<div id="loginBg" class="clBg2">
    <div id="loginFrm">
        <div id="loginTitle">
            <h3 class="fontWSlim clW">천주교 수원교구</h3>
            <h3 class="fontWSlim clW">혼인강좌</h3>
            <h2 class="fontWExtr cl1">수강신청</h2>
            <h3 class="fontWSlim clW">관리 시스템</h3>
            <br>
            <h2 class="fontWExtr cl1">Marriage Education</h2>
            <h3 class="fontWSlim clW">Management System</h3>
        </div>
        <div id="loginBody">
            <br><br>
            <form autocomplete="off" name="form-signin" class="form-signin" method="post" target="_self" action="./dbconn/login_chk.php" onsubmit="return frm_check();">
                <div><h4>로그인</h4></div>
                <br>
                <div><input class="pddS" placeholder="ID" id="admin-id" name="admin-id" min=3 required></div>
                <div><input class="pddS" placeholder="PASSWORD" type="password" id="admin-password" name="admin-password" min=4 required></div>
                <div><button class="pddM clBg3 clW clBr0">로그인</button></div>
                <div><input type="checkbox" name="saveId" id="saveId"><label for="saveId" style=""> 아이디 저장</label></div>
            </form>
            <br><br>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>
<?php include('components/footer.php'); ?>
