<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DIV 팝업창</title>
  <style>
    /* 팝업창 스타일 */
    .popup {
      display: none; /* 기본적으로 숨김 */
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      padding: 20px;
      background-color: white;
      border: 1px solid #ccc;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    /* 배경 어둡게 처리 */
    .overlay {
      display: none; /* 기본적으로 숨김 */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 999;
    }

    /* 닫기 버튼 스타일 */
    .popup .close-btn {
      cursor: pointer;
      float: right;
      font-size: 16px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <!-- 팝업 배경 -->
  <div id="overlay" class="overlay"></div>

  <!-- 팝업창 -->
  <div id="popup" class="popup">
    <span class="close-btn" onclick="closePopup()">✖</span>
    <h3>팝업창 제목</h3>
    <p>이것은 팝업창 내용입니다.</p>
  </div>

  <!-- 팝업 열기 버튼 -->
  <button onclick="openPopup()">팝업 열기</button>

  <script>
    // 팝업창 열기
    function openPopup() {
      document.getElementById("popup").style.display = "block";
      document.getElementById("overlay").style.display = "block";
    }

    // 팝업창 닫기
    function closePopup() {
      document.getElementById("popup").style.display = "none";
      document.getElementById("overlay").style.display = "none";
    }
  </script>
</body>
</html>
